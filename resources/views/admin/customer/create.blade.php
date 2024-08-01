@extends('layouts.adminv2')
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users') }}">User</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.users') }}">Customer</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.create.customer') }}">Create</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <section class="users">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store.customer') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row ">
                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group form-bank">
                                            <label for="name">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name" name="name"
                                                placeholder="type here...." value="{{ old('name') ?? old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group form-bank">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="customer_email" name="email"
                                                placeholder="email@example.com"
                                                value="{{ old('email') ?? old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group form-bank">
                                            <label for="PhoneNumber">Phone Number</label>
                                            <input type="text" class="form-control" id="customer_phone"
                                                name="phone_number" placeholder="085xxx.."
                                                value="{{ old('phone_number') ?? old('phone_number') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group form-bank">
                                            <label>Address</label>
                                            <textarea name="address" id="address" cols="30" rows="11"
                                                class="form-control no-resize"
                                                placeholder="Your address....">{{ old('address') ?? old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group form-bank">
                                            <label>Province</label>
                                            <select name="province_id" id="province_id" class="form-control">
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-bank">
                                            <label>City</label>
                                            <select name="city_id" id="city_id" class="form-control">
                                                <option value="">Pilih Kabupaten/Kota</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-bank">
                                            <label>District</label>
                                            <select name="district_id" id="district_id" class="form-control">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-block mt-4 btn-primary mt-3">
                                            Tambah Customer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('add-js')

    <script>
        $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                dataType: "json",
                data: {
                    province_id: $(this).val()
                },
                success: function(html) {

                    console.log(html.data)
                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="' + item.id + '">' + item.name +
                            '</option>')
                    })
                },
                error: function(e) {
                    console.log(e.responseText)
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
                        $('#district_id').append('<option value="' + item.id + '">' + item
                            .name + '</option>')
                    })
                },
                error: function(e) {
                    console.log(e.responseText)
                }
            });
        })
    </script>
@stop
