@component('mail::message')
Hello {{$user->name}} !

Thank you for purchasing our product, to countinue the process copy and paste the link below to complete the payment :<br>

<a class="break-all">{{$url}}</a>

this link will expire after 3 days from today.<br>

If you have any questions or concert about purchasing feel free to contact us.<br>
Email : hoofey.aksesdigital@gmail.com<br>
Phone : (+62)81220801118.<br>


Kind regards,<br>
<a href="https://hoofey.id/" class="break-all">{{ config('app.name') }}</a>
    
@endcomponent