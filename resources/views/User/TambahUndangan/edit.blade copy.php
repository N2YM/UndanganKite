@extends('Template.User.base')
@section('content')
    @include('User.TambahUndangan.CSSMap.index')
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Undangan Digital</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab-7-2" data-toggle="tab"><i class="fa fa-cogs"></i>
                                    Pengaturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab-7-1" data-toggle="tab"><i class="fa fa-info-circle"></i>
                                    Informasi Umum</a>
                            </li>
                            <li class="nav-item hidden" id="tab-wedding">
                                <a class="nav-link" href="#tab-wedding-content" data-toggle="tab"><i
                                        class="fa fa-heart"></i>
                                    Detail Wedding</a>
                            </li>
                            <li class="nav-item hidden" id="tab-ulangtahun">
                                <a class="nav-link" href="#tab-ulangtahun-content" data-toggle="tab"><i
                                        class="fa fa-birthday-cake"></i> Detail Ulang Tahun</a>
                            </li>
                            <li class="nav-item hidden" id="tab-keagamaan">
                                <a class="nav-link" href="#tab-keagamaan-content" data-toggle="tab"><i
                                        class="fa fa-praying-hands"></i> Detail Keagamaan</a>
                            </li>
                        </ul>
                        <form action="">
                            @csrf
                            <div class="tab-content">
                                <!-- Tab Pengaturan -->
                                <div class="tab-pane fade show active" id="tab-7-2">
                                    <div class="form-group">
                                        <label for="kategori">Pilih Kategori</label>
                                        <select class="form-control" id="kategori">
                                            <option value="wedding">Wedding</option>
                                            <option value="ulangtahun">Ulang Tahun</option>
                                            <option value="keagamaan">Keagamaan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fontSelect">Pilih Jenis Font</label>
                                        <select class="form-control" id="fontSelect">
                                            <option value="font-arial">Arial</option>
                                            <option value="font-georgia">Georgia</option>
                                            <option value="font-courier">Courier New</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Tab Informasi Umum -->
                                <div class="tab-pane fade" id="tab-7-1">
                                    <div class="form-group">
                                        <label for="kataSambutan">Kata Sambutan</label>
                                        <input type="text" class="form-control previewable" id="kataSambutan"
                                            name="kata_sambutan" required>
                                        <div class="preview-text">Pratinjau Kata Sambutan</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="countDown">Count Down</label>
                                        <input type="date" class="form-control previewable" id="countDown"
                                            name="count_down" required>
                                        <div class="preview-text">Pratinjau Count Down</div>
                                    </div>
                                </div>
                                <!-- Tab Detail Wedding -->
                                @include('User.TambahUndangan.Kategori.wedding')
                                <!-- Tab Detail Ulang Tahun -->
                                <div class="tab-pane fade" id="tab-ulangtahun-content">
                                    <!-- Form untuk Ulang Tahun -->
                                    @include('User.TambahUndangan.Kategori.ualng_tahun_dewasa')
                                </div>
                                <div class="tab-pane fade" id="tab-keagamaan-content">
                                    <!-- Form untuk Keagamaan -->
                                    @include('User.TambahUndangan.Kategori.keagamaan')
                                </div>
                                <!-- Elemen pratinjau -->
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div> <!-- End of tab-content -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kategori = document.getElementById('kategori');
            const formWedding = document.getElementById('form-wedding');
            const formUlangTahun = document.getElementById('form-ulangtahun');
            const formKeagamaan = document.getElementById('form-keagamaan');
            const tabWedding = document.getElementById('tab-wedding');
            const tabUlangTahun = document.getElementById('tab-ulangtahun');
            const tabKeagamaan = document.getElementById('tab-keagamaan');
            const previewableInputs = document.querySelectorAll('.previewable');
            const fontSelect = document.getElementById('fontSelect');

            // Load saved category from localStorage
            const savedCategory = localStorage.getItem('selectedCategory');
            if (savedCategory) {
                kategori.value = savedCategory;
            }

            function updatePreviews() {
                previewableInputs.forEach((input) => {
                    const preview = input.nextElementSibling;
                    preview.className = 'preview-text ' + fontSelect.value;
                    preview.textContent = input.value;
                });
            }

            function updateFormVisibility() {
                const selectedCategory = kategori.value;
                if (selectedCategory === 'wedding') {
                    tabWedding.classList.remove('hidden');
                    tabUlangTahun.classList.add('hidden');
                    tabKeagamaan.classList.add('hidden');
                    formWedding.style.display = 'block';
                    formUlangTahun.style.display = 'none';
                    formKeagamaan.style.display = 'none';
                } else if (selectedCategory === 'ulangtahun') {
                    tabWedding.classList.add('hidden');
                    tabUlangTahun.classList.remove('hidden');
                    tabKeagamaan.classList.add('hidden');
                    formWedding.style.display = 'none';
                    formUlangTahun.style.display = 'block';
                    formKeagamaan.style.display = 'none';
                } else if (selectedCategory === 'keagamaan') {
                    tabWedding.classList.add('hidden');
                    tabUlangTahun.classList.add('hidden');
                    tabKeagamaan.classList.remove('hidden');
                    formWedding.style.display = 'none';
                    formUlangTahun.style.display = 'none';
                    formKeagamaan.style.display = 'block';
                } else {
                    tabWedding.classList.add('hidden');
                    tabUlangTahun.classList.add('hidden');
                    tabKeagamaan.classList.add('hidden');
                }
                updatePreviews();
            }

            // Event listener for category change
            kategori.addEventListener('change', function() {
                // Save the selected category to localStorage
                localStorage.setItem('selectedCategory', kategori.value);
                updateFormVisibility();
            });

            // Initial form visibility based on saved category
            updateFormVisibility();
        });
    </script>
    @include('User.TambahUndangan.MapJS.index')
@endsection
