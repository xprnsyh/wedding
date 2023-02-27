<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $users = User::all();
        $customers = Customer::all();
        $orders = Order::where('status', 'SUCCESS')->get();
        $ordersPending = Order::where('status', 'PENDING')->get();
        $events = Event::all();
        return view('admin.settings.index', [
            'orders' => $orders,
            'ordersPending' => $ordersPending,
            'users' => $users,
            'events' => $events,
            'customers' => $customers,
        ]);
    }
}
