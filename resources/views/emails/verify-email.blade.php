@component('mail::message')
Hello {{$user->name}} !

You’re almost ready to start enjoying Hoofey, Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify Email Address
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}

If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below.<br>
into your web browser:

<a href="{{$url}}" class="break-all">{{ $url }}</a>
    
@endcomponent

