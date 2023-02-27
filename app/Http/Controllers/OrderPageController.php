<?php

//controller ini untuk order via landing page tanpa login

namespace App\Http\Controllers;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Notifications\UserOrdered;
use App\User;
use App\Province;
use App\Helpers\LogActivity;
use App\Notifications\UserCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $customers = Customer::all();
        $products = Product::all();
        // $provinces = Province::all();
        return view('orderpage', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('orderpage', [
            'product' => $product
        ]);
    }

    public function getProduct($package)
    {
        $product = Product::where('id', $package)->first();
        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            $user = User::where('email', $request->customer_email)->first();
            $product = Product::find($request->product);
            $invoice = Str::random(4) . '-' . time(); //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
            if ($customer != null) {
                // customer sudah ada di database
                $order = Order::create([
                    'invoice' => $invoice,
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    // 'district_id' => $request->district_id,
                    'status' => "PENDING",
                    'subtotal' => $product->price
                ]);

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'qty' => 1
                ]);
                $user->notify(new UserOrdered($order));
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
                    $kalimat = $new_user->name . ' register';
                    LogActivity::addToLog($kalimat, 'Register via halaman order');
                }


                // menambah data customer baru
                DB::table('customers')->insert([
                    'name' => $new_user->name,
                    'email' => $new_user->email,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'status' => 1
                ]);

                $kalimat = $new_user->email . ' ditambahkan ke dalam list customer';
                LogActivity::addToLog($kalimat, 'Customer bertambah');

                $customer = Customer::where('email', $request->customer_email)->first();

                // membuat order baru

                $order = Order::create([
                    'invoice' => $invoice,
                    'customer_id' => $customer->id,
                    'customer_name' => $customer->name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    // 'district_id' => $request->district_id,
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
                $new_user->notify(new UserOrdered($order));
                $kalimat = $new_user->name . ' order #'.$order->invoice. ' Total tagihan: Rp '.number_format($order->subtotal);
                LogActivity::addToLog($kalimat, 'Order via halaman order');
            }
            DB::commit();
            return redirect('/order/show/' . $invoice);
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
        $orders = Order::where('invoice', $invoice)->first();
        $banks = Bank::all();
        return view('orderpagepreview', [
            'orders' => $orders,
            'banks' => $banks,
        ]);
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
