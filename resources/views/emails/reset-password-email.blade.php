@component('mail::message')
Hello {{$user->name}} !

To reset your password, click the button below. The link will self-destruct after three days.

@component('mail::button', ['url' => $url])
Reset Your Password
@endcomponent

If you do not want to change your password or didn't request a reset, you can ignore and delete this email.

Thanks,<br>
{{ config('app.name') }}

    
@endcomponent

