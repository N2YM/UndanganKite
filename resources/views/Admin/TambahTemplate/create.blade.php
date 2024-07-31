@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <a href="{{ route('template') }}" class="btn btn-dark mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
            <div class="ibox">
                <div class="card-header">
                    <h3><span>Tambah Template</span></h3>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <form action="{{ route('store-template') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul Template</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="judul" type="text"
                                            placeholder="Masukkan Judul Template">
                                        @error('judul')
                                            <div class="ivalid-feedback" style="color: red;" id="error-judul">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-judul').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="kategori_tmp" type="text"
                                            placeholder="Masukkan Kategori Template">
                                        @error('kategori_tmp')
                                            <div class="ivalid-feedback" style="color: red;" id="error-kategori">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-kategori').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Slide Cover 1</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover1" type="file">
                                        @error('cover1')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover1">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover1').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Slide Cover 2</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover2" type="file">
                                        @error('cover2')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover2">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover2').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Slide Cover 3</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover3" type="file">
                                        @error('cover3')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover3">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover3').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Slide Cover 4</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover4" type="file">
                                        @error('cover4')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover4">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover4').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Upload Slide Cover 5</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover5" type="file">
                                        @error('cover5')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover5">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover5').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 offset-sm-11">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .btn {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
        }

        .mb-3 {
            margin-bottom: 1rem !important;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .col-form-label {
            font-weight: bold;
        }
    </style>
@endsection
