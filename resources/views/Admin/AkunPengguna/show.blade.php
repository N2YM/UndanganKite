@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="{{ route('akun') }}" class="btn btn-dark mb-3"><i class="fa fa-arrow-left"></i> Kemabli</a>
            <div class="ibox">
                <div class="card-header">
                    <h3><span>Detail Akun User</span></h3>
                </div>
                <div class="ibox-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <div class="row">
                                <div class="col-md-8">
                                    <label>Username</label>
                                    <input class="form-control" name="name" type="text" value="{{ $user->name }}"
                                        disabled>
                                    <label>WhatsApps</label>
                                    <input class="form-control" name="no_hp" type="text"
                                        value="{{ optional($user->profile)->no_hp }}" disabled>
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="text"
                                        placeholder="example@gmail.com" disabled value="{{ $user->email }}">
                                    <label>Kota</label>
                                    <input class="form-control" name="kota" type="text" placeholder="" disabled
                                        value="{{ optional($user->profile)->kota }}">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat" type="text"
                                        value="{{ optional($user->profile)->alamat }}" disabled>
                                </div>
                                <div class="col-md-4 text-center" style="margin-top: 35px;">
                                    <div>
                                        @if ($user->profile && $user->profile->image)
                                            <img src="{{ asset($user->profile->image) }}" class="img-thumbnail"
                                                alt="User Photo" style="width: 250px; height: 250px;">
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" class="img-thumbnail"
                                                alt="Default Photo" style="width: 250px; height: 250px;">
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
