<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function confirmation($invoice)
    {

        $order = Order::where('invoice', $invoice)->first();
        return view('guest.confirmation',[
            'order' => $order
        ]);
    }
}
