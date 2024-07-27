@extends('layouts.admin')
@section('css-add')
<!-- JQuery DataTable Css -->
<link href="{{asset('admin-bsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<!-- Bootstrap Select Css -->
<link href="{{asset('admin-bsb/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

<!-- Dropzone Css -->
<link href="{{asset('admin-bsb/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">

    <!-- END PAGE TITLE -->

    <div class="row clearfix">

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <h4 style="font-weight:500; font-size:20px;">
                                <i class="material-icons">
                                    add_shopping_cart
                                </i> INVOICE {{$order->invoice}}
                            </h4>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ route('admin.export.invoice.pdf', $order->invoice) }}" target="_blank">
                                                <i class="material-icons">print</i>
                                                Print Invoice
                                            </a>
                                        </li>
                                        <li><a href="{{url('send/email')}}">
                                                <i class="material-icons">email</i>
                                                Send Email
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>

                <div class="body">

                    <div class="row clearfix">

                        {{-- Data Customer --}}

                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-3 col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <b>Name Customer</b>
                                        <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{$order->customer_name}}" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <b>Email Customer</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control email" name="customer_email" id="customer_email" placeholder="Ex: example@example.com" value="{{$order->customer->email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <b>Phone Number</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">phone</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control mobile-phone-number" name="customer_phone" placeholder="Ex: +00 (000) 000-00-00" value="{{$order->customer_phone}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="form-line">
                                    <b>Status</b>
                                    <select name="status" id="status" class="form-control" disabled>
                                        <option value="PENDING" {{($order->status == "PENDING") ? 'selected' : ' '}}>PENDING</option>
                                        <option value="CONFIRMED" {{($order->status == "CONFIRMED") ? 'selected' : ' '}}>CONFIRMED</option>
                                        <option value="PROCESS" {{($order->status == "PROCESS") ? 'selected' : ' '}}>PROCESS</option>
                                        <option value="SUCCESS" {{($order->status == "SUCCESS") ? 'selected' : ' '}}>SUCCESS</option>
                                        <option value="EXPIRED" {{($order->status == "EXPIRED") ? 'selected' : ' '}}>EXPIRED</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-6 col-sm-12">
                                <br>
                                <div class="form-line">
                                    <b>Province</b>
                                    <select name="province_id" id="province_id" class="form-control" disabled>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ ($province->id === $district_id->province_id ) ? 'selected' : '' }}>{{ $province->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-line">
                                    <b>City</b>
                                    <select name="city_id" id="city_id" class="form-control" disabled>
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
                                <br>
                                <div class="form-line">
                                    <b>District</b>
                                    <select name="district_id" id="district_id" class="form-control" disabled>
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
                            <div class="col-md-6 col-sm-12">
                                <b>Address</b>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="customer_address" id="address" cols="30" rows="10" class="form-control no-resize" disabled>{{$order->customer_address}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <b>Products</b>
                                        <select id="product_id" name="product_id" class="form-control show-tick" disabled>
                                            <option value="">None</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{($product->id == $order_detail->product_id) ? 'selected' : ' '}}>{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="col-md-4 col-sm-6">
                                    <h3>Subtotal</h3>
                                </div>
                                <div class="col-md-8 col-sm-6">
                                    <span id="subtotal">
                                        <h3>Rp {{number_format($order->subtotal,0)}}</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('admin.edit.order', ['invoice' => $order->invoice])}}" class="btn bg-orange waves-effect">Edit</a>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection

@section('js')


<script>
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
                    $('#city_id').append('<option value="' + item.id + '">' + item.name + '</option>')
                })
            }
        });
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
                    $('#district_id').append('<option value="' + item.id + '">' + item.name + '</option>')
                })
            }
        });
    })



    $('#product_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/price') }}",
            type: "GET",
            data: {
                product_id: $(this).val()
            },
            success: function(html) {
                $('#subtotal').html('<h3> Rp ' + html.data + ' </h3>')
            },
            error: function() {
                $('#subtotal').html('<h3>0</h3>')
            }
        });
    })

</script>

@stop