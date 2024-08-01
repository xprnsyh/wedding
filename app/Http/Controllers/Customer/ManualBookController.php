<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManualBookController extends Controller
{
    public function index()
    {
        return response()->file(public_path('petunjuk-penggunaan/syarat_penggunaan.pdf'),['content-type'=>'application/pdf']);
    }
}
