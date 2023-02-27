<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Invite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function profile()
    {
        $users = User::find(Auth::id());
        $my_customer = Customer::where('email', Auth::user()->email)->first();
        if ($my_customer != null) {
            $event = Event::where('created_by', $my_customer->id)->get();
        }
        $invitations = Invite::where('guest_id', Auth::id())->get();

        return view('customer.profile.index', [
            'user' => $users,
            'events' => $event,
            'invitations' => $invitations
        ]);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'address' => 'required',
            'bio' => 'required',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpg,png,jpeg|max:2000',
        ]);

        $user = User::find(Auth::id());
        // dd($user);
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->name . '_profile_' . time() . '.' . $extension;
            if (File::exists('admin/assets/images/profile/' . $user->avatar)) {
                File::delete('admin/assets/images/profile/' . $user->avatar);
            }
            $file->move('admin/assets/images/profile/', $filename);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->bio = $request->bio;
            $user->avatar = $filename;
        } else {
            $user->name = $request->name;
            $user->username = $request->username;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->bio = $request->bio;
            $user->avatar = $user->avatar;
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
