@extends('layouts.adminv2')

@section('content')
    <div class="content">
        @include('layouts.alert')
        <div class="row">
            <div class="col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($user->avatar)
                            <img src="{{ asset('admin/assets/images/profile/' . $user->avatar) }}" alt=""
                                style="width: 100%; border-radius: 10px">
                        @else
                            <img src="https://i.pravatar.cc/150?img=15" alt="" style="width: 100%; border-radius: 10px">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer.update.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-0">
                                <label for="Nama">Nama</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Address">Address</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Bio">Bio</label>
                                <input type="text" name="bio" value="{{ $user->bio }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Avatar">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-4">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="card profile-card">
                    <div class="profile-header" style="background: #FEC8D8; height: 75px;margin-bottom:30px;"></div>
                    <div class="profile-body" style="text-align: center;">
                        <div class="image-area">
                            <img src="https://i.pravatar.cc/150?img=58" alt=""
                                style="border-radius: 50%; text-align: center; width:100px; padding:5px; background-color: transparent; border:1px solid #eee;">
                        </div>
                        <div class="content-area">
                            <h3>{{ $user->name ?? '' }}</h3>
                            <h5>{{ $user->email ?? '' }}</h5>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>Events</span>
                                <span>{{ number_format($events->count()) }}</span>
                            </li>
                            <li>
                                <span>Invitations</span>
                                <span>{{ number_format($invitations->count()) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h3>Data Pribadi</h3>
                    </div>
                    <div class="body">
                        <div class="form-group">
                            <label class="col-md-4 col-lg-4 col-sm-6 col-xs-6">Nama Lengkap</label>
                            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                <label>: {{ $user->name ?? '' }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-lg-4 col-sm-6 col-xs-6">Username</label>
                            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                <label>: {{ $user->username ?? '' }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-lg-4 col-sm-6 col-xs-6">Bio</label>
                            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                <label>: {{ $user->bio ?? '' }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-lg-4 col-sm-6 col-xs-6">Alamat</label>
                            <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                                <label>: {{ $user->address ?? '' }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
