@extends('layouts.adminv2')
@section('css-add')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />

    <style>
    .striketrough{
        text-decoration: line-through;
    }
</style>
@endsection
@section('breadcrumb')
    <div>
        <div class="col-12 p-0">
            <div aria-label="breadcrumb" class="breadcrumb-wrapper">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="url('/')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <g clip-path="url(#clip0_3045_293)">
                                    <path
                                        d="M11.8471 6.94216V10.9806C11.8471 11.1265 11.7938 11.2527 11.6872 11.3592C11.5807 11.4658 11.4545 11.5191 11.3086 11.5191H8.07786V8.28831H5.92401V11.5191H2.69324C2.54741 11.5191 2.42121 11.4658 2.31464 11.3592C2.20807 11.2527 2.15478 11.1265 2.15478 10.9806V6.94216C2.15478 6.93655 2.15618 6.92814 2.15899 6.91692C2.16179 6.9057 2.16319 6.89729 2.16319 6.89168L7.00094 2.9037L11.8387 6.89168C11.8443 6.90289 11.8471 6.91972 11.8471 6.94216ZM13.7233 6.36163L13.2017 6.98423C13.1568 7.03471 13.0979 7.06556 13.025 7.07677H12.9997C12.9268 7.07677 12.8679 7.05714 12.8231 7.01788L7.00094 2.16331L1.17882 7.01788C1.11151 7.06275 1.0442 7.08238 0.976896 7.07677C0.90398 7.06556 0.845086 7.03471 0.800214 6.98423L0.278579 6.36163C0.233707 6.30554 0.214076 6.23963 0.219685 6.16391C0.225294 6.08819 0.256143 6.02789 0.312233 5.98302L6.36151 0.943359C6.541 0.797526 6.75414 0.724609 7.00094 0.724609C7.24773 0.724609 7.46087 0.797526 7.64036 0.943359L9.69324 2.65971V1.01908C9.69324 0.940555 9.71848 0.876052 9.76896 0.825571C9.81944 0.77509 9.88395 0.74985 9.96247 0.74985H11.5779C11.6564 0.74985 11.7209 0.77509 11.7714 0.825571C11.8218 0.876052 11.8471 0.940555 11.8471 1.01908V4.45177L13.6896 5.98302C13.7457 6.02789 13.7766 6.08819 13.7822 6.16391C13.7878 6.23963 13.7682 6.30554 13.7233 6.36163Z"
                                        fill="#F54291" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_3045_293">
                                        <rect width="14" height="11.0385" fill="white" transform="translate(0 0.480469)" />
                                    </clipPath>
                                </defs>
                            </svg></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.settings') }}">Pengaturan</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.list.order') }}">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content p-card">
        <section class="orders">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-sm-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            @include('layouts.alert')
                            <h1 class="form-title">Form Order</h1>
                            <hr />
                            <form action="{{ route('admin.update.order', ['id' => $order->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label for="CustomerName">Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control"
                                                placeholder="Please fill here..."
                                                value="{{ old('customer_name') ? old('customer_name') : $order->customer_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <div class="group">
                                                <label class="form-label required">No.HP</label>
                                            </div>
                                            <input type="text" name="customer_phone" class="form-control"
                                                placeholder="Please fill here..."
                                                value="{{ old('customer_phone') ? old('customer_phone') : $order->customer_phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="text" name="customer_email" class="form-control"
                                                placeholder="Please fill here..."
                                                value="{{ old('customer_email') ? old('customer_email') : $order->customer->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="Province">Province</label>
                                            <select name="province_id" id="province_id" class="form-control">
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}" {{ ($province->id === $district_id->province_id ) ? 'selected' : '' }}>{{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="City">City</label>
                                            <select name="city_id" class="form-control" id="city_id">
                                                @if($cities->count() > 0)
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}" {{ ($city->id === $district_id->city_id) ? 'selected' : '' }}>{{ $city->type }} {{ $city->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                <option value="" >Pilih Kota</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label for="District">District</label>
                                            <select name="district_id" class="form-control" id="district_id">
                                                @if($districts->count() > 0)
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}" {{ ($district->id === $district_id->id) ? 'selected' : '' }}>{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                <option value="">Pilih Kecamatan</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="CustomerName">Address</label>
                                            <textarea name="customer_address" class="form-control no-resize" id="" rows="3"
                                                placeholder="Please fill here..."
                                                no-resize>{{ $order->customer_address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 form-group mb-0">
                                        <label for="Product" class="mb-0">Product</label>
                                        <input type="hidden" name="product" id="product_id"
                                            value="{{ $order_detail->product_id ?? $order_detail->product_id }}" />
                                    </div>
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6 mt-3">
                                            <div class="card">
                                                <div class="card-body card-price text-center {{ old('product') == $product->id ? 'active' : false }}"
                                                    id="{{ $product->id }}">
                                                    <h5>{{ $product->name }}</h5>
                                                    
                                                    @if($product->discount()->where('is_active',true)->count() > 0)
                                                        @if($product->discount->discount_type == 'Presentase')
                                                            <?php
                                                                $harga_awal = $product->price;
                                                                $discount = $product->discount->amount;
                                                                $discount = ($discount/100) * $harga_awal;
                                                                $harga_akhir = ($harga_awal - $discount);
                                                            ?>
                                                            <p class="striketrough">RP {{ $product->price }}</p>
                                                            <p>RP {{$harga_akhir}}</p>
                                                        @else
                                                            <?php
                                                                $harga_awal = $product->price;
                                                                $discount = $product->discount->amount;
                                                                $harga_akhir = ($harga_awal - $discount);
                                                            ?>
                                                            <p class="striketrough">RP {{ $product->price }}</p>
                                                            <p>RP {{$harga_akhir}}</p>
                                                        @endif
                                                    @else
                                                        <p>{{ $product->price }}</p>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="PENDING"
                                                    {{ $order->status == 'PENDING' ? 'selected' : ' ' }}>PENDING
                                                </option>
                                                <option value="CONFIRMED"
                                                    {{ $order->status == 'CONFIRMED' ? 'selected' : ' ' }}>CONFIRMED
                                                </option>
                                                <option value="PROCESS"
                                                    {{ $order->status == 'PROCESS' ? 'selected' : ' ' }}>PROCESS
                                                </option>
                                                <option value="SUCCESS"
                                                    {{ $order->status == 'SUCCESS' ? 'selected' : ' ' }}>SUCCESS
                                                </option>
                                                <option value="EXPIRED"
                                                    {{ $order->status == 'EXPIRED' ? 'selected' : ' ' }}>EXPIRED
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="form-title">Invoice</h1>
                            <hr />
                            <div class="form-group">
                                <h2 class="form-subtitle">Sub Total</h2>
                                <div style="padding: 16px 0px;border-bottom: 1px solid #5b5b5b;">
                                    <p class="form-text-secondary">Paket Undangan <span class="float-right"
                                            id="subtotal">Rp.
                                            {{ $order->subtotal ? number_format($order->subtotal, 0, ',', '.') : '0' }}</span>
                                    </p>
                                    <p class="form-text-secondary">Discount <span class="float-right"
                                            id="discount">Rp.
                                            </span>
                                    </p>
                                    <!-- <p class="form-text-secondary">Ongkir X Banner <span class="float-right">Rp.
                                            20,000</span></p> -->
                                </div>
                                <div style="padding: 16px 0px">
                                    <h2 class="form-subtitle float-left">Total</h2>
                                    <h2 class="form-subtitle float-right" id="total">
                                        Rp.
                                        {{ $order->subtotal ? number_format($order->subtotal, 0, ',', '.') : '0' }}
                                    </h2>
                                </div>
                                <h5 class="form-text-secondary m-3">*Link Pembayaran akan dikirim melalui email.</h5>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="container-fluid">

        <!-- PAGE TITLE -->
        <div class="page-title">
            <h3>New Order</h3>
        </div>
        <!-- END PAGE TITLE -->

        <div class="row clearfix">

            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card card-order-new">
                    <div class="body">
                        @include('layouts.alert')
                        <form action="{{ route('admin.update.order', ['id' => $order->id]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 form-order">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="CustomerName">Customer Tes</label>
                                                <input type="text" name="customer_name" class="form-control"
                                                    value="{{ $order->customer->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="PhoneNumber">Phone Number</label>
                                                <input type="text" name="customer_phone" class="form-control"
                                                    value="{{ $order->customer->phone_number }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="text" name="customer_email" class="form-control"
                                                    value="{{ $order->customer->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="PENDING"
                                                        {{ $order->status == 'PENDING' ? 'selected' : ' ' }}>PENDING
                                                    </option>
                                                    <option value="CONFIRMED"
                                                        {{ $order->status == 'CONFIRMED' ? 'selected' : ' ' }}>CONFIRMED
                                                    </option>
                                                    <option value="PROCESS"
                                                        {{ $order->status == 'PROCESS' ? 'selected' : ' ' }}>PROCESS
                                                    </option>
                                                    <option value="SUCCESS"
                                                        {{ $order->status == 'SUCCESS' ? 'selected' : ' ' }}>SUCCESS
                                                    </option>
                                                    <option value="EXPIRED"
                                                        {{ $order->status == 'EXPIRED' ? 'selected' : ' ' }}>EXPIRED
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Province</label>
                                                <select name="province_id" id="province_id" class="form-control">
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select name="city_id" id="city_id" class="form-control">
                                                    <option value="">Pilih Kabupaten/Kota</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select name="district_id" id="district_id" class="form-control">
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <textarea name="customer_address" id="address" cols="30" rows="3"
                                                    class="form-control no-resize"
                                                    style="height: 100px">{{ $order->customer->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="Package">Package</label>
                                                <input type="hidden" id="product_id" name="product"
                                                    value="{{ $order_detail->product_id }}">
                                                <div class="row">
                                                    @foreach ($products as $product)

                                                        <div class="col-md-4 col-sm-4 col-xs-6">
                                                            <div class="card card-product{{ $product->id == $order_detail->product_id ? ' active' : ' ' }}"
                                                                id="{{ $product->id }}">
                                                                <div class="card-body text-center">
                                                                    <h5>{{ $product->name }}</h5>
                                                                    <span>{{ $product->price }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group" style="margin-bottom: 0px">
                                                <label for="Total">Total</label>
                                                <div class="price-wrapper">
                                                    <div class="card-price" id="subtotal">
                                                        <span>Rp. {{ number_format($order->subtotal, 0) }}</span>
                                                    </div>
                                                    <div class="btn-wrapper">
                                                        <button type="submit"
                                                            class="btn btn-pink waves-effect">Update</button> <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('add-js')
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        $(".card-price").click(function() {
            const id = $(this).attr("id");
            $(`input#product_id`).val(id);

            if (!$(this).hasClass("active")) {
                $(".card-price").removeClass("active");
                $(this).addClass("active");
            }
            $.ajax({
                url: "{{ url('/api/price') }}",
                type: "GET",
                data: {
                    product_id: $(this).attr('id')
                },
                success: function(data) {
                    var subtotal = formatRupiah(data.price, 'Rp. ');
                    var discount = formatRupiah(data.discount, 'Rp. ');
                    var total = data.price - data.discount;
                    total = formatRupiah(total, 'Rp. ');
                    $('#subtotal').html(subtotal)
                    $('#discount').html(discount)
                    $('#total').html(total)
                },
                error: function() {
                    $('#subtotal').html('0')
                }
            });
        });

        // $('.card-product').on('click', function() {
        //     $id = $(this).attr('id');
        //     $idactive = $('.card-product.active').attr('id');
        //     $(this).addClass('active');
        //     if ($idactive !== $id) {
        //         $('.card-product.active').removeClass('active')
        //         $(this).addClass('active');
        //     }
        //     $('#product_id').val($id);
        //     $.ajax({
        //         url: "{{ url('/api/price') }}",
        //         type: "GET",
        //         data: {
        //             product_id: $(this).attr('id')
        //         },
        //         success: function(html) {
        //             var subtotal = formatRupiah(html.data, 'Rp ');
        //             $('#subtotal').html('<span>' + subtotal + ' </span>')
        //         },
        //         error: function() {
        //             $('#subtotal').html('<span>0</span>')
        //         }
        //     });

        // })

        $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: {
                    province_id: $(this).val()
                },
                success: function(html) {

                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="' + item.id + '">' + item.type + ' ' + item.name +
                            '</option>')
                    })
                }
            });
            $('#address').html($('#province_id option:selected').text())
        })
        $('#city_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: {
                    city_id: $(this).val()
                },
                success: function(html) {
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="' + item.id + '">' + item
                            .name + '</option>')
                    })
                }
            });
            const addressBefore = $('#address').html();
            const newAddress = addressBefore + ", " + $('#city_id option:selected').text()
            $('#address').html(newAddress)
        })
        $('#district_id').on('change', function() {
            const addressBefore = $('#address').html();
            const newAddress = addressBefore + ", " + $('#district_id option:selected').text()
            $('#address').html(newAddress)
        })
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ""),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "," : "";
                rupiah += separator + ribuan.join(",");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>

@stop
