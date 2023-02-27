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
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.list.post') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.show.post', ['slug' => $post->slug]) }}">Show</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <section class="settings posts">
            <div class="row posts-list">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 py-5e">
                    <div class="card">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h4 style="font-weight:600; font-size:20px;">{{ $post->title }}</h4>
                                    <a href="{{ route('admin.edit.post', ['id' => $post->id]) }}"
                                        class="btn btn-primary px-4 py-1 mt-2">Edit</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('admin/assets/images/blogs/' . $post->featured_image) }}"
                                    alt="blogpicture" width="100%" class="mt-4 mb-5" />
                            </div>
                            <div class="text-section">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <!-- Tagsinput -->
    <script src="{{ asset('admin-bsb/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
    <script>
        $(function() {
            //CKEditor
            CKEDITOR.replace('body');
            CKEDITOR.config.height = 300;
            CKEDITOR.config.readOnly = true;
        });
    </script>
@stop
