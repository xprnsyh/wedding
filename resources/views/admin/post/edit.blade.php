@extends('layouts.adminv2')
@section('css-add')
    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <!-- Image Uploader -->
    <link href="{{ asset('plugin/image-uploader/image-uploader.css') }}" rel="stylesheet" />
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
                            href="{{ route('admin.list.post') }}">Post</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a
                            href="{{ route('admin.edit.post', ['id' => $post->id]) }}">Edit</a></li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content p-card">
        <section class="settings posts">
            <form action="{{ route('admin.update.post', ['id' => $post->id]) }} }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 mt-3 py-5e">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.alert')
                                <h1 class="form-title">New Post</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group form-flex">
                                            <input type="text" name="title" id="" class="form-control input-title-post"
                                                placeholder="Title..."
                                                value="{{ old('title') ? old('title') : $post->title }}" />
                                            <button type="submit" class="btn btn-primary" style="padding: 9px 52px">
                                                Publish
                                            </button>
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
                                            <textarea name="body" id="text-body" rows="10"
                                                cols="80"> {{ old('body') ? old('body') : $post->body }} </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 mt-3 py-5e">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="form-title">Post Setting</h1>
                                <hr />
                                <div class="form-group">
                                    <img src="{{ asset('admin/assets/images/blogs/' . $post->featured_image) }}"
                                        class="last-img" width="100%" height="100%" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="Tags">Tags</label>
                                    <select class="tags-select form-control" name="tags[]" multiple="multiple"
                                        style="width: 100%; padding: 2px 5px !important">
                                        @foreach ($tag as $t)
                                            @foreach ($post->tag as $item)
                                                @if ($item->name == $t->name)
                                                    <option value="{{ $t->id }}" selected>{{ $t->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Caption">Caption</label>
                                    <input type="text" name="caption" placeholder="Captions"
                                        value="{{ old('caption') ? old('caption') : $post->featured_image_caption }}"
                                        class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="Date">Date</label>
                                    <input type="datetime-local" name="date" value="<?php echo old('date') ? old('date') : date('Y-m-d\TH:i:s', strtotime($post->publish_date)); ?>"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
    {{-- <div class="container-fluid">
        <div class="page-title blog-title">
            <h3 style="font-weight: 500; padding-left: 5px">Edit Post</h3>
        </div>
        <div class="row clearfix">
            <form action="{{ route('admin.update.post', ['id' => $post->id]) }} }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 pl-post-0">
                    <div class="card card-post">
                        <div class="body">
                            @include('layouts.alert')
                            <div class="row clearfix">
                                <div class="col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12" id="title-container">
                                            <input type="text" name="title" placeholder="Title"
                                                value="{{ old('title') ? old('title') : $post->title }}">
                                            <button type="submit">Update</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <textarea name="body"
                                                id="text-body">{{ old('body') ? old('body') : $post->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 pl-0 setting-post-section">
                    <div class="card card-post">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-sm-12 title-setting-wrap">
                                    <img src="{{ asset('uil_setting.svg') }}" alt="" width="10px"
                                        style="display: inline-block">
                                    <h4 class="title-setting">Post Settings</h4>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label for="tags">Tags</label><br>
                                    <select class="tags-select form-control" name="tags[]" multiple="multiple"
                                        style="width: 100%; padding: 2px 5px !important">
                                        @foreach ($tag as $t)
                                            @foreach ($post->tag as $item)
                                                @if ($item->name == $t->name)
                                                    <option value="{{ $t->id }}" selected>{{ $t->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <img src="{{ asset('admin/assets/images/blogs/' . $post->featured_image) }}"
                                        class="last-img" width="100%" height="100%" alt="">
                                </div>
                                <div class="col-sm-12">
                                    <label for="image">Image</label><br>
                                    <input type="file" name="image" placeholder="Upload Image">
                                </div>
                                <div class="col-sm-12">
                                    <label for="caption">Caption</label><br>
                                    <input type="text" name="caption" placeholder="Captions"
                                        value="{{ old('caption') ? old('caption') : $post->featured_image_caption }}"
                                        required>
                                </div>
                                <div class="col-sm-12">
                                    <label for="publish_datedate">Date</label><br>
                                    <input type="datetime-local" name="date" value="<?php echo old('date') ? old('date') : date('Y-m-d\TH:i:s', strtotime($post->publish_date)); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
@endsection

@section('add-js')
    <!-- Tagsinput -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('plugin/image-uploader/image-uploader.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace("text-body");
            $('.tags-select').select2();
            $(".input-images").imageUploader({
                imagesInputName: 'image',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 1,
                mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml']
            });
        });
    </script>
@stop
