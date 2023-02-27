@extends('layouts.adminv2')
@section('breadcrumb')
    <div>
        <div class="col-12 p-0">
            <div aria-label="breadcrumb" class="breadcrumb-wrapper">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/admin/index.html">
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
                            href="{{ route('admin.list.newsletter') }}">Newsletter</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Show</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content p-card">
        <section class="settings newsletter">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 mt-3 py-5e">
                    <div class="card">
                        <div class="card-header message-heading text-center"
                            style="padding: 25px 0; background: #f8f9fa; border: none">
                            <img src="{{ asset('admin-bsb/images/logo.png') }}" alt="Logo Hoofey" width="140" />
                        </div>
                        <div class="card-body" style="padding: 35px 153px;">
                            {!! $newsletter->content !!}
                        </div>
                    </div>
                    <div class="card-footer text-center" style="background: #f8f9fa; padding: 35px 0; border: none">
                        <p style="font-size: 12px; color: #868e96; margin: 0px">
                            © 2021 Hoofey. All rights reserved.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-3 py-5e">
                    <div class="card newsletter-detail">
                        <div class="card-body" style="padding: 24px">
                            <h1 class="form-title">Detail</h1>
                            <hr />
                            <div class="form-group" style="margin-top: 24px">
                                <h1 class="form-title" style="font-size: 1em">Subject</h1>
                                <p style="font-size: 14px">{{ $newsletter->subject }}</p>
                            </div>
                            <div class="form-group">
                                <label for="Caption">To</label>
                                <input type="text" name="mail" autocomplete="none" class="form-control" id="Search" />
                            </div>
                            <div class="form-group list-email">
                                @if ($failed_newsletter->count() > 0)
                                    @foreach ($failed_newsletter as $n)
                                        @if ($n->email !== null)
                                            <span style="color:red; font-size: 12px;">{{ $n->email }}</span>
                                        @elseif ($n->email_sended !== null)
                                            <span style="color:#2EB85C; font-size: 12px;">{{ $n->email_sended }}</span>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($mails as $m)
                                        <span style="color:#2EB85C; font-size: 12px;">{{ $m }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="container-fluid">
        <div class="page-title">
            <h3 style="font-weight: 500;">Newsletter</h3>
        </div>

        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="card">
                            <div class="card-header logo-wrapper" style="background: #F8F9FA; padding: 25px 0;">
                                <img src="{{ asset('admin-bsb/images/logo.png') }}" alt=""
                                    style="width: 139px; height: 40px;">
                            </div>
                            <div class="body">
                                <table class="table newsletter-show">
                                    <tr>
                                        <td class="p-5">{!! $newsletter->content !!}</td>

                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer text-center" style="background: #F8F9FA; padding: 35px 0;">
                                <p style="font-size: 12px; color: #868E96; margin: 0px;">&#169; {{ date('Y') }} Hoofey.
                                    All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="card">
                            <div class="card-header text-center"
                                style="padding: 30px 0; font-size: 20px; border-bottom: 1px solid #DDDDDD;">Detail</div>
                            <div class="body">
                                <div>
                                    <p>Subject:</p>
                                    <p><b>{{ $newsletter->subject }}</b></p>
                                </div>
                                <div>
                                    <p>To:</p>
                                    <p>
                                        @foreach ($mails as $m)
                                            <span style="color: #2EB85C;">{{ $m }}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="modal fade" id="tambahDataGroup" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="">
                <div class="modal-header header">
                    <h4 class="modal-title">New Group</h4>
                </div>
                <form action="{{ route('admin.store.groupcontact') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="col-sm-12 col-md-12 col-lg-12 ">
                                <div class="form-group form-bank" id="wrapper-group-contact">
                                    <label for="name">Group Name</label>
                                    <input type="text" class="form-control" id="group_name" name="group_name"
                                        placeholder="type here....">
                                </div>
                                <div class="form-group form-bank">
                                    <label for="AccountNumber">Email Contact</label>
                                    <input type="text" class="form-control" name="contact" placeholder="type here....">
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

@endsection
@section('add-js')
    <script>
        $(document).ready(function($) {
            $('.list-email span').each(function() {
                $(this).attr('searchData', $(this).text().toLowerCase());
            });
            $('#Search').on('keyup', function() {
                var dataList = $(this).val().toLowerCase();
                $('.list-email span').each(function() {
                    if ($('#Search').val() == "") {
                        $(this).show();
                    } else {
                        if ($(this).filter('[searchData *= ' + dataList + ']').length > 0 ||
                            dataList
                            .length < 1 || $('#Search').val() == "") {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    }
                });
            });
        });
    </script>
@endsection
