@extends('layouts.no-footer')

@section('content')
<div class="body">
    <div class="vertical-wrapper pt-lg--10 pt-5 pb-lg--10 pb-5">
        <div class="container">
            @include('layouts.alert')
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-8 col-11 text-center default-page">
                <img src="{{ asset('img/verify_email.jpg') }}" alt="" style="width: -webkit-fill-available;"/>
                    <div class="card border-0 text-center d-block">
                        <h1 class="fw-700 text-grey-900 display4-size display4-md-size">Verify your email address</h1>
                        <p class="text-grey-500 font-xss">You've entered {{ $user->email ?? ''}} as the email address for your account</p>
                        <p class="text-grey-500 font-xss">Please verify this email by checking your inbox</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="p-3 w175 btn-current d-inline-block text-center fw-600 font-xssss rounded-lg text-uppercase ls-3 button-color">{{ __('click here to request another') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
