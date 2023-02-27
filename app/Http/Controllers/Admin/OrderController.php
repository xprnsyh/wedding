<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use App\City;
use App\District;
use App\Http\Requests\OrderRequest;
use App\Province;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Notifications\UserCreated;

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
        $orders = Order::orderBy('created_at', 'DESC')->get();

        $subtotal = $orders->where('status', 'SUCCESS')->sum('subtotal');
        return view('admin.order.index', [
            'orders' => $orders,
            'subtotal' => $subtotal
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
        $customers = Customer::all();
        $products = Product::all();
        $provinces = Province::all();
        $banks = Bank::all();
        return view('admin.order.create', [
            'customers' => $customers,
            'products' => $products,
            'provinces' => $provinces,
            'banks' => $banks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
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
                    'status' => "PENDING",
                    'subtotal' => $product->price
                ]);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => 1
                ]);
            } else {
                // data customer belum ada di database
                $new_user = User::where('email', $request->customer_email)->first();
                if ($new_user == null) {
                    // membuat data user baru
                    $password = Str::random(9);
                    $new_user = new User;
                    $new_user->name = $request->customer_name;
                    $new_user->email = $request->customer_email;
                    $new_user->password = bcrypt($password);
                    $new_user->phone = $request->customer_phone;
                    $new_user->address = $request->customer_address;
                    $new_user->save();

                    $new_user->assignRole('customer');

                    $new_user->save();
                    $new_user->notify(new UserCreated($request->customer_name, $request->customer_email, $password));
                }

                // menambah data customer baru
                DB::table('customers')->insert([
                    'name' => $new_user->name,
                    'email' => $new_user->email,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'status' => 1
                ]);

                $customer = Customer::where('email', $request->customer_email)->first();

                // membuat order baru
                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => "PENDING",
                    'subtotal' => $product->price
                ]);
                // membuat detail order
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => 1
                ]);
            }
            DB::commit();
            return redirect()->route('admin.list.order')->with(['success' => 'Sukses Menambahkan Order Baru']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoice)
    {
        //
        $order = Order::where('invoice', $invoice)->first();
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        $products = Product::all();
        $provinces = Province::all();

        return view('admin.order.show', [
            'order' => $order,
            'order_detail' => $order_detail,
            'products' => $products,
            'provinces' => $provinces
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($invoice)
    {
        //
        $order = Order::where('invoice', $invoice)->first();
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        $products = Product::all();
        $provinces = Province::all();

        return view('admin.order.edit', [
            'order' => $order,
            'order_detail' => $order_detail,
            'products' => $products,
            'provinces' => $provinces
        ]);
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
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'product' => 'required'
        ]);

        $customer = Customer::where('email', $request->customer_email)->first();
        $product = Product::find($request->product);
        $order = Order::find($id);
        $order->update([
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'district_id' => $request->district_id,
            'status' => $request->status,
            'subtotal' => $product->price
        ]);
        $order_detail = OrderDetail::where('order_id', $id)->first();
        $order_detail->update([
            'product_id' => $product->id,
            'price' => $product->price,
            'qty' => 1
        ]);

        return redirect()->route('admin.list.order')->with(['success' => 'Berhasil Mengubah']);
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
        $order = Order::find($id);
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        $order_detail->delete($order_detail);
        $order->delete($order);

        return redirect()->back()->with(['success' => 'Berhasil Menghapus Order']);
    }
}
