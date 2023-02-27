<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    {{-- icon --}}
    <link rel="shortcut icon" href="{{ asset('img/primary-icon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />
    <title>Register | Hoofey.id - Don't Worry be Hoofey</title>
</head>

<body>
    <nav class="navbar login navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo-pink.png') }}" alt="Hoofey.id" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/price') }}">Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/story') }}">Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('login') }}">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="login">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-11 col-md-12">
                    <div class="row justify-content-center">
                        <div
                            class="
                  col-md-12
                  mb-5
                  d-lg-none d-md-none
                  hidden-img
                  d-sm-flex d-xs-flex
                  justify-content-center
                ">
                            <div class="img-wrapper text-center">
                                <img src="{{ asset('img/review2.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="text-heading">
                                <h1>
                                    Don't <span>Worry</span>, <br />Be <span>Hoofey</span>
                                </h1>
                            </div>
                            <form action="{{ route('register') }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="Name">Your Name</label>
                                    <input class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" placeholder="Your Name" autocomplete="name"
                                        value="{{ old('name') ? old('name') : false }}" />
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email Address</label>
                                    <input class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                        type="text" name="email" placeholder="Your email address"
                                        value="{{ $email ? $email : false }}" autocomplete="email"
                                        value="{{ old('email') ? old('email') : false }}" />
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" placeholder="Your password" />
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Confirmation</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        placeholder="Your password" />
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="agree" id="agree" class="form-check-input" />
                                    <label for="agree">By creating an account you agree to the <a href="#">terms of
                                            use</a> and our <a href="#">privacy policy</a></label>
                                </div>
                                <button type="submit" class=" btn btn-block btn-pink-primary text-center text-white">
                                    Daftar
                                </button>
                            </form>
                            <div class="msg mt-3" style="text-align: center">
                                <h6>Already have an account? <a href="{{ route('login') }}">Log in</a></h6>
                            </div>
                        </div>
                        <div class="d-none d-sm-none col-md-7 d-md-flex justify-content-end">
                            <div class="img-wrapper">
                                <img src="{{ asset('img/review2.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>

{{-- <body>
    <div class="white valign-wrapper">
        <div class="row">
            <div class="col s12 m6 l6 xl6" id="left-forms">
                <div class="form-group">
                    <img src="{{asset('admin-bsb/images/logo.png')}}" alt="logo" width="25%" style="margin: 0 0 10vh 0;">
                    <h2>Sign Up</h2>
                    <div class="msg">Sign Up to access Hoofey</div><br>
                    <form action="{{route('register')}}" method="post">
                    @csrf
                        <div class="input-group">
                            <h4>Your Name</h4>
                            <input type="text" name="name" placeholder="Your name"/>
                        </div>
                        <div class="input-group">
                            <h4>Your Email</h4>
                            <input type="email" name="email" placeholder="name@domain.com"/>
                        </div>
                        <div class="input-group">
                            <h4>Password</h4>
                            <input type="password" name="password" placeholder="At least 8 characters"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree" id="agree" class="filled-in chk-col-pink"/>
                            <label for="agree">By creating an account you agree to the <a href="#">terms of use</a> and our <a href="#">privacy policy</a></label>
                        </div>
                        <div class="col s12">
                            <div class="input-group">
                                <button class="btn btn-block btn-pink-col waves-effect" type="submit" style="padding: 6px 1px;">Register Now</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="msg" style="text-align: center">
                    <h6>Already have an account? <a href="{{route('login')}}">Log in</a></h6>
                </div>
            </div>
            <div class="col s12 m6 l6 xl6" id="right-img">
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
</body> --}}
