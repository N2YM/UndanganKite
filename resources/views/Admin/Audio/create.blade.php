@extends('Template.Admin.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
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
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Kategori Audio</label>
                                        <input class="form-control" name="kategori_audio" type="text">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Upload Audio</label>
                                        <input class="form-control" name="musik" type="file">
                                    </div>
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
@endsection
