<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->get();

        return view('admin.payment.index',[
            'payments' => $payments
        ]);
    }
}
