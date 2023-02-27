<?php

namespace App\Http\Controllers\API;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\API\BaseController as BaseController;

class UserController extends BaseController
{
    public $successStatus = 200;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addDays(30);
        $token->save();

        $kalimat = $user->name . ' login';
        LogActivity::addToLog($kalimat, 'Login via mobile apps');

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'email' => $user->email,
            'name' => $user->name
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('Personal Access Token')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;
        $success['username'] = $user->username;
        $role_customer = Role::where('name', 'customer')->first();
        $user->assignRole($role_customer->name);

        $kalimat = $user->name.' register';
        LogActivity::addToLog($kalimat,'Register via mobile apps');


        return $this->sendResponse($success, 'User register successfully.');
    }
    public function logout(Request $request)
    {

        LogActivity::addToLog('','Logout via mobile apps');
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function updatePassword(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|different:old_password',
        ]);



        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {

            if (!Hash::check($request->new_password, $hashedPassword)) {
                $user = Auth::user();
                $user->name = $request->name;
                $user->username = $request->username;
                $user->password = bcrypt($request->new_password);
                $user->updated_at = now();
                $user->save();
                LogActivity::addToLog('','Update password via mobile apps');
                return response()->json($user);
            } else {
                LogActivity::addToLog('','Gagal update password via mobile apps');
                $data['error'] = true;
                $data['message'] = 'New password cannot be the same as old password.';
                return response()->json($data);
            }
        } else {
            LogActivity::addToLog('','Gagal update password via mobile apps');
            $data['error'] = true;
            $data['message'] = 'Current password not match.';
            return response()->json($data);
        }



        // return response()->json($user);
    }
    public function profile()
    {
        $user = Auth::user();
        LogActivity::addToLog('','Profile via mobile apps');

        return response()->json($user);
    }
}
