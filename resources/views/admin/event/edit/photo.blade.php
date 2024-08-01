
@extends('admin.event.edit')

@section('tab-content')
<form action="{{ route('admin.store.photos', ['event_id' => $event->id]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="input-images"></div>
    <div class="row mt-3">
        <div class="col-12">
            <button type="submit" class="btn btn-block btn-primary">Upload</button>
        </div>
    </div>
    <div class="row list-image">
        @isset($photos)
            @foreach ($photos as $photo)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mt-3 px-2 image-photo-wrapper ">
                    <a href="{{ route('admin.delete.photo.event', ['id' => $photo->id]) }}">
                        <span class="material-icons"> clear </span>
                    </a>
                    <img src="{{ asset($photo->path) }}" alt="" class="image-photo" />
                </div>
            @endforeach
        @endisset
    </div>
</form>

@endsection
