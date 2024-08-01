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
    <link rel="icon" href="{{ asset('img/primary-icon.png') }}" type="image/x-icon">

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
    <div class="white valign-wrapper logo center">
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
                    <div class="circle-outlined" style="background: transparent;">
                        <div class="circle-filled">
                            2
                        </div>
                    </div>

                    <span class="garis-order"></span>
                </div>
                <div class="wrap-circle">
                    <div class="circle-outlined">
                        <div class="circle-filled">
                            3
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
                    <h4>Payment</h4>
                    <p>Kindly follow the instructions bellow</p>
                </div>
            </div>
        </div>
        <div class="row order-filled">
            <div class="col s12 m6 content">
                <div class="paket-wrapper">
                    <div class="text-wrapper">
                        <p>Transfer Pembayaran:</p>
                        <p>Ongkos Kirim: <b id="ongkir">Rp. 10,000,-</b></p>
                        <p>Sub Total: <b id="subtotal">Rp. {{ number_format($orders->subtotal) }},-</b></p>
                        <p>Total: <b id="total">Rp. {{ number_format($orders->subtotal + 10000) }},-</b></p>
                    </div>
                    <div class="bank-method">
                        @isset($banks)
                            @foreach ($banks as $bank)
                                <div class="row">
                                    <div class="col s12 m12">
                                        <div class="img-bank">
                                            <img src="{{ asset('admin/assets/images/banks/' . $bank->logo_bank) }}"
                                                alt="BCA Logo" style="width: 70px;">
                                        </div>
                                        <div class="rek-bank">
                                            <p>{{ $bank->bank_name }}</p>
                                            <p>{{ $bank->account_number }}</p>
                                            <p>{{ $bank->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
            <form action="{{ route('store.payment') }}" method="post" enctype="multipart/form-data">
                <div class="col s12 m6 bl-1 content">
                    <div class="form-wrapper form-order">
                        <div class="row justify-content-center">
                            <div class="form-group">
                                <label for="exampleCheck1">Metode Pembayaran</label>
                                <select name="metodebayar" class="form-control" id="package">
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                            <div class="form-group">
                                @csrf
                                <label for="costumerName">Nama Pengirim</label>
                                <input type="text" name="nama_pengirim" class="form-control" id="costumerName"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="NoInvoice">No. Invoice</label>
                                <input type="hidden" name="no_invoice" value="{{ $orders->invoice }}">
                                <input type="text" value="{{ $orders->invoice }}" class="form-control"
                                    id="PhoneNumber" placeholder="Please type here..." disabled>
                            </div>
                            <div class="form-group">
                                <label for="AccountNumber">Nomor Rekening</label>
                                <input type="text" name="rekening_pengirim" class="form-control" id="email"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="AsalBank">Asal Bank</label>
                                <select name="bank_pengirim" class="form-control">
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->bank_name }}">{{ $bank->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="TanggalTransfer">Tanggal Transfer</label>
                                <input type="date" name="tanggal_transfer" class="form-control" id="city"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="TanggalTransfer">Total Transfer</label>
                                <input type="text" name="jumlah_transfer" class="form-control" id="city"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="buktiTransfer">Bukti Transfer</label>
                                <input type="file" name="bukti_transfer" class="form-control" id="city"
                                    placeholder="Please type here...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12" id="btn-book" style="display: none">
                    <div class="btn-wrapper">
                        <button type="submit" class="btn btn-pink-col waves-effect">Confirm Payment</button> <br>
                    </div>
                </div>
            </form>
            <div class="col s12 m12">
                <div class="btn-cancel">
                    <button id="cancel" type="submit" class="btn btn-silver-col waves-effect">Cancel</button>
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
    <script>
        $(document).ready(function() {
            if ($('#btn-book').css("display") == "none") {
                setInterval(function() {
                    $(".form-group .form-control").each(function() {
                        if ($(this).val() === "") {
                            $("#btn-book").css("display", "none")
                            $(".btn-cancel").css("margin-top", "102px")
                        } else {
                            $("#btn-book").css("display", "flex")
                            $(".btn-cancel").css("margin-top", "0px")
                        }
                    })
                }, 1000)
            }

            function numberWithCommas(x) {
                return "Rp. " + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

        })
    </script>
</body>

</html>




{{-- <!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Order Preview | Hoofey</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/startup-materialize.min.css')}}">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-solid-transition">
        <div class="nav-wrapper">
            <a href="{{url('/')}}" class="brand-logo" style="padding: 10px;">
                <img src="{{asset('admin-bsb/images/logo.png')}}" alt="" width="auto" height="20">
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-right:30px">
                <li><a href="{{route('create.payment')}}" style="color:#000;">Payment Confirmation</a></li>
                <li><a href="{{route('register')}}" style="color:#000;">Register</a></li>
                <li><a href="{{route('login')}}" style="color:#000;">Login</a></li>
            </ul>

            <a href="#" data-activates="slide-out" class="button-collapse right"><i class="material-icons white-text">menu</i></a>
        </div>
    </nav>
    <ul id="slide-out" class="side-nav">
        <li><a class="waves-effect waves-teal" href="{{route('create.payment')}}" style="color:#fff;">Payment Confirmation</a></li>
        <li><a class="waves-effect waves-teal" href="{{route('register')}}" style="color:#fff;">Register</a></li>
        <li><a class="waves-effect waves-teal" href="{{route('login')}}" style="color:#fff;">Login</a></li>
    </ul>

    <div class="section white valign-wrapper">
        <div class="row valign">
            <div class="col s12 m6 offset-m2">
                <div class="row">
                    <div class="col s12" style="padding-top:30px">
                        <h2 class="section-title black-text">Order Preview</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="form-line col s6">
                        <label>Customer Name</label>
                        <input type="text" value="{{$orders->customer_name}}" disabled>
                    </div>
                    <div class="form-line col s6">
                        <label>Customer Phone Number</label>
                        <input type="text" value="{{$orders->customer_phone}}" disabled>
                    </div>
                    <div class="form-line col s12">
                        <label>Customer Address</label>
                        <input type="text" value="{{$orders->customer_address}}" disabled>
                    </div>
                    </div>
                    <div class="form-line col s6">
                        <label>Package</label>
                        <select id="product_id" name="product_id" class="form-control show-tick" disabled>
                            <option value="">None</option>
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{($product->id == $orderdet->product_id) ? 'selected' : ' '}}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-line col s6">
                        <label>Price</label>
                        <input type="text" value="{{$orders->subtotal}}" disabled>
                    </div>
                    <div class="form-line col s12">
                        <label>Invoice</label>
                        <input type="text" value="{{$orders->invoice}}" disabled>
                    </div>
                    <p class="black-text"><b>Simpan nomor invoice anda untuk melakukan konfirmasi</b></p>
                    <p class="black-text"><b>Lakukan pembayaran via transfer ke rekening Mandiri 1340000432129 atas nama Akses Digital</b></p>
                    <a href="{{route('create.payment')}}" class="btn waves-effect waves-light black">Create Payment</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer" style="background-color: #F7ADAF;">
        <div class="container">
            <div class="row">
                <div class="col s6 m3">
                    <img class="materialize-logo" src="images/logo.png" alt="">
                    <p>Made with love by <a href="https://aksesdigital.co.id">CV. Akses Digital</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>

    <!-- External libraries -->
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js/TweenMax.min.js')}}"></script>
    <script src="{{asset('js/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('js/animation.gsap.min.js')}}"></script>

    <!-- Initialization script -->
    <script src="{{asset('js/startup.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>

</html> --}}
