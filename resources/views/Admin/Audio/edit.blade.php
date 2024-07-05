@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-1">
                            <form action="{{ route('update-audio', $audio->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Judul Audio</label>
                                        <input class="form-control" name="judul" type="text" value="{{ $audio->judul }}">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Kategori Audio</label>
                                        <input class="form-control" name="kategori" type="text" value="{{ $audio->kategori }}">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Upload Audio</label>
                                        <input class="form-control" name="musik" type="file">
                                        @if ($audio->musik)
                                            <small>Current file: {{ $audio->musik }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info mt-2" type="submit"> <i class="fa fa-save"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
