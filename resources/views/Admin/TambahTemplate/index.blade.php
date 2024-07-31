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
                            <th>Slide Cover 1</th>
                            <th>Slide Cover 2</th>
                            <th>Slide Cover 3</th>
                            <th>Slide Cover 4</th>
                            <th>Slide Cover 5</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Slide Cover 1</th>
                            <th>Slide Cover 2</th>
                            <th>Slide Cover 3</th>
                            <th>Slide Cover 4</th>
                            <th>Slide Cover 5</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $tmp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tmp->judul }}</td>
                                <td>{{ $tmp->kategoriTemplate->kategori_tmp ?? 'Kategori tidak tersedia' }}</td>
                                <td>
                                    @if ($tmp->cover1)
                                        <img class="img" src="{{ asset('storage/' . $tmp->cover1) }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($tmp->cover2)
                                        <img class="img" src="{{ asset('storage/' . $tmp->cover2) }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($tmp->cover3)
                                        <img class="img" src="{{ asset('storage/' . $tmp->cover3) }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($tmp->cover4)
                                        <img class="img" src="{{ asset('storage/' . $tmp->cover4) }}" />
                                    @endif
                                </td>
                                <td>
                                    @if ($tmp->cover5)
                                        <img class="img" src="{{ asset('storage/' . $tmp->cover5) }}" />
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('edit-template', $tmp->id) }}"
                                            class="btn btn-warning mr-1">Edit</a>
                                        <a class="btn btn-danger" onclick="confirmDelete({{ $tmp->id }})">Hapus</a>
                                        <form id="delete-form-{{ $tmp->id }}"
                                            action="{{ route('destroy-template', $tmp->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
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
    <script>
        // Fungsi untuk mengonfirmasi penghapusan data
        function confirmDelete(id) {
            // Menampilkan dialog konfirmasi
            const confirmation = confirm('Anda yakin ingin menghapus data ini?');
            if (confirmation) {
                // Mengirimkan form penghapusan jika dikonfirmasi
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
