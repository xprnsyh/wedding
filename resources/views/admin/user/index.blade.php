@extends('layouts.adminv2')
@section('css-add')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{ asset('plugin/image-uploader/image-uploader.css') }}" />
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users') }}">User</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <section class="events">
            <div class="tab-events">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="active" id="pills-users-tab" data-toggle="pill" href="#pills-users" role="tab"
                            aria-controls="pills-users" aria-selected="true"><span class="fa fa-database"></span> Users</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-roles-tab" data-toggle="pill" href="#pills-roles" role="tab"
                            aria-controls="pills-roles" aria-selected="false"><span class="fa fa-group"></span> Roles</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-permission-tab" data-toggle="pill" href="#pills-permission" role="tab"
                            aria-controls="pills-permission" aria-selected="false"><span class="fa fa-image"></span>
                            Permission</a>
                    </li>
                    <li class="nav-item">
                        <a id="pills-customer-tab" data-toggle="pill" href="#pills-customer" role="tab"
                            aria-controls="pills-customer" aria-selected="false"><span class="fa fa-user"></span>
                            Customer</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-users">
                    <section class="main-info">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                <div class="card __info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4>Undangan Kamu</h4>
                                                <p class="big-number">3</p>
                                            </div>
                                            <div class="col-5">
                                                <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                                    style="height: 100%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                                        viewBox="0 0 56 56" fill="none">
                                                        <rect width="56" height="56" rx="28" fill="#E83E8C"
                                                            fill-opacity="0.1" />
                                                        <path
                                                            d="M36 20H20C18.897 20 18 20.897 18 22V34C18 35.103 18.897 36 20 36H36C37.103 36 38 35.103 38 34V22C38 20.897 37.103 20 36 20ZM36 22V22.511L28 28.734L20 22.512V22H36ZM20 34V25.044L27.386 30.789C27.5611 30.9265 27.7773 31.0013 28 31.0013C28.2227 31.0013 28.4389 30.9265 28.614 30.789L36 25.044L36.002 34H20Z"
                                                            fill="url(#paint0_linear_3065_371)" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_3065_371" x1="19.875"
                                                                y1="22.32" x2="30.4456" y2="34.2868"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                <div class="card __info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4>Acara Kamu</h4>
                                                <p class="big-number">3</p>
                                            </div>
                                            <div class="col-5">
                                                <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                                    style="height: 100%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                                        viewBox="0 0 56 56" fill="none">
                                                        <rect width="56" height="56" rx="28" fill="#E83E8C"
                                                            fill-opacity="0.1" />
                                                        <path
                                                            d="M24.6474 30.7104L27.9964 33.9994L31.3464 30.7104C31.5529 30.5118 31.7172 30.2735 31.8295 30.0098C31.9417 29.7461 31.9996 29.4625 31.9996 29.1759C31.9996 28.8894 31.9417 28.6057 31.8295 28.3421C31.7172 28.0784 31.5529 27.8401 31.3464 27.6414C30.93 27.2304 30.3684 27 29.7834 27C29.1983 27 28.6368 27.2304 28.2204 27.6414L27.9964 27.8604L27.7724 27.6414C27.3561 27.2305 26.7948 27.0001 26.2099 27.0001C25.6249 27.0001 25.0636 27.2305 24.6474 27.6414C24.4408 27.8401 24.2765 28.0784 24.1642 28.3421C24.052 28.6057 23.9941 28.8894 23.9941 29.1759C23.9941 29.4625 24.052 29.7461 24.1642 30.0098C24.2765 30.2735 24.4408 30.5118 24.6474 30.7104Z"
                                                            fill="url(#paint0_linear_3065_363)" />
                                                        <path
                                                            d="M35 20H33V18H31V20H25V18H23V20H21C19.897 20 19 20.897 19 22V36C19 37.103 19.897 38 21 38H35C36.103 38 37 37.103 37 36V22C37 20.897 36.103 20 35 20ZM35.002 36H21V24H35L35.002 36Z"
                                                            fill="url(#paint1_linear_3065_363)" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_3065_363" x1="24.7446"
                                                                y1="28.0149" x2="29.4016" y2="32.8388"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_3065_363" x1="20.6875"
                                                                y1="20.9" x2="33.729" y2="31.5302"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                                <div class="card __info">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-7">
                                                <h4>Order Pending</h4>
                                                <p class="big-number">3</p>
                                            </div>
                                            <div class="col-5">
                                                <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                                    style="height: 100%">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                                        viewBox="0 0 56 56" fill="none">
                                                        <rect width="56" height="56" rx="28" fill="#E83E8C"
                                                            fill-opacity="0.1" />
                                                        <path
                                                            d="M37.822 23.431C37.73 23.2981 37.6072 23.1894 37.464 23.1144C37.3209 23.0393 37.1616 23.0001 37 23H23.333L22.179 20.23C22.0277 19.8652 21.7715 19.5536 21.4428 19.3346C21.1142 19.1156 20.7279 18.9992 20.333 19H18V21H20.333L25.077 32.385C25.153 32.5672 25.2812 32.7228 25.4454 32.8322C25.6097 32.9416 25.8026 33 26 33H34C34.417 33 34.79 32.741 34.937 32.352L37.937 24.352C37.9937 24.2006 38.0129 24.0378 37.9928 23.8774C37.9728 23.717 37.9142 23.5638 37.822 23.431ZM33.307 31H26.667L24.167 25H35.557L33.307 31Z"
                                                            fill="url(#paint0_linear_3065_367)" />
                                                        <path
                                                            d="M26.5 37C27.3284 37 28 36.3284 28 35.5C28 34.6716 27.3284 34 26.5 34C25.6716 34 25 34.6716 25 35.5C25 36.3284 25.6716 37 26.5 37Z"
                                                            fill="url(#paint1_linear_3065_367)" />
                                                        <path
                                                            d="M33.5 37C34.3284 37 35 36.3284 35 35.5C35 34.6716 34.3284 34 33.5 34C32.6716 34 32 34.6716 32 35.5C32 36.3284 32.6716 37 33.5 37Z"
                                                            fill="url(#paint2_linear_3065_367)" />
                                                        <defs>
                                                            <linearGradient id="paint0_linear_3065_367" x1="19.875"
                                                                y1="21.03" x2="28.8946" y2="32.6999"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_3065_367" x1="25.2812"
                                                                y1="34.435" x2="27.2687" y2="36.235"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                            <linearGradient id="paint2_linear_3065_367" x1="32.2812"
                                                                y1="34.435" x2="34.2687" y2="36.235"
                                                                gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#FFBBCC" />
                                                                <stop offset="1" stop-color="#F54291" />
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="users mt-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @include('layouts.alert')
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="#" class="btn btn-linear-primary mb-4" data-toggle="modal"
                                                    data-target="#addUsersModal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                        viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                        <g clip-path="url(#clip0_3033_2213)">
                                                            <path
                                                                d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                                fill="white" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_3033_2213">
                                                                <rect width="14" height="14" fill="white"
                                                                    transform="translate(0 0.5)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    New Users
                                                </a>
                                                <a href="#" class="btn btn-outline-grey mb-4 ml-2">
                                                    <i class="fa fa-ellipsis-v mr-2" aria-hidden="true"
                                                        style="font-size: 1.5em; vertical-align: -3px"></i>
                                                    Lainnya
                                                </a>
                                            </div>
                                        </div>
                                        <table id="datatables-users" class="display dt-responsive table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Email verified at</th>
                                                    <th>Roles</th>
                                                    <th width="130">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key => $user)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->email_verified_at }}</td>
                                                        <td>
                                                            @foreach ($user->roles as $role)
                                                                @switch($role->name)
                                                                    @case('admin')
                                                                        <span
                                                                            class="badge badge-pill badge-primary">{{ $role->name }}</span>
                                                                    @break

                                                                    @case('staff')
                                                                        <span
                                                                            class="badge badge-pill badge-orange">{{ $role->name }}</span>
                                                                    @break

                                                                    @case('customer')
                                                                        <span
                                                                            class="badge badge-pill badge-danger">{{ $role->name }}</span>
                                                                    @break

                                                                    @default
                                                                        <span
                                                                            class="badge badge-pill badge-warning">{{ $role->name }}</span>
                                                                @endswitch
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a href="#" class="action-icon edit" data-toggle="modal"
                                                                data-target="#editDataUser{{ $user->id }}">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="{{ route('admin.delete.user', ['id' => $user->id]) }}"
                                                                class="action-icon object-group">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="editDataUser{{ $user->id }}"
                                                        tabindex="-1" role="dialog" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header header">
                                                                    <h5 class="modal-title">Edit Data User</h5>
                                                                </div>
                                                                <form
                                                                    action="{{ route('admin.update.user', ['id' => $user->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="row clearfix">

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-bank">
                                                                                    <label for="Nama">Nama</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="name"
                                                                                        name="name"
                                                                                        value="{{ old('name') ? old('name') : $user->name }}">
                                                                                </div>
                                                                                <div class="form-group form-bank">
                                                                                    <label for="Email">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="email"
                                                                                        name="email"
                                                                                        value="{{ old('email') ? old('email') : $user->email }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    {{-- @foreach ($roles as $index => $role)
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox" name="roles[]"
                                                                                            value="{{ $role->name }}"
                                                                                            id="flexCheckDefault{{ $index }}">
                                                                                        <label class="form-check-label"
                                                                                            for="flexCheckDefault{{ $index }}">
                                                                                            {{ $role->name }}
                                                                                        </label>
                                                                                    @endforeach --}}

                                                                                    <select
                                                                                        class="roles-select form-control"
                                                                                        name="roles[]" multiple="multiple"
                                                                                        style="width: 100%; padding: 2px 5px !important;">
                                                                                        @foreach ($roles as $role)
                                                                                            @foreach ($user->roles as $rolee)
                                                                                                @if ($rolee->name == $role->name)
                                                                                                    <option
                                                                                                        value="{{ $role->id }}"
                                                                                                        selected>
                                                                                                        {{ $role->name }}
                                                                                                    </option>
                                                                                                @endif
                                                                                            @endforeach
                                                                                            <option
                                                                                                value="{{ $role->id }}">
                                                                                                {{ $role->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade photos" id="pills-roles" role="tabpanel" aria-labelledby="pills-roles-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-linear-primary mb-4" data-toggle="modal"
                                                data-target="#addRoleModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                    viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                    <g clip-path="url(#clip0_3033_2213)">
                                                        <path
                                                            d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3033_2213">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                New Role
                                            </a>
                                        </div>
                                    </div>
                                    <table id="datatables-roles"
                                        class=" table-scroll display dt-responsive table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name Role</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $i => $role)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $role->name }}</td>
                                                    <td>
                                                        @foreach ($role->permissions as $permission)
                                                            <span class="badge bg-blue">
                                                                {{ $permission->name }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editDataRole{{ $role->id }}"
                                                            class="action-icon edit">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('admin.delete.role', ['id' => $role->id]) }}"
                                                            class="action-icon object-group">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                    <div class="modal fade" id="editDataRole{{ $role->id }}"
                                                        tabindex="-1" role="dialog" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header header">
                                                                    <h5 class="modal-title">Edit Role</h5>
                                                                </div>
                                                                <form
                                                                    action="{{ route('admin.update.role', ['id' => $role->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">

                                                                        <div class="row clearfix">

                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="form-line">
                                                                                        <label class="form-label"> Name
                                                                                        </label>
                                                                                        <input type="text" name="name"
                                                                                            class="form-control"
                                                                                            value="{{ $role->name }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary waves-effect">Simpan</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-permission" role="tabpanel" aria-labelledby="pills-permission-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="#" class="btn btn-linear-primary mb-4" data-toggle="modal"
                                                data-target="#tambahDataPermission">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                    viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                    <g clip-path="url(#clip0_3033_2213)">
                                                        <path
                                                            d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3033_2213">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                New Permission
                                            </a>
                                        </div>
                                    </div>
                                    <table id="datatables-permission"
                                        class=" table-scroll display dt-responsive table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permissions as $i => $permission)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>
                                                        <a href="editevents.html" class="action-icon edit"
                                                            data-toggle="modal"
                                                            data-target="#editDataPermission{{ $permission->id }}">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('admin.delete.permission', ['id' => $permission->id]) }}"
                                                            class="action-icon object-group">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                    <div class="modal fade"
                                                        id="editDataPermission{{ $permission->id }}" tabindex="-1"
                                                        role="dialog" style="display: none;">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header header">
                                                                    <h4 class="modal-title">Edit Role</h4>
                                                                </div>
                                                                <form
                                                                    action="{{ route('admin.update.permission', ['id' => $permission->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row clearfix">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-bank">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control" id="name"
                                                                                        name="name"
                                                                                        value="{{ $permission->name }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">
                                                                            Close
                                                                        </button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary waves-effect">Simpan</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-customer" role="tabpanel" aria-labelledby="pills-customer-tab">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('admin.create.customer') }}"
                                                class="btn btn-linear-primary mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                    viewBox="0 0 14 15" fill="none" style="margin-right: 10px">
                                                    <g clip-path="url(#clip0_3033_2213)">
                                                        <path
                                                            d="M14 6.54545V8.45455C14 8.7197 13.9072 8.94508 13.7216 9.13068C13.536 9.31629 13.3106 9.40909 13.0455 9.40909H8.90909V13.5455C8.90909 13.8106 8.81629 14.036 8.63068 14.2216C8.44508 14.4072 8.2197 14.5 7.95455 14.5H6.04545C5.7803 14.5 5.55492 14.4072 5.36932 14.2216C5.18371 14.036 5.09091 13.8106 5.09091 13.5455V9.40909H0.954545C0.689394 9.40909 0.464015 9.31629 0.278409 9.13068C0.092803 8.94508 0 8.7197 0 8.45455V6.54545C0 6.2803 0.092803 6.05492 0.278409 5.86932C0.464015 5.68371 0.689394 5.59091 0.954545 5.59091H5.09091V1.45455C5.09091 1.18939 5.18371 0.964015 5.36932 0.778409C5.55492 0.592803 5.7803 0.5 6.04545 0.5H7.95455C8.2197 0.5 8.44508 0.592803 8.63068 0.778409C8.81629 0.964015 8.90909 1.18939 8.90909 1.45455V5.59091H13.0455C13.3106 5.59091 13.536 5.68371 13.7216 5.86932C13.9072 6.05492 14 6.2803 14 6.54545Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_3033_2213">
                                                            <rect width="14" height="14" fill="white"
                                                                transform="translate(0 0.5)" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                New Customer
                                            </a>
                                        </div>
                                    </div>
                                    <table id="datatables-permission"
                                        class=" table-scroll display dt-responsive table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>District</th>
                                                <th width="130">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($customers as $key => $customer)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('admin.show.customer', ['id' => $customer->id]) }}">
                                                            {{ $customer->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $customer->phone_number }}</td>
                                                    <td>
                                                        {{ $customer->address }}
                                                    </td>
                                                    <td>
                                                        {{ $customer->district->name ?? '' }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.customer', ['id' => $customer->id]) }}"
                                                            class="action-icon edit">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{ route('admin.delete.customer', ['id' => $customer->id]) }}"
                                                            class="action-icon object-group">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Users -->
    <div class="modal fade" id="addUsersModal" tabindex="-1" role="dialog" aria-labelledby="addUsersModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUsersModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.create.user') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-bank">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="type here...." value="{{ old('name') ?? old('name') }}">
                                </div>
                                <div class="form-group form-bank">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="type here...." value="{{ old('email') ?? old('email') }}">
                                </div>
                                <div class="form-group form-bank" style="margin-bottom: 0;">
                                    <label for="Role">Role</label>
                                </div>
                                <div class="form-group">
                                    <select class="roles-select form-control" name="roles[]" multiple="multiple"
                                        style="width: 100%; padding: 2px 5px !important;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Role -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRoleModalLabel">Tambah Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.create.role') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-bank">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="type here...." value="{{ old('name') ?? old('name') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Permission --}}
    <div class="modal fade" id="tambahDataPermission" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header header">
                    <h5 class="modal-title">Tambah Permission</h5>
                </div>
                <form action="{{ route('admin.create.permission') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row clearfix">

                            <div class="col-sm-12">
                                <div class="form-group form-bank">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="type here....">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="tambahDataUser" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header header">
                    <h4 class="modal-title">Tambah Data User</h4>
                </div>
                <form action="{{ route('admin.create.user') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="row clearfix">

                            <div class="col-sm-12">
                                <div class="form-group form-bank">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="type here...." value="{{ old('name') ?? old('name') }}">
                                </div>
                                <div class="form-group form-bank">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="type here...." value="{{ old('email') ?? old('email') }}">
                                </div>
                                <div class="form-group form-bank" style="margin-bottom: 0;">
                                    <label for="Role">Role</label>
                                </div>
                                <div class="form-group">
                                    @foreach ($roles as $role)
                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                            value="{{ $role->name }}" id="{{ $role->name }}flexCheckDefault">
                                        <label class="form-check-label" for="{{ $role->name }}flexCheckDefault">
                                            {{ $role->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-pink waves-effect">Simpan</button>
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div> --}}

    {{-- <div class="container-fluid"> --}}

    {{-- <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4 style="font-weight:500; font-size:20px;">Data Users</h4>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                <button type="button" class="btn btn-info waves-effect" style="padding: 8px 16px;"
                                    data-toggle="modal" data-target="#tambahDataUser">
                                    <i class="material-icons">add</i> <span>New User</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        @include('layouts.alert')
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Email verified at</th>
                                        <th>Roles</th>
                                        <th width="130">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email_verified_at }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    @switch($role->name)
                                                        @case('admin')
                                                            <span class="badge bg-teal">{{ $role->name }}</span>
                                                        @break

                                                        @case('staff')
                                                            <span class="badge bg-cyan">{{ $role->name }}</span>
                                                        @break

                                                        @case('customer')
                                                            <span class="badge bg-blue">{{ $role->name }}</span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-purple">{{ $role->name }}</span>
                                                    @endswitch
                                                @endforeach
                                            </td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-pink btn-circle waves-effect waves-circle waves-float"
                                                    data-toggle="modal" data-target="#editDataUser{{ $user->id }}">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <a href="{{ route('admin.delete.user', ['id' => $user->id]) }}"
                                                    class="btn btn-pink btn-circle waves-effect waves-circle waves-float">
                                                    <i class="material-icons">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editDataUser{{ $user->id }}" tabindex="-1"
                                            role="dialog" style="display: none;">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header header">
                                                        <h4 class="modal-title">Edit Data User</h4>
                                                    </div>
                                                    <form action="{{ route('admin.update.user', ['id' => $user->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="row clearfix">

                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-bank">
                                                                        <label for="Nama">Nama</label>
                                                                        <input type="text" class="form-control" id="name"
                                                                            name="name"
                                                                            value="{{ old('name') ? old('name') : $user->name }}">
                                                                    </div>
                                                                    <div class="form-group form-bank">
                                                                        <label for="Email">Email</label>
                                                                        <input type="text" class="form-control" id="email"
                                                                            name="email"
                                                                            value="{{ old('email') ? old('email') : $user->email }}">
                                                                    </div>
                                                                    <div class="form-check">
                                                                        @foreach ($roles as $index => $role)
                                                                    <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->name}}" id="flexCheckDefault{{ $index }}">
                                                                    <label class="form-check-label" for="flexCheckDefault{{ $index }}">
                                                                        {{$role->name}}
                                                                    </label>
                                                                    @endforeach 

                                                                        <select class="role-select" name="roles[]"
                                                                            multiple="multiple"
                                                                            style="width: 100%; padding: 2px 5px !important;">
                                                                            @foreach ($roles as $role)
                                                                                @foreach ($user->roles as $rolee)
                                                                                    @if ($rolee->name == $role->name)
                                                                                        <option value="{{ $role->id }}"
                                                                                            selected>{{ $role->name }}
                                                                                        </option>
                                                                                    @endif
                                                                                @endforeach
                                                                                <option value="{{ $role->id }}">
                                                                                    {{ $role->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-pink waves-effect">Simpan</button>
                                                            <button type="button" class="btn btn-link waves-effect"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal fade" id="tambahDataUser" tabindex="-1" role="dialog" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header header">
                                    <h4 class="modal-title">Tambah Data User</h4>
                                </div>
                                <form action="{{ route('admin.create.user') }}" method="post">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="row clearfix">

                                            <div class="col-sm-12">
                                                <div class="form-group form-bank">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="type here...."
                                                        value="{{ old('name') ?? old('name') }}">
                                                </div>
                                                <div class="form-group form-bank">
                                                    <label for="Email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email"
                                                        placeholder="type here...."
                                                        value="{{ old('email') ?? old('email') }}">
                                                </div>
                                                <div class="form-group form-bank" style="margin-bottom: 0;">
                                                    <label for="Role">Role</label>
                                                </div>
                                                <div class="form-group">
                                                    @foreach ($roles as $role)
                                                        <input class="form-check-input" type="checkbox" name="roles[]"
                                                            value="{{ $role->name }}"
                                                            id="{{ $role->name }}flexCheckDefault">
                                                        <label class="form-check-label"
                                                            for="{{ $role->name }}flexCheckDefault">
                                                            {{ $role->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-pink waves-effect">Simpan</button>
                                        <button type="button" class="btn btn-link waves-effect"
                                            data-dismiss="modal">Close</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
@endsection
@section('add-js')
    <!-- Tagsinput -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.roles-select').select2();
            $("#datatables-users").DataTable();
            $("#datatables-permission").DataTable();
            $("#datatables-roles").DataTable();
            $(".input-images").imageUploader();
        });
    </script>
@stop
