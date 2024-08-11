@extends('Template.Admin.base')
@section('content')
    <style>
        .img {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Kelola Kategori Audio</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAudio">
                            Tambah Kategori Audio
                        </button>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                            width="100%">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($kategoriAudio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kategori_audio }}</td>
                                        <td style="text-align: center">
                                            <div class="btn-group">
                                                <form action="{{ route('destroy-kategori-audio', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Kelola Kategori Template</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTemplate">
                            Tambah Kategori Template
                        </button>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="example-table1" cellspacing="0"
                            width="100%">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot style="text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($kategoriTemplate as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kategori_tmp }}</td>
                                        <td style="text-align: center;">
                                            <div class="btn-group">
                                                <form action="{{ route('destroy-kategori-template', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Kategori Template --}}
    <form action="{{ route('kategori-template') }}" method="POST">
        @csrf
        <div class="modal fade" id="modalTemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Template</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-center">
                                <label for="kategori_tmp" class="form-label">Kategori</label>
                            </div>
                            <div class="col-md-10">
                                <input id="kategori_tmp" name="kategori_tmp" class="form-control" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- End Modal Template --}}

    {{-- Modal Kategori Audio --}}
    <form action="{{ route('kategori-audio') }}" method="POST">
        @csrf
        <div class="modal fade" id="modalAudio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Audio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-center">
                                <label for="kategori_audio" class="form-label">Kategori</label>
                            </div>
                            <div class="col-md-10">
                                <input id="kategori_audio" name="kategori_audio" class="form-control" type="text"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- End Modal Audio --}}
@endsection
