{{-- Map Leflet --}}
@extends('Template.User.base')
@section('content')
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 400px;
            /* Added height for the map */
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection
<div class="page-content fade-in-up">
    <div class="ibox-footer text-left" style="padding-right: 20px; padding-top: 10px;">
        <a href="{{ route('undangan') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="ibox mt-3">
        <div class="ibox-head">
            <div class="ibox-title"> Isi Data Undangan
            </div>
        </div>
        <div class="ibox-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist"
                style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#opening" role="tab"
                        style="color: #495057; font-weight: bold;">Opening</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#newTab" role="tab"
                        style="color: #495057; font-weight: bold;">Halaman Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#galeri" role="tab"
                        style="color: #495057; font-weight: bold;">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#deskripsiAcara" role="tab"
                        style="color: #495057; font-weight: bold;">Detail Acara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#lokasi_acara" role="tab"
                        style="color: #495057; font-weight: bold;">Lokasi Acara</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content"
                style="padding: 20px; background-color: #ffffff; border: 1px solid #dee2e6; border-top: none;">
                <div class="tab-pane active" id="opening" role="tabpanel">
                    <form action="{{ route('update-opening', $tmp->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="weddingDetail" class="col-sm-2 col-form-label font-weight-bold">Judul
                                Acara</label>
                            <div class="col-sm-10">
                                <textarea name="judul_acara" id="summernote1" class="form-control">{{ session('judul_acara') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="weddingDetail" class="col-sm-2 col-form-label font-weight-bold">Tanggal
                                Acara</label>
                            <div class="col-sm-10">
                                <textarea name="tanggal_acara" id="summernote4" class="form-control">{{ session('tanggal_acara') }}</textarea>
                            </div>
                        </div>
                        <button class="btn-primary" type="submit"> Simpan</button>
                    </form>
                </div>
                <div class="tab-pane" id="newTab" role="tabpanel">
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label font-weight-bold">Kategori Acara</label>
                        <div class="col-sm-10">
                            <select id="kategori" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="wedding">Wedding</option>
                                <option value="ulang_tahun">Ulang Tahun</option>
                            </select>
                        </div>
                    </div>
                    <form action="{{ route('profil-wedding-update', $tmp->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div id="formWedding" style="display: none;">
                            <!-- Form untuk kategori Wedding -->
                            <div class="form-group row">
                                <label for="weddingDetail" class="col-sm-2 col-form-label font-weight-bold">Salam
                                    Pembuka</label>
                                <div class="col-sm-10">
                                    <textarea name="salam_pembuka" id="summernote4" class="form-control">{{ session('salam_pembuka') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ceritaMempelai" class="col-sm-2 col-form-label font-weight-bold">Informasi
                                    Singkat/Cerita
                                    Mempelai</label>
                                <div class="col-sm-10">
                                    <textarea name="cerita_mempelai" id="summernote5" class="form-control">{{ session('cerita_mempelai') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fotoMempelaiPria" class="col-sm-2 col-form-label font-weight-bold">Foto
                                    Mempelai
                                    Pria</label>
                                <div class="col-sm-4">
                                    <input type="file" name="fm_pria" class="form-control" accept="image/*">
                                </div>
                                <label for="fotoMempelaiWanita" class="col-sm-2 col-form-label font-weight-bold">Foto
                                    Mempelai
                                    Wanita</label>
                                <div class="col-sm-4">
                                    <input type="file" name="fm_wanita" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaMempelai1" class="col-sm-2 col-form-label font-weight-bold">Nama
                                    Mempelai Pria</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_mempelai_pria" id="summernote6" class="form-control"></textarea>
                                </div>
                                <label for="namaMempelai2" class="col-sm-2 col-form-label font-weight-bold">Nama
                                    Mempelai
                                    Wanita</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_mempelai_wanita" id="summernote7" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaOrtu1" class="col-sm-2 col-form-label font-weight-bold">Nama Ayah
                                    Mempelai Pria</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_ayah_mempelai_pria" id="summernote8" class="form-control"></textarea>
                                </div>
                                <label for="namaOrtu2" class="col-sm-2 col-form-label font-weight-bold">Nama Ibu
                                    Mempelai Pria</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_ibu_mempelai_pria" id="summernote9" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="namaOrtu1" class="col-sm-2 col-form-label font-weight-bold">Nama Ayah
                                    Mempelai
                                    Wanita</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_ayah_mempelai_wanita" id="summernote10" class="form-control"></textarea>
                                </div>
                                <label for="namaOrtu2" class="col-sm-2 col-form-label font-weight-bold">Nama Ibu
                                    Mempelai
                                    Wanita</label>
                                <div class="col-sm-4">
                                    <textarea name="nama_ibu_mempelai_wanita" id="summernote11" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsiPasangan"
                                    class="col-sm-2 col-form-label font-weight-bold">Deskripsi Singkat
                                    Tentang
                                    Pasangan</label>
                                <div class="col-sm-10">
                                    <textarea name="deskripsi_singkat_pasangan" id="summernote12" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" id="weddingSaveButton"
                                style="display: none; margin-top: 20px;">
                                <div class="col-sm-10 offset-sm-2">
                                    <button class="btn btn-success" type="submit" onclick="saveWeddingData()">Simpan
                                        Data Wedding</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="formUlangTahun" style="display: none;">
                        <!-- Form untuk kategori Ulang Tahun -->
                        <div class="form-group row">
                            <label for="ulangTahunDetail" class="col-sm-2 col-form-label font-weight-bold">Detail
                                Ulang Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" name="ulang_tahun" class="form-control" id="summernote4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="galeri" role="tabpanel">
                    <form action="{{ route('update-galeri', $tmp->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            @error('image_path')
                                <div class="invalid-feedback" style="color: red;" id="error-image_path">
                                    {{ $message }}
                                </div>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById('error-judul').style.display = 'none';
                                    }, 2000);
                                </script>
                            @enderror
                            <div class="mb-3" id="photoInputs">
                                <label for="formFileMultiple" class="form-label font-weight-bold">Multiple files input
                                    example</label>
                                <input class="form-control" type="file" name="image_path[]" accept="image/*"
                                    multiple>
                            </div>
                            <button type="button" id="addPhoto" class="btn btn-secondary">Tambah Foto</button>
                        </div>
                        <div id="additionalPhotoInputs"></div> <!-- Container for additional inputs -->
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </form>

                </div>
                <div class="tab-pane" id="deskripsiAcara" role="tabpanel">
                    <form action="{{ route('update-detail-acara', $tmp->id) }}" method="POST">
                        @csrf
                        <h5>Detail Acara 1</h5>
                        <div class="form-group row">
                            <label for="acara1" class="col-sm-2 col-form-label font-weight-bold">Nama Acara
                                1</label>
                            <div class="col-sm-10">
                                <input type="text" name="acara1" class="form-control" id="#summernote12"
                                    placeholder="Nama Acara 1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_acara1" class="col-sm-2 col-form-label font-weight-bold">Jam Acara
                                1</label>
                            <div class="col-sm-4">
                                <input type="time" name="jam_mulai_acara1" class="form-control" required>
                            </div>
                            <div class="col-sm-2 text-center" style="padding-top: 7px;">
                                <strong>Sampai</strong>
                            </div>
                            <div class="col-sm-4">
                                <input type="time" name="jam_selesai_acara1" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_acara1" class="col-sm-2 col-form-label font-weight-bold">Hari &
                                Tanggal Acara 1</label>
                            <div class="col-sm-10">
                                <input type="date" name="hari_tanggal_acara1" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_acara1" class="col-sm-2 col-form-label font-weight-bold">Alamat Gedung
                                Acara 1</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_gedung_acara1" class="form-control"
                                    placeholder="Alamat Gedung Acara 1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link_map1" class="col-sm-2 col-form-label font-weight-bold">Link Map Acara
                                1</label>
                            <div class="col-sm-10">
                                <input type="text" name="link_map_acara1" class="form-control"
                                    placeholder="Link Map Acara 1" required>
                            </div>
                        </div>

                        <h5>Detail Acara 2</h5>
                        <div class="form-group row">
                            <label for="acara2" class="col-sm-2 col-form-label font-weight-bold">Nama Acara
                                2</label>
                            <div class="col-sm-10">
                                <input type="text" name="acara2" class="form-control" placeholder="Nama Acara 2"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jam_acara2" class="col-sm-2 col-form-label font-weight-bold">Jam Acara
                                2</label>
                            <div class="col-sm-4">
                                <input type="time" name="jam_mulai_acara2" class="form-control" required>
                            </div>
                            <div class="col-sm-2 text-center" style="padding-top: 7px;">
                                <strong>Sampai</strong>
                            </div>
                            <div class="col-sm-4">
                                <input type="time" name="jam_selesai_acara2" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_acara2" class="col-sm-2 col-form-label font-weight-bold">Hari &
                                Tanggal Acara 2</label>
                            <div class="col-sm-10">
                                <input type="date" name="hari_tanggal_acara2" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_acara2" class="col-sm-2 col-form-label font-weight-bold">Alamat Gedung
                                Acara 2</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_gedung_acara2" class="form-control"
                                    placeholder="Alamat Gedung Acara 2" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan Deskripsi Acara</button>
                    </form>
                </div>
                <div class="tab-pane" id="lokasi_acara" role="tabpanel">
                    {{-- @include('User.TambahUndangan.map') <!-- Memanggil view lokasi_acara --> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('javascript')
    <script>
        document.getElementById('addPhoto').addEventListener('click', function() {
            var container = document.createElement('div');
            container.className = 'mb-2'; // Add margin bottom for spacing
            var input = document.createElement('input');
            input.type = 'file';
            input.name = 'foto_galeri[]'; // Allow multiple file uploads
            input.className = 'form-control'; // Use form-control class for styling
            input.accept = 'image/*';
            container.appendChild(input);
            document.getElementById('additionalPhotoInputs').appendChild(container); // Append to new container
        });
    </script>
    <script>
        function saveWeddingData() {
            // Logic to save wedding data goes here
            alert('Data Wedding disimpan!');
            // Simulate saving to session (you need to implement this in your controller)
            // Example: session(['salam_pembuka' => document.getElementById('summernote4').value]);
        }

        document.getElementById('kategori').addEventListener('change', function() {
            var kategori = this.value;
            document.getElementById('formWedding').style.display = (kategori === 'wedding') ? 'block' : 'none';
            document.getElementById('formUlangTahun').style.display = (kategori === 'ulang_tahun') ? 'block' :
                'none';
            document.getElementById('weddingSaveButton').style.display = (kategori === 'wedding') ? 'block' :
                'none';

            // Simpan kategori yang dipilih ke localStorage
            localStorage.setItem('selectedCategory', kategori);
        });

        // Ambil kategori yang disimpan saat halaman dimuat
        window.addEventListener('DOMContentLoaded', function() {
            var selectedCategory = localStorage.getItem('selectedCategory');
            if (selectedCategory) {
                document.getElementById('kategori').value = selectedCategory;
                document.getElementById('formWedding').style.display = (selectedCategory === 'wedding') ? 'block' :
                    'none';
                document.getElementById('formUlangTahun').style.display = (selectedCategory === 'ulang_tahun') ?
                    'block' : 'none';
                document.getElementById('weddingSaveButton').style.display = (selectedCategory === 'wedding') ?
                    'block' : 'none';
            }
        });
    </script>
    <script>
        // Simpan data input ke localStorage saat input berubah
        document.querySelectorAll('input[type="text"], textarea').forEach(function(input) {
            input.addEventListener('input', function() {
                localStorage.setItem(input.id, input.value);
            });
        });
        // Ambil data dari localStorage saat halaman dimuat
        window.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="text"], textarea').forEach(function(input) {
                var savedValue = localStorage.getItem(input.id);
                if (savedValue) {
                    input.value = savedValue;
                }
            });
        });
    </script>
    {{-- MAP LEAFLET --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map('map').setView([-6.200000, 106.816666], 13); // Koordinat Jakarta
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Pastikan peta dirender ulang jika ukuran berubah
            window.addEventListener('resize', function() {
                map.invalidateSize();
            });

            // Memperbarui ukuran peta setelah DOM dimuat
            map.invalidateSize();
        });
    </script>
@endpush
@endsection
