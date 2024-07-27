@extends('layouts.adminv2')

@section('content')
    <div class="content">
        @include('layouts.alert')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.password') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <label class="required form-label">Password Lama</label>
                                <input type="password" name="old_password" class="form-control " required />
                            </div>
                            <div class="">
                                <label class="required form-label">Password Baru</label>
                                <input type="password" name="new_password" class="form-control " required />
                            </div>
                            <div class="">
                                <label class="required form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="confirm_new_password" class="form-control " required />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-4">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection