<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Hoofey</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('admin-bsb/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin-bsb/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('admin-bsb/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('admin-bsb/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('admin-bsb/css/style.css')}}" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">Forgot<b> Password</b></a>

        </div>
        <div class="card">
            <div class="body">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{route('login')}}">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('admin-bsb/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('admin-bsb/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin-bsb/plugins/node-waves/waves.js')}}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{asset('admin-bsb/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('admin-bsb/js/admin.js')}}"></script>
    <script src="{{asset('admin-bsb/js/pages/examples/forgot-password.js')}}"></script>
</body>

</html>