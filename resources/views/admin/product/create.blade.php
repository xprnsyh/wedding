@extends('layouts.adminv2')
@section('css-add')
    <!-- Image Uploader -->
    <link href="{{ asset('plugin/image-uploader/image-uploader.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
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
                            href="{{ route('admin.list.product') }}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.create.product') }}">Create</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content p-card">
        <section class="settings posts">
            @if (session('success') || session('error'))
                <div class="row mt-3">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 mt-3 py-5e">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="form-title">New Product</h1>
                            <hr />
                            <form action="{{ route('admin.store.product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="productName">Product Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') ?? old('name') }}"
                                                placeholder="Please fill here..." />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="productName">Category</label>
                                            <select name="category_id" class="form-control">
                                                <option value="">None</option>
                                                @foreach ($categories as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ old('category_id') == $row->id ? 'selected' : false }}>
                                                        {{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Price">Price</label>
                                            <input type="text" name="price" class="form-control"
                                                value="{{ old('price') ?? old('price') }}"
                                                placeholder="Please fill here..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="text">Description</label>
                                            <textarea name="description" id="editor1" rows="10"
                                                cols="80"> {{ old('description') ?? old('description') }}
                                                                                                                                                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-block btn-primary mt-3">
                                            Save Product
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 mt-3 py-5e">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="form-title">New Category</h1>
                            <hr />
                            <form action="{{ route('admin.create.category') }}" method="post">
                                @csrf
                                <div class="form-group mt-0">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="parent_id" class="form-control show-tick">
                                        <option value="">None</option>
                                        @foreach ($parent as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-block btn-primary mt-3">
                                        Add Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- <div class="container-fluid">
        <div class="bg-white">
            <div class="breadcrumb">
                <li>
                    <a href="{{ route('home') }} ">
                        <i class="material-icons">home</i>
                        Dashboard
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('admin.list.product') }}">
                        <i class="material-icons">collections</i>
                        Products Management
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="material-icons">collections</i>
                        New Product
                    </a>
                </li>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h4>New Product</h4>
                            </div>

                        </div>
                    </div>
                    <div class="body">
                        @include('layouts.alert')
                        <form action="{{ route('admin.store.product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row clearfix">

                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <b>Product Name</b>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') ?? old('name') }}">
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            <b>Category</b>
                                            <select name="category_id" class="form-control show-tick">
                                                <option value="">None</option>
                                                @foreach ($categories as $row)
                                                    <option value="{{ $row->id }}"
                                                        {{ old('category_id') == $row->id ? 'selected' : false }}>
                                                        {{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            <b>Description</b>
                                            <textarea name="description" id="ckeditor" cols="30" rows="10">
                                                    {{ old('description') ?? old('description') }}
                                                </textarea>
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            <b>Image</b>
                                            <input type="file" name="image" id="frmFileUpload" multiple>
                                        </div>
                                        <br>
                                        <div class="form-line">
                                            <b>Price</b>
                                            <input type="text" name="price" class="form-control"
                                                value="{{ old('price') ?? old('price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('add-js')
    <script src="https://use.fontawesome.com/e912f54b8f.js"></script>
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace("editor1");
            $(".input-images").imageUploader({
                imagesInputName: 'image',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 1,
                mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']
            });
        });
    </script>

@stop
