<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Province;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
        $customers = Customer::all();

        return view('admin.customer.index', [
            'customers' => $customers
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
        $provinces = Province::all();

        return view('admin.customer.create', [
            'customers' => $customers,
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt(Str::random(9));
        $new_user->save();

        $new_user->assignRole('customer');

        $new_user->save();

        DB::table('customers')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => 1
        ]);


        return redirect()->route('admin.users')->with(['success' => 'Sukses Menambahkan Data Customer Baru']);
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
        $customer = Customer::find($id);
        $provinces = Province::all();

        return view('admin.customer.show', [
            'customer' => $customer,
            'provinces' => $provinces
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
        $customer = Customer::find($id);
        $provinces = Province::all();

        return view('admin.customer.edit', [
            'customer' => $customer,
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
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        DB::table('customers')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => 1
        ]);


        return redirect()->route('admin.users')->with(['success' => 'Berhasil Mengubah']);
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
        $customer = Customer::find($id);
        $customer->delete($customer);

        return redirect()->route('admin.users')->with(['success' => 'Berhasil Menghapus Customer']);
    }
}
