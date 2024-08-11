@extends('Template.Admin.base')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Audio
                </button>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
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
                                <td>{{ $audio->kategori_audio ?? 'Kategori tidak tersedia' }}</td>
                                <td>
                                    <audio controls>
                                        <source src="{{ asset('storage/' . $audio->musik) }}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $audio->id }}">
                                        Edit
                                    </button>
                                    <a class="btn btn-danger" onclick="confirmDelete({{ $audio->id }})">Hapus</a>
                                    <form id="delete-form-{{ $audio->id }}"
                                        action="{{ route('destroy-audio', $audio->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal Tambah Audio --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('store-audio') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-1">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Judul Audio</label>
                                        <input class="form-control" name="judul" type="text" required>
                                        @error('judul')
                                            <div class="invalid-feedback" style="color: red;" id="error-kategori">
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
                                        <select class="form-control" name="kategori_audio" required>
                                            <option value="">Pilih Kategori Audio</option>
                                            @foreach ($kategoriAudio as $item)
                                                <option value="{{ $item->kategori_audio }}">{{ $item->kategori_audio }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_audio')
                                            <div class="invalid-feedback" style="color: red;" id="error-kategori">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-kategori').style.display = 'none';
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
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End --}}

    {{-- Modal Edit Audio --}}
    @foreach ($data as $audio)
        <div class="modal fade" id="exampleModal{{ $audio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('update-audio', $audio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab-1">
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label>Judul Audio</label>
                                            <input class="form-control" name="judul" type="text"
                                                value="{{ $audio->judul }}">
                                            @error('judul')
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
                                        <div class="col-sm-12 form-group">
                                            <select class="form-control" name="kategori_audio">
                                                <option value="{{ $audio->kategori_audio }}">{{ $audio->kategori_audio }}
                                                </option>
                                                @foreach ($kategoriAudio as $item)
                                                    <option value="{{ $item->kategori_audio }}">
                                                        {{ $item->kategori_audio }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                                            @if ($audio->musik)
                                                <small>Current file: {{ $audio->musik }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- END --}}

    @push('javascript')
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
    @endpush
@endsection
