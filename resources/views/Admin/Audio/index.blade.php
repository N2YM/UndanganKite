@extends('Template.Admin.base')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Musik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Musik</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $audio)
                            <tr style="text-align: center;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $audio->judul }}</td>
                                <td>{{ $audio->kategori }}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{ asset('storage/' . $audio->musik) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td>
                                    <a href="{{ route('edit-audio', $audio->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('destroy-audio', $audio->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
