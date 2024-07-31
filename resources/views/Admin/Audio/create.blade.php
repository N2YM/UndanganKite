@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <a href="{{ route('audio') }}" class="btn btn-dark mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="ibox">
                <div class="ibox-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <form action="{{ route('store-audio') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Judul Audio</label>
                                        <input class="form-control" name="judul" type="text">
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
                                    <div class="col-sm-12 form-group">
                                        <label>Kategori Audio</label>
                                        <input class="form-control" name="kategori_audio" type="text">
                                        @error('kategori_audio')
                                            <div class="ivalid-feedback" style="color: red;" id="error-kategori_audio">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-kategori_audio').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Upload Audio</label>
                                        <input class="form-control" name="musik" type="file">
                                        @error('musik')
                                            <div class="ivalid-feedback" style="color: red;" id="error-musik">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-musik').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success mt-2" type="submit"> <i class="fa fa-save"></i>
                                        Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
