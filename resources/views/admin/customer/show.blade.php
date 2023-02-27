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
                        <div class="col-xs-12 col-sm-6">
                            <h4 style="font-weight:500; font-size:20px;">{{$customer->name ?? ''}}</h4>
                        </div>

                    </div>
                </div>

                <div class="body">



                    <div class="row clearfix">

                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <b>Name Customer</b>
                                        <input type="text" name="name" id="customer_name" class="form-control" value="{{$customer->name}}" disabled>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <b>Email Customer</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="email" class="form-control email" name="email" id="customer_email" placeholder="Ex: example@example.com" value="{{$customer->email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <b>Phone Number</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">phone</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control mobile-phone-number" name="phone_number" placeholder="Ex: +00 (000) 000-00-00" value="{{$customer->phone_number}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <div class="col-md-6 col-sm-12">
                                <b>Address</b>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="address" id="address" cols="30" rows="10" class="form-control no-resize" disabled>{{$customer->address}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <br>
                                <div class="form-line">
                                    <b>Province</b>
                                    <select name="province_id" id="province_id" class="form-control" disabled>
                                        @foreach($provinces as $province)
                                        <option value="{{$province->id}}">{{$province->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-line">
                                    <b>City</b>
                                    <select name="city_id" id="city_id" class="form-control" disabled>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <br>
                                <div class="form-line">
                                    <b>District</b>
                                    <select name="district_id" id="district_id" class="form-control" disabled>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <a href="{{route('admin.edit.customer',['id' => $customer->id])}}" class="btn btn-warning btn-waves-float">
                                Edit
                            </a>
                        </div>


                    </div>


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
</script>
@stop