<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
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
        $roles = Role::all();
        $users = User::orderBy('name', 'ASC')->with('roles')->get(['id', 'name', 'email', 'email_verified_at']);
        $permissions = Permission::all();
        $customers = Customer::all();

        return view('admin.user.index', [
            'users' => $users,
            'roles' => $roles,
            'permissions' => $permissions,
            'customers' => $customers
        ]);
    }
    public function profile()
    {
        $users = User::find(Auth::id());

        return view('admin.user.profile', [
            'user' => $users
        ]);
    }

    public function listRole()
    {
        $roles = Role::with('permissions')->get();


        $permissions = Permission::all();
        return view('admin.role.index', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }



    public function editRole(Request $request, $id)
    {
        $role = Role::find($id);

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        //Mengambil data role
        $roles = Role::all()->pluck('name');

        //apabila parameter role terpenuhi
        if (!empty($role)) {

            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $id)->get()->pluck('name')->all();



            // Mengambil data permission
            $permissions = Permission::pluck('name', 'id');
        }

        // dd($hasPermission, $permissions);

        return view('admin.role.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'hasPermission' => $hasPermission
        ]);
    }



    public function createRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles'
        ]);
        $role = Role::create(['name' => $request->name]);

        return redirect()->back()->with(['success' => 'Sukses Menambahkan Data Role Baru']);;
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission_name);

        return redirect()->back()->with(['success' => 'Sukses Mengubah Data Role']);;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete($role);
        return redirect()->back()->with(['success' => 'Sukses Menghapus Data Role']);;
    }
    public function listPermission()
    {
        $permissions = Permission::all();

        return view('admin.permission.index', [
            'permissions' => $permissions
        ]);
    }

    public function createPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back()->with(['success' => 'Sukses Menambahkan Data Permission Baru']);;
    }

    public function updatePermission(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->back()->with(['success' => 'Sukses Mengupdate Data Permission']);;
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete($permission);
        return redirect()->back()->with(['success' => 'Sukses Menghapus Permission']);;
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'roles' => 'required'
        ]);

        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt(Str::random(9));
        $new_user->save();

        $new_user->assignRole($request->roles);

        $new_user->save();

        return redirect()->route('admin.users')->with(['success' => 'Sukses Menambahkan Data User Baru']);
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'roles' => 'required'
        ]);

        $user = User::find($id);

        $user->syncRoles($request->roles);

        $user->save();

        return redirect()->back()->with(['success' => 'Berhasil Mengubah']);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);

        $user->delete($user);

        return redirect()->back()->with(['success' => 'Sukses Menghapus']);
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
