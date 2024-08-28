@extends('Template.Admin.base')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Template
                </button>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead style="text-align: center;">
                        <tr>
                            <th style="width: 10%;">No</th>
                            <th style="width: 30%;">Judul</th>
                            <th style="width: 20%;">Kategori</th>
                            <th style="width: 20%;">Slide Cover</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Slide Cover</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $tmp)
                            <tr style="text-align: center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tmp->judul }}</td>
                                <td>{{ $tmp->kategori->kategori_tmp ?? '' }}</td>
                                <td>
                                    @if ($tmp->cover)
                                        <img class="img" width="100%;" src="{{ asset('storage/' . $tmp->cover) }}" />
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning mr-1" data-toggle="modal"
                                            data-target="#exampleModal1{{ $tmp->id }}">
                                            Edit
                                        </button>
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
    {{-- Modal Tambah Template --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store-template') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-1">
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
                                        <select class="form-control" name="kategori_id" required>
                                            <option value="">Pilih Kategori Template</option>
                                            @foreach ($kategoriTemplate as $item)
                                                <option value="{{ $item->id }}">{{ $item->kategori_tmp }}</option>
                                            @endforeach
                                        </select>

                                        @error('kategori_tmp')
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Background</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="cover" type="file">
                                        @error('cover')
                                            <div class="ivalid-feedback" style="color: red;" id="error-cover1">
                                                {{ $message }}
                                            </div>
                                            <script>
                                                setTimeout(() => {
                                                    document.getElementById('error-cover').style.display = 'none';
                                                }, 2000);
                                            </script>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Tambah Edit --}}
    {{-- Modal Edit --}}
    @foreach ($data as $tmp)
        <div class="modal fade" id="exampleModal1{{ $tmp->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Template</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('update-template', $tmp->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Judul Template</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="judul" type="text"
                                        placeholder="Masukkan Judul Template" value="{{ $tmp->judul }}">
                                    @error('judul')
                                        <div class="invalid-feedback" style="color: red;" id="error-judul">
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
                                    <select class="form-control" name="kategori_tmp" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoriTemplate as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id == $tmp->kategori_id) selected @endif>
                                                {{ $item->kategori_tmp }} 
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_tmp')
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
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Background</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="cover" type="file">
                                    @error('cover')
                                        <div class="invalid-feedback" style="color: red;" id="error-cover1">
                                            {{ $message }}
                                        </div>
                                        <script>
                                            setTimeout(() => {
                                                document.getElementById('error-cover').style.display = 'none';
                                            }, 2000);
                                        </script>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach




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
