@extends('Template.Admin.base')
@section('content')
    <style>
        .img-circle {
            width: 110px;
            /* Sesuaikan ukuran gambar sesuai kebutuhan Anda */
            height: 110px;
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
                        @if (Auth::guard('admin')->check())
                            @php
                                $admin = Auth::guard('admin')->user();
                            @endphp
                            @if (!empty($admin->foto) && Storage::disk('public')->exists($admin->foto))
                                <div class="mb-2">
                                    <img class="img-circle" src="{{ asset('storage/' . $admin->foto) }}" alt="Foto Profil"
                                        class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @else
                                <div class="mb-2">
                                    <img class="img" src="{{ asset('path/to/default/image.jpg') }}" alt="Default Foto"
                                        class="img-thumbnail" style="max-width: 150px;">
                                </div>
                                @if (!empty($admin->foto))
                                    <p>Tidak ada foto yang tersedia atau file tidak ditemukan. Path:
                                        {{ 'storage/' . $admin->foto }}</p>
                                @endif
                            @endif
                        @else
                            <!-- Code for non-admin users or guest -->
                        @endif

                    </div>
                    <h5 class="font-strong m-b-10 m-t-20"><strong style="font-size: 23px;">
                            @if (Auth::guard('admin')->check())
                                <div class="font-strong">{{ Auth::guard('admin')->user()->name }}</div>
                            @endif
                        </strong></h5>
                    <div class="profile-social m-b-20" style="margin-top: 15%;">
                        <div class="row text-center m-b-20">
                            <div class="col-6">
                                <div class="font-24 profile-stat-count">5</div>
                                <div class="text-muted">Undangan</div>
                            </div>
                            <div class="col-6">
                                <div class="font-24 profile-stat-count">0</div>
                                <div class="text-muted">Tamu</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="ibox">
                <div class="ibox-body">
                    <ul class="nav nav-tabs tabs-line mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab-1" data-toggle="tab"><i class="ti-settings"></i>
                                Data </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <form action="{{ route('prof-admin-update') }}" method="POST" enctype="multipart/form-data"
                                onsubmit="return confirmUpdate()">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @if (Auth::guard('admin')->check())
                                        @php
                                            $admin = Auth::guard('admin')->user();
                                        @endphp
                                        <div class="col-sm-12 form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="name" type="text" placeholder="John Doe"
                                                value="{{ $admin->name }}">
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    @if (Auth::guard('admin')->check())
                                        @php
                                            $admin = Auth::guard('admin')->user();
                                        @endphp
                                        <div class="col-sm-6 form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="text"
                                                placeholder="example@gmail.com" value="{{ $admin->email }}">
                                        </div>
                                    @endif
                                    <div class="col-sm-6 form-group">
                                        <label>Foto</label>
                                        <input class="form-control" name="foto" type="file">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning mt-2" type="submit"> <i class="fa fa-save"></i>
                                        Update</button>
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
    <script>
        function confirmUpdate() {

            return confirm("Apakah yakin ingin menyimpan perubahan ini?");

        }
    </script>
@endsection
