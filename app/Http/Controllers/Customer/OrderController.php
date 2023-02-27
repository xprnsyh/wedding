<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Province;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::id());
        $customer = Customer::where('email', $user->email)->first();
        if ($customer != null) {
            $orders = Order::where('customer_id', $customer->id)->get();
        } else {
            $orders = [];
        }
        LogActivity::addToLog('','Akses halaman utama order');
        return view('customer.order.index',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $user = User::find(Auth::id());

        $products = Product::all();

        $provinces = Province::all();

        LogActivity::addToLog('','Akses halaman membuat order');

        return view('customer.order.create',[
            'user' => $user,
            'products' => $products,
            'provinces' => $provinces
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'product' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $customer = Customer::where('email', $request->customer_email)->first();
            $product = Product::find($request->product);
            if ($customer != null) {
                // customer sudah ada di database
                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => 'PENDING',
                    'subtotal' => $product->price
                ]);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => 1
                ]);
                LogActivity::addToLog('Membuat order baru','Akses halaman order');
            } else {
                // customer belum ada di database
                $new_user = User::where('email', $request->customer_email)->first();
                if ($new_user == null) {

                    $new_user = new User;
                    $new_user->name = $request->customer_name;
                    $new_user->email = $request->customer_email;
                    $new_user->password = bcrypt(Str::random(9));
                    $new_user->save();

                    $new_user->assignRole('customer');

                    $new_user->save();
                    LogActivity::addToLog('','Membuat akun dari order');
                }
                DB::table('customers')->insert([
                    'name' => $request->customer_name,
                    'email' => $request->customer_email,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'status' => 1
                ]);
                LogActivity::addToLog('','Menambah customer');

                $customer = Customer::where('email', $request->customer_email)->first();
                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => 'PENDING',
                    'subtotal' => $product->price
                ]);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => 1
                ]);
                LogActivity::addToLog('Membuat order baru','Akses halaman order');
            }
            DB::commit();
            return redirect()->route('customer.list.order')->with(['success' => 'Sukses Menambahkan Order Baru']);
        } catch (\Exception $e) {
            DB::rollBack();
            LogActivity::addToLog('','Gagal membuat order');
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
