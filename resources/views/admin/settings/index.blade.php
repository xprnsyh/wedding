@extends('layouts.adminv2')
@section('css-add')
    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
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
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content p-card">
        <section class="main-info">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mt-3">
                    <div class="card __info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h4>Total Revenue</h4>
                                    <p class="big-number">{{ number_format($orders->sum('subtotal')) }}</p>
                                </div>
                                <div class="col-5">
                                    <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                        style="height: 100%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56"
                                            fill="none">
                                            <rect width="56" height="56" rx="28" fill="#E83E8C" fill-opacity="0.1" />
                                            <path
                                                d="M36 20H20C18.897 20 18 20.897 18 22V34C18 35.103 18.897 36 20 36H36C37.103 36 38 35.103 38 34V22C38 20.897 37.103 20 36 20ZM36 22V22.511L28 28.734L20 22.512V22H36ZM20 34V25.044L27.386 30.789C27.5611 30.9265 27.7773 31.0013 28 31.0013C28.2227 31.0013 28.4389 30.9265 28.614 30.789L36 25.044L36.002 34H20Z"
                                                fill="url(#paint0_linear_3065_371)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3065_371" x1="19.875" y1="22.32"
                                                    x2="30.4456" y2="34.2868" gradientUnits="userSpaceOnUse">
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
                                    <h4>Total User</h4>
                                    <p class="big-number">{{ $users->count() }}</p>
                                </div>
                                <div class="col-5">
                                    <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                        style="height: 100%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56"
                                            fill="none">
                                            <rect width="56" height="56" rx="28" fill="#E83E8C" fill-opacity="0.1" />
                                            <path
                                                d="M24.6474 30.7104L27.9964 33.9994L31.3464 30.7104C31.5529 30.5118 31.7172 30.2735 31.8295 30.0098C31.9417 29.7461 31.9996 29.4625 31.9996 29.1759C31.9996 28.8894 31.9417 28.6057 31.8295 28.3421C31.7172 28.0784 31.5529 27.8401 31.3464 27.6414C30.93 27.2304 30.3684 27 29.7834 27C29.1983 27 28.6368 27.2304 28.2204 27.6414L27.9964 27.8604L27.7724 27.6414C27.3561 27.2305 26.7948 27.0001 26.2099 27.0001C25.6249 27.0001 25.0636 27.2305 24.6474 27.6414C24.4408 27.8401 24.2765 28.0784 24.1642 28.3421C24.052 28.6057 23.9941 28.8894 23.9941 29.1759C23.9941 29.4625 24.052 29.7461 24.1642 30.0098C24.2765 30.2735 24.4408 30.5118 24.6474 30.7104Z"
                                                fill="url(#paint0_linear_3065_363)" />
                                            <path
                                                d="M35 20H33V18H31V20H25V18H23V20H21C19.897 20 19 20.897 19 22V36C19 37.103 19.897 38 21 38H35C36.103 38 37 37.103 37 36V22C37 20.897 36.103 20 35 20ZM35.002 36H21V24H35L35.002 36Z"
                                                fill="url(#paint1_linear_3065_363)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_3065_363" x1="24.7446" y1="28.0149"
                                                    x2="29.4016" y2="32.8388" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFBBCC" />
                                                    <stop offset="1" stop-color="#F54291" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_3065_363" x1="20.6875" y1="20.9"
                                                    x2="33.729" y2="31.5302" gradientUnits="userSpaceOnUse">
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
                                    <h4>Total Customer</h4>
                                    <p class="big-number">{{ $customers->count() }}</p>
                                </div>
                                <div class="col-5">
                                    <div class=" icon-card wrapper d-flex align-items-center justify-content-end "
                                        style="height: 100%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 56 56"
                                            fill="none">
                                            <rect width="56" height="56" rx="28" fill="#E83E8C" fill-opacity="0.1" />
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
                                                <linearGradient id="paint0_linear_3065_367" x1="19.875" y1="21.03"
                                                    x2="28.8946" y2="32.6999" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFBBCC" />
                                                    <stop offset="1" stop-color="#F54291" />
                                                </linearGradient>
                                                <linearGradient id="paint1_linear_3065_367" x1="25.2812" y1="34.435"
                                                    x2="27.2687" y2="36.235" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFBBCC" />
                                                    <stop offset="1" stop-color="#F54291" />
                                                </linearGradient>
                                                <linearGradient id="paint2_linear_3065_367" x1="32.2812" y1="34.435"
                                                    x2="34.2687" y2="36.235" gradientUnits="userSpaceOnUse">
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
        <section class="settings">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.post') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-archive" style="font-size: 40px"></span>
                                <h5>Posts</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.users') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-group" style="font-size: 40px"></span>
                                <h5>Users</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.category') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-cubes" style="font-size: 40px"></span>
                                <h5>Categories</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.product') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-cube" style="font-size: 40px"></span>
                                <h5>Product</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.audio') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-file-audio-o" style="font-size: 40px"></span>
                                <h5>Audios</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.banks') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-bank" style="font-size: 40px"></span>
                                <h5>Banks</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.newsletter') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-file-text" style="font-size: 40px"></span>
                                <h5>Newsletter</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.payment') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-credit-card-alt" style="font-size: 40px"></span>
                                <h5>Payment</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.index.list_bank') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-credit-card-alt" style="font-size: 40px"></span>
                                <h5>List Bank Angpao</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.list.discount') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-percent" style="font-size: 40px"></span>
                                <h5>List Discount</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-4">
                    <div class="card">
                        <a href="{{ route('admin.index.list_template') }}">
                            <div class="card-body menu-settings text-center" style="padding: 32px">
                                <span class="fa fa-envelope-open" style="font-size: 40px"></span>
                                <h5>List Template</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="events event-settings">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="form-title">List Wedding</h1>
                                <div class="btn btn-outline-grey">
                                    <span class="fa fa-upload mr-2"></span> Upload
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mt-3" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Acara</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $event->tanggal_resepsi }}</td>
                                                <td>{{ $event->jam_mulai_resepsi }} -
                                                    {{ $event->jam_selesai_resepsi }}
                                                </td>
                                                <td class="text-pink">
                                                    {{ $event->nama_panggilan_mempelai_pria }}
                                                    & {{ $event->nama_panggilan_mempelai_wanita }}
                                                </td>
                                                <td>{{ $event->lokasi_resepsi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="form-title">List Orders</h1>
                                <div class="btn btn-outline-grey">
                                    <span class="fa fa-upload mr-2"></span> Upload
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mt-3" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Order</th>
                                            <th scope="col">Invoice</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordersPending as $order)
                                            <tr>
                                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                                <td class="text-pink">{{ $order->invoice }}</td>
                                                <td>{{ $order->customer_name }}</td>
                                                <td>
                                                    <span class="badge badge-pill badge-orange">Pending</span>
                                                </td>
                                                <td>Rp. {{ $order->subtotal }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit.order', ['invoice' => $order->invoice]) }}"
                                                        class="action-icon edit">
                                                        <i class="fa fa-pencil-square-o"></i>
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
        </section>
    </div>
@endsection
@section('add-js')
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
@endsection
