<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payment | Hoofey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/startup-materialize.min.css')}}">
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

<body>
    <div class="white valign-wrapper">
        <div class="row">
            <div class="col s6" style="padding: 10vh 0 0 20vh;">
                <div class="form-group">
                    <img src="{{asset('admin-bsb/images/logo.png')}}" alt="logo" width="25%" style="margin: 0 0 10vh 0;">
                    <h2>Confirm Payment</h2>
                    @include('layouts.alert')
                    <form class="col s12" action="{{route('store.payment')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="col s12">
                            <div class="input-group">
                                <h6>Customer Name</h6>
                                <input type="text" name="nama_pengirim"/>
                        </div>
                        </div>
                        <div class="col s6">
                            <div class="input-group">
                                <h6>Bank Pengirim</h6>
                                <select name="bank_pengirim">
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BRI">BRI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-group">
                                <h6>No Rekening</h6>
                                <input type="text" name="rekening_pengirim"/>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-group">
                                <h6>Tanggal Transfer</h6>
                                <input type="date" name="tanggal_transfer">
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="input-group">
                                <h6>Jumlah Transfer</h6>
                                <input type="text" name="jumlah_transfer"/>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-group">
                                <h6>Nomor Invoice</h6>
                                <input type="text" name="no_invoice"/>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-group">
                                <h6>Upload Bukti Transfer</h6>
                                <input type="file" name="bukti_transfer">
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-group">
                                <button class="btn btn-block btn-pink-col waves-effect" type="submit" style="padding: 6px 1px;">Confirm Payment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s6">
                <img src="{{asset('admin-bsb/images/loginimg.png')}}" alt="who-we-are" width="90%" height="100%s" style="margin-left: 60px;">
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
    <script src="{{asset('admin-bsb/js/pages/examples/sign-in.js')}}"></script>
</body>

</html>
