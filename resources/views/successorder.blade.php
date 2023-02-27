<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Order | Hoofey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/startup-materialize.min.css') }}">
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin-bsb/favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('admin-bsb/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('admin-bsb/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('admin-bsb/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('admin-bsb/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-bsb/css/style-order.css') }}">
</head>

<body>
    <div class="white valign-wrapper logo">
        <div class="row logo-row">
            <div>
                <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="Hoofey Logo" width="115px" height="33px">
            </div>
        </div>
        @include('layouts.alert')
    </div>
    <div class="white valign-wrapper order-number">
        <div class="row" style="width: 100%">
            <div class="col s12 m12" style="display: flex; justify-content: center;">
                <div class="wrap-circle">
                    <div class="circle-outlined" style="background: #1ABC9C; border-color: 1ABC9C;">
                        <div class="circle-filled" style="background: #1ABC9C">
                            <span class="material-icons" style="color: #fff; font-size: 30px">
                                done
                            </span>
                        </div>
                    </div>

                    <span class="garis-order"></span>
                </div>
                <div class="wrap-circle">
                    <div class="circle-outlined" style="background: #1ABC9C; border-color: 1ABC9C;">
                        <div class="circle-filled" style="background: #1ABC9C">
                            <span class="material-icons" style="color: #fff; font-size: 30px">
                                done
                            </span>
                        </div>
                    </div>

                    <span class="garis-order"></span>
                </div>
                <div class="wrap-circle">
                    <div class="circle-outlined" style="background: #1ABC9C; border-color: 1ABC9C;">
                        <div class="circle-filled" style="background: #1ABC9C">
                            <span class="material-icons" style="color: #fff; font-size: 30px">
                                done
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white valing-wrapper" style="overflow-x: hidden">
        <div class="row">
            <div class="col s12 m12 order-information">
                <div>
                    <h4>Yay! Completed</h4>
                    <img src="{{ asset('img-success.png') }}" alt="Payment Successfully!" class="success-img">
                    <p>We will inform you via email later once the transaction has been accepted</p>
                    <div class="btn-wrapper">
                        <a href="/">
                            <button id="cancel" type="submit" class="btn btn-pink-col waves-effect">Back to Home</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('admin-bsb/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('admin-bsb/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('admin-bsb/js/admin.js') }}"></script>
    <script src="{{ asset('admin-bsb/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>