@extends('Template.User.base')
@section('content')
    <!-- START PAGE CONTENT-->
    <style>
        .img-circle {
            width: 140px;
            /* Sesuaikan ukuran gambar sesuai kebutuhan Anda */
            height: 140px;
            /* Sesuaikan ukuran gambar sesuai kebutuhan Anda */
            border-radius: 50%;
            object-fit: cover;
            /* Memastikan gambar menutupi seluruh elemen dengan proporsi yang benar */

        }
    </style>
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="ibox">
                <div class="ibox-body text-center">
                    <div class="m-t-20">
                        @if ($user->profile && $user->profile->image)
                            <img class="img-circle" src="{{ asset($user->profile->image) }}" />
                        @else
                            <img class="img-circle" src="{{ asset('path/to/default/image.jpg') }}" />
                        @endif
                    </div>
                    <h5 class="font-strong m-b-10 m-t-20"><strong style="font-size: 23px;">{{ $user->name }}</strong></h5>
                    <div class="profile-social m-b-20" style="margin-top: 15%;">
                        <div class="row text-center m-b-20">
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">140</div>
                                <div class="text-muted">Followers</div>
                            </div>
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">$780</div>
                                <div class="text-muted">Sales</div>
                            </div>
                            <div class="col-4">
                                <div class="font-24 profile-stat-count">15</div>
                                <div class="text-muted">Projects</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="ibox">
                <div class="ibox-body">
                    <ul class="nav nav-tabs tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i>
                                Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Username</label>
                                        <input class="form-control" name="name" type="text" placeholder="Jhon Doe"
                                            value="{{ $user->name }}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>WhatsApps</label>
                                        <input class="form-control" name="no_hp" type="text" placeholder="0812******57"
                                            value="{{ optional($user->profile)->no_hp }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="text"
                                            placeholder="example@gmail.com" value="{{ $user->email }}">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Foto</label>
                                        <input class="form-control" name="image" type="file" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Kota</label>
                                        <input class="form-control" name="kota" type="text" placeholder=""
                                            value="{{ optional($user->profile)->kota }}">
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" name="alamat" type="text" placeholder=""
                                            value="{{ optional($user->profile)->alamat }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info mt-2" type="submit"> <i class="fa fa-save"></i>
                                        Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .profile-social a {
            font-size: 16px;
            margin: 0 10px;
            color: #999;
        }

        .profile-social a:hover {
            color: #485b6f;
        }

        .profile-stat-count {
            font-size: 22px
        }
    </style>
@endsection
