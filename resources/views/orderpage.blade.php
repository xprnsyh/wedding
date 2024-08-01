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
                    <div class="circle-outlined">
                        <div class="circle-filled">
                            1
                        </div>
                    </div>

                    <span class="garis-order"></span>
                </div>
                <div class="wrap-circle">
                    <div class="circle-outlined">
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
                    <h4>Order Information</h4>
                    <p>Please fill up the blank fields bellow</p>
                </div>
            </div>
        </div>
        <div class="row order-filled">
            <div class="col s12 m6">
                <div class="paket-wrapper">
                    <div class="img-wrapper">
                        <img src="{{ asset('admin-bsb/images/loginimg.png') }}" alt="" width="420px" height="270px"
                            style="object-fit: cover; object-position: center;">
                    </div>
                    <div class="img-caption">
                        <div class="row">
                            <div class="col s12 m12">

                                <div class="paket">
                                    <span id="name">Basic</span> <br>
                                    <span>Paket <span id="paket_name">Basic</span></span>
                                </div>
                                <div id="price" class="harga">

                                    Rp. {{ number_format($product[0]->price, 0) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('store.order') }}" method="post" enctype="multipart/form-data">
                <div class="col s12 m6">
                    <div class="form-wrapper form-order">
                        <div class="row justify-content-center">
                            <div class="form-group">
                                @csrf
                                <label for="costumerName">Customer Name</label>
                                <input type="text" name="customer_name" class="form-control" id="costumerName"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="exampleCheck1">Choose Your Package</label>
                                <select name="product" class="form-control" id="package">
                                    @foreach ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="PhoneNumber">Phone Number</label>
                                <input type="text" name="customer_phone" class="form-control" id="PhoneNumber"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="customer_email" class="form-control" id="email"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="city">Your City</label>
                                <input type="text" name="city" class="form-control" id="city"
                                    placeholder="Please type here...">
                            </div>
                            <div class="form-group">
                                <label for="yourAddress">Your Address</label>
                                <textarea class="form-control" name="customer_address" id="yourAddress"
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12" id="btn-book" style="display: none">
                    <div class="btn-wrapper">
                        <button type="submit" class="btn btn-pink-col waves-effect">Continue to Book</button> <br>
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
    {{-- <div class="form-group" style="margin-top: -7px;">
        @include('layouts.alert')
        <form action="{{ route('store.order') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="col s12 m9" style="margin: 0 0 2vh 0;">
                <div class="input-group">
                    <h6>Customer Name</h6>
                    <input type="text" name="customer_name" />
                </div>
            </div>
            <div class="col s12 m9" style="margin: 0 0 2vh 0;">
                <div class="input-group">
                    <h6>Phone Number</h6>
                    <input type="text" name="customer_phone" />
                </div>
            </div>
            <div class="col s12 m9" style="margin: 0 0 2vh 0;">
                <div class="input-group">
                    <h6>Email Address</h6>
                    <input type="email" name="email">
                </div>
            </div>
            <div class="col s12 m9" style="margin: 0 0 2vh 0;">
                <div class="input-group">
                    <h6>Your Address</h6>
                    <input type="text" name="customer_address">
                </div>
            </div>
            <div class="col s12 m9" style="margin: 0 0 4vh 0;">
                <div class="input-group">
                    <h6>Product Package</h6>
                    <select name="product">
                        @foreach ($product as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col s12 m9">
                <div class="input-group">
                    <button class="btn btn-block btn-pink-col waves-effect" type="submit"
                        style="padding: 6px 1px;">Order Now</button>
                </div>
            </div>
        </form>
    </div> --}}
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

            $('#package').on('change', function() {
                $name = $(this).val(); //mengambil value id
                console.log($name)
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "/order/getproduct/" + $name,
                    success: function(data) {
                        $("#name").html(data.name);
                        $("#paket_name").html(data.name);
                        console.log()
                        $("#price").html(numberWithCommas(data.price));
                    }
                })
            })

            function numberWithCommas(x) {
                return "Rp. " + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

        })
    </script>
</body>

</html>
