<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function choco() {
        return view('template-1');
    }

    public function pink() {
        return view('template-2');
    }

    public function blue() {
        return view('template-3');
    }

    public function grey() {
        return view('template-4');
    }
}
