<?php

namespace App\Http\Controllers\Customer;

use App\Bank;
use App\City;
use App\District;
use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\LibraryCurl\CurlGenFlip;
use App\Mail\NewUser;
use App\Models\Customer;
use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Transaction;
use App\Province;
use App\User;
use PDF;
use Dompdf\Options;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

        $products = Product::with('discount')->get();

        $provinces = Province::all();
        $bank = Bank::all();

        LogActivity::addToLog('','Akses halaman membuat order');

        return view('customer.order.create',[
            'user' => $user,
            'products' => $products,
            'provinces' => $provinces,
            'banks' => $bank
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
        
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'product' => 'required'
        ]);

        DB::beginTransaction();
       
        try {
            $customer = Customer::where('email', $request->customer_email)
                ->first();
            
            $product = Product::find($request->product);
            $discounts = Discount::where('is_active',true)
                ->where('product_id', $product->id)
                ->first();
            $discount = 0;
            $harga_akhir = 0;

            if ($discounts->discount_type == 'Persentase') {
                $harga_awal = $product->price;
                $discount = $discounts->amount;
                $discount = ($discount/100) * $harga_awal;
                $harga_akhir = ($harga_awal - $discount);
            } else {
                $harga_awal = $product->price;
                $discount = $discounts->amount;
                $harga_akhir = ($harga_awal - $discount);
            }
            
            if ($customer != null) {
                // customer sudah ada di database
                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
                    'customer_id' => $customer->id,
                    'customer_name' => $request->customer_name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => 'PENDING',
                    'subtotal' => $harga_akhir,
                    'discount_amount' => $discount
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

                    $password = Str::random(9);
                    $new_user = new User;
                    $new_user->name = $request->customer_name;
                    $new_user->email = $request->customer_email;
                    $new_user->address = $request->customer_address;
                    $new_user->phone = $request->customer_phone;
                    $new_user->password = bcrypt($password);
                    $new_user->save();

                    $new_user->assignRole('customer');

                    $new_user->save();
                    $new_mail = new NewUser($new_user,$password);
                    Mail::send($new_mail);
                    LogActivity::addToLog('','Membuat akun dari order');
                }
                DB::table('customers')->insert([
                    'name' => $request->customer_name,
                    'email' => $request->customer_email,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => 1
                ]);
                LogActivity::addToLog('','Menambah customer');

                $customer = Customer::where('email', $request->customer_email)->first();
                $order = Order::create([
                    'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
                    'customer_id' => $customer->id,
                    'customer_name' => $request->customer_name,
                    'customer_phone' => $request->customer_phone,
                    'customer_address' => $request->customer_address,
                    'district_id' => $request->district_id,
                    'status' => 'PENDING',
                    'subtotal' => $harga_akhir
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

    public function exportInvoice($invoice)
    {
        $discount = 0;
        $options = new Options();
        $options->setFontDir('public/plugin/fonts/Nunito-VariableFont_wght.ttf');

        $order = Order::where('invoice', $invoice)->first();
        $customer = Customer::where('id', $order->customer_id)->first();
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        $products = Product::all();
        $provinces = Province::all();
        $district_id = District::where('id', $order->district_id)->first();
        $provinces_id = Province::where('id', $district_id->province_id)->first();
        $cities_id = City::where('id', $district_id->city_id)->first();
        $cities = City::where('province_id', $provinces_id->id)->get();
        $districts = District::where('city_id', $district_id->city_id)->get();
        $product = Product::where('id', $order_detail->product_id)->first();


        // Discount
        $discounts = Discount::where('product_id', $product->id)
            ->where('is_active',true)
            ->first();

        $data = [
            'order' => $order,
            'order_detail' => $order_detail,
            'district_id' => $district_id,
            'provinces_id' => $provinces_id,
            'cities_id' => $cities_id,
            'product' => $product,
            'customer' => $customer,

        ];
        

        $pdf = PDF::loadView('customer.export.invoice-pdf', ['data' => $data]);
        

        return $pdf->stream();
    }

    public function uploadBuktiTransfer(Request $request)
    {
        
    }

    public function createBill(CurlGenFlip $curlGen, $data)
    {
        $order = Order::find($data['id']);

        // $fee = $data['amount'] * (1 / 100);
        $fee = 10000;
        $expired = Carbon::now()->addDays(3)->format('Y-m-d H:i');
        $customer = Customer::find($order->customer_id);

        $createPendingTrans = $this->createPendingTransaction($data['amount'], $data['id']);
        $urlCreateBill = 'pwf/bill';
        $title = $createPendingTrans['transaction_code'];
        $param = array(
            'title' => $title,
            'type' => "SINGLE",
            'amount' => $data['amount'] + $fee,
            'expired_date' => $expired,
            'step' => '2',
            'redirect_url' => 'https://hoofey.id',
            'sender_name' => $order->customer_name,
            'sender_email' => $customer->email,
            'sender_phone_number' => $order->customer_phone
        );

        $bill = $curlGen->store('v2', $urlCreateBill, $param);
        return $bill;
    }

    function createPendingTransaction($amount, $idOrder)
    {
        $order = Order::find($idOrder);
        $order_detail = OrderDetail::where('order_id', $order->id)->first();
        $product = Product::find($order_detail->product_id);

        $updatedTransaction = Transaction::
            where('order_id', $order->id)
            ->where('status', 'PENDING')
            ->where('transaction_product_type', $product->name)
            ->first();
        if ($updatedTransaction != null) {
            $updatedTransaction->update([
                'status' => 'EXPIRED'
            ]);
        }
       
        $countTransaction = Transaction::where('transaction_date', date("Y-m-d"))->count();
        $transaction_code = $product->name."-".$order->invoice."-".date("Ymd").str_pad(($countTransaction + 1), 4, "0", STR_PAD_LEFT);
        $createTransaction = new Transaction;
        $createTransaction->transaction_code = $transaction_code;
        $createTransaction->status = "PENDING";
        $createTransaction->transaction_product_type = $product->name;
        $createTransaction->order_id = $order->id;
        $createTransaction->invoice = $order->invoice;
        $createTransaction->amount = $amount;
        $createTransaction->transaction_date = date("Y-m-d");
        $createTransaction->description = $transaction_code."-".$order->id;
        $createTransaction->save();

        return $createTransaction;
    }

    public function callbackFlip(Request $request)
    {
        $data = json_decode($request->data);
        $getTransaction = Transaction::where('transcation_code', $data->bill_title)
            ->first();
        $order = Order::find($getTransaction->order_id);
        // $bill_title = explode("-", $data->bill_title)[2];
        // $getTransaction = Transaction::where('transaction_code', $bill_title)->first();
        if ($getTransaction) {
            if ($data->status == 'SUCCESSFUL') {
                $getTransaction->status = 'SUCCESS';
                $order->status = "PROCESS";
                $order->save();
                return response()->json(['success' => true, 'message' => 'Success Pay Hoofey'], 200);
            }
            if ($data->status == 'FAILED') {
                $getTransaction->status = 'PENDING';
                $getTransaction->save();
                return response()->json(['success' => false, 'message' => 'Failed Pay Hoofey!']);
            }
            if ($data->status == 'CANCELLED') {
                $getTransaction->status = 'EXPIRED';
                $getTransaction->save();
                return response()->json(['success' => false, 'message' => 'Payment Hoofey Cancelled!']);
            }
            return response()->json(['success' => false, 'message' => 'Status Not Found!']);
        }
    }
}
