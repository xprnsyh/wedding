<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Mail\EmailVerification;
use Config;
use View;
use URL;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // config(['app.locale' => 'id']);
        // \Carbon\Carbon::setLocale('id');
        // Validator::extend('email_address', function ($attribute, $value, $parameters, $validator) {
        //     return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)) ? FALSE : TRUE;
        // });
        VerifyEmail::toMailUsing(function ($notifiable){        
            $verifyUrl = URL::temporarySignedRoute('verification.verify',
            \Illuminate\Support\Carbon::now()->addMinutes(\Illuminate\Support\Facades 
            \Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
        return new EmailVerification($verifyUrl, $notifiable);

        });
    }
}
