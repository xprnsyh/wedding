<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payment | Hoofey</title>
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
            <a href="{{url('/')}}" class="brand-logo" style="padding: 5px;">
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
                        <h2 class="section-title black-text">Payment Page</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="form-line col s6">
                        <label>Customer Name</label>
                        <input type="text" value="{{$customers->name}}" disabled>
                    </div>
                    <div class="form-line col s6">
                        <label>Customer Phone Number</label>
                        <input type="tel" value="{{$customers->phone_number}}" disabled>
                    </div>
                    <div class="form-line col s12">
                        <label>Customer Email</label>
                        <input type="email" value="{{$customers->email}}" disabled>
                    </div>
                    </div>
                    <div class="form-line col s6">
                        <label>Package</label>
                        <input type="text" value="{{$orderdet->product_id}}" disabled>
                    </div>
                    <div class="form-line col s6">
                        <label>Price</label>
                        <input type="text" value="{{$orderdet->price}}" disabled>
                    </div>
                    <div class="form-line col s12">
                        <label>Invoice</label>
                        <input type="text" value="{{$orders->invoice}}">
                    </div>
                    <p class="black-text"><b>Harap melakukan pembayaran via transfer ke rekening NAMA_BANK 012345 an Pemilik</b></p>
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

</html>