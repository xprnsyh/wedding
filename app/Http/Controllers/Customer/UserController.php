<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\LogActivity;
use App\User;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Invite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
            return view('customer.profile.index', [
                'user' => $users,
                'events' => $event,
                
            ]);
        }
        // $invitations = Invite::where('guest_id', Auth::id())->get();
        return view('customer.profile.index', [
            'user' => $users,]);
        
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'username' => 'required|string',
            'address' => 'required',
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

    public function editPassword(Request $request){
        $user = User::find(Auth::id());

        return view('admin.user.edit', ['user' => $user]);
    }

    public function updatePassword(Request $request){

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|different:old_password',
            'confirm_new_password' => 'required|same:new_password',
        ]);
        $user = User::find(Auth::id());
        $hashedPassword = Auth::user()->password;

        if ($request->old_password != null && $request->new_password != null) {
            if (Hash::check($request->old_password, $hashedPassword)) {

                if (!Hash::check($request->new_password, $hashedPassword)) {
                    $user = Auth::user();
                    $user->password = bcrypt($request->new_password);
                    $user->updated_at = now();
                    $user->save();
                    $data['success'] = 'Set new password successfully.';
                    LogActivity::addToLog('Edit Password ' . $user->name, 'Akses Halaman Update Password');
                    return redirect()->back()->with($data);
                } else {
                    $data['error'] = 'New password cannot be the same as old password.';
                    LogActivity::addToLog('Edit Password ' . $user->name, 'Akses Halaman Update Password');
                    return redirect()->back()->with($data);
                }
            } else {
                $data['error'] = 'Current password not match.';
                LogActivity::addToLog('Edit Password ' . $user->name, 'Akses Halaman Update Password');
                return redirect()->back()->with($data);
            }
        } else {
            $data['error'] = 'Please fill all the field.';
            LogActivity::addToLog('Edit Password ' . $user->name, 'Akses Halaman Update Password');
            return redirect()->back()->with($data);
        }
    }
}
