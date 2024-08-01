<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailForgotPassword;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    //  use SendsPasswordResetEmails;

    public function showForgotPassword(){
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        $reset = DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
        
        $token = DB::table('password_resets')->where('email', $request->email)
            ->orderBy('created_at', 'asc')
            ->first();
        $user = User::where('email',$request->email)->first();

        $new_mail = new EmailForgotPassword($token->token,$user);
        Mail::send($new_mail);

        return  redirect()->back()->with('success', 'We have e-mailed your password reset link');
        
    }

    public function showResetForm(Request $request, $token = null){
        return view('auth.passwords.reset',['token' => $token, 'email' => $request->email]);
    }

    public function resetPassword(Request $request){
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|confirmed',
        //     'token' => 'required' ]);
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required'
        ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        // }

        $password = $request->password;

        $tokenData = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$tokenData) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return view('auth.passwords.email')->with(['error' => 'Link Reset Password Expired, Please do it again.' ]);
        }

        $user = User::where('email', $tokenData->email)->first();
    // Redirect the user back if the email is invalid
        if (!$user) {
            return redirect()->back()->with(['error' => 'Email is not Found.']);
        } 

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        return view('home')->with(['success' => 'Reset Password is Success']);
    }
}
