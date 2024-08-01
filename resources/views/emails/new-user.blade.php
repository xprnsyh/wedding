@component('mail::message')
Hello {{$user->name}} !

Welcome to Hoofey, the following is your account information.

Nama        : {{$user->name}}<br>
Email       : {{$user->email}}<br>
Password    : {{$password}}<br>

@component('mail::button', ['url' => 'https://hoofey.id' ])
Hoofey
@endcomponent

Thanks,<br>
{{ config('app.name')}}

@endcomponent