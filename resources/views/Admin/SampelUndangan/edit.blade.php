@extends('Template.Admin.base')
@section('content')
    @include('Admin.SampelUndangan.CSSMap.index')
    @include('Admin.SampelUndangan.JenisFont.index')
    <style>
        .font-playfair-display {
            font-family: 'Playfair Display', serif;
        }

        .font-merriweather {
            font-family: 'Merriweather', serif;
        }

        .font-georgia {
            font-family: 'Georgia', serif;
        }

        .font-great-vibes {
            font-family: 'Great Vibes', cursive;
        }

        .font-dancing-script {
            font-family: 'Dancing Script', cursive;
        }

        .font-alex-brush {
            font-family: 'Alex Brush', cursive;
        }

        .font-comic-sans-ms {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .font-quicksand {
            font-family: 'Quicksand', sans-serif;
        }

        .font-pacifico {
            font-family: 'Pacifico', cursive;
        }

        .font-chewy {
            font-family: 'Chewy', cursive;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .font-lato {
            font-family: 'Lato', sans-serif;
        }

        .font-raleway {
            font-family: 'Raleway', sans-serif;
        }

        .font-bebas-neue {
            font-family: 'Bebas Neue', sans-serif;
        }

        .font-roboto-slab {
            font-family: 'Roboto Slab', serif;
        }

        .font-times-new-roman {
            font-family: 'Times New Roman', serif;
        }

        .font-garamond {
            font-family: 'Garamond', serif;
        }

        .font-open-sans {
            font-family: 'Open Sans', sans-serif;
        }

        .font-arial {
            font-family: 'Arial', sans-serif;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-libre-baskerville {
            font-family: 'Libre Baskerville', serif;
        }

        .font-satisfy {
            font-family: 'Satisfy', cursive;
        }

        .font-italiana {
            font-family: 'Italiana', cursive;
        }

        .preview-text {
            margin-top: 10px;
            font-size: 18px;
        }
    </style>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title"> Halaman Depan
                </div>
            </div>
            <div class="ibox-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#opening" role="tab"
                            style="color: #495057; font-weight: bold;"> <i class="fa fa-cogs"></i>Pengaturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Wedding" role="tab"
                            style="color: #495057; font-weight: bold;">Wedding</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#deskripsiAcara" role="tab"
                            style="color: #495057; font-weight: bold;">Deskripsi Acara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lokasi_acara" role="tab"
                            style="color: #495057; font-weight: bold;">Lokasi Acara</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content"
                    style="padding: 20px; background-color: #ffffff; border: 1px solid #dee2e6; border-top: none;">
                    <div class="tab-pane" id="opening" role="tabpanel">
                        <div class="form-group">
                            <label for="kategori">Pilih Kategori</label>
                            <select class="form-control" id="kategori">
                                <option value="wedding">Wedding</option>
                                <option value="ulangtahun">Ulang Tahun</option>
                                <option value="keagamaan">Keagamaan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ibox-footer text-right" style="padding-right: 20px;">
                    <button class="btn btn-primary" type="submit"
                        style="background-color: #007bff; border-color: #007bff;">Simpan</button>
                </div>
            </div>
        </div>
        <div class="tab-pane " id="Wedding" role="tabpanel">
            <div class="form-group">

                @include('Admin.SampelUndangan.Kategori.wedding')
            </div>
        </div>

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
                                        class="fa fa-heart"></i> Detail Wedding</a>
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
                        <form action="" method="POST">
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
                                        <select class="form-control" id="fontSelect" onchange="changeFont()">
                                            <option value="font-arial">Arial</option>
                                            <option value="font-playfair-display">Playfair Display</option>
                                            <option value="font-merriweather">Merriweather</option>
                                            <option value="font-georgia">Georgia</option>
                                            <option value="font-great-vibes">Great Vibes</option>
                                            <option value="font-dancing-script">Dancing Script</option>
                                            <option value="font-alex-brush">Alex Brush</option>
                                            <option value="font-comic-sans-ms">Comic Sans MS</option>
                                            <option value="font-poppins">Poppins</option>
                                            <option value="font-quicksand">Quicksand</option>
                                            <option value="font-pacifico">Pacifico</option>
                                            <option value="font-chewy">Chewy</option>
                                            <option value="font-montserrat">Montserrat</option>
                                            <option value="font-lato">Lato</option>
                                            <option value="font-raleway">Raleway</option>
                                            <option value="font-bebas-neue">Bebas Neue</option>
                                            <option value="font-roboto-slab">Roboto Slab</option>
                                            <option value="font-times-new-roman">Times New Roman</option>
                                            <option value="font-garamond">Garamond</option>
                                            <option value="font-open-sans">Open Sans</option>
                                            <option value="font-cinzel">Cinzel</option>
                                            <option value="font-libre-baskerville">Libre Baskerville</option>
                                            <option value="font-satisfy">Satisfy</option>
                                            <option value="font-italiana">Italiana</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Tab Informasi Umum -->
                                <div class="tab-pane fade" id="tab-7-1">

                                </div>

                                <!-- Tab Detail Wedding -->
                                <form action="" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @include('Admin.SampelUndangan.Kategori.wedding')
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>

                                <!-- Tab Detail Ulang Tahun -->
                                <div class="tab-pane fade" id="tab-ulangtahun-content">
                                    @include('Admin.SampelUndangan.Kategori.ulang_tahun_dewasa')
                                </div>

                                <!-- Tab Detail Keagamaan -->
                                <div class="tab-pane fade" id="tab-keagamaan-content">
                                    @include('Admin.SampelUndangan.Kategori.keagamaan')
                                </div>

                                <!-- Elemen pratinjau -->

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- jQuery -->
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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
                    tabWedding.classList.toggle('hidden', selectedCategory !== 'wedding');
                    tabUlangTahun.classList.toggle('hidden', selectedCategory !== 'ulangtahun');
                    tabKeagamaan.classList.toggle('hidden', selectedCategory !== 'keagamaan');
                    formWedding.style.display = selectedCategory === 'wedding' ? 'block' : 'none';
                    formUlangTahun.style.display = selectedCategory === 'ulangtahun' ? 'block' : 'none';
                    formKeagamaan.style.display = selectedCategory === 'keagamaan' ? 'block' : 'none';
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
        </script> --}}
        {{-- @include('Admin.SampelUndangan.MapJS.index') --}}
    @endsection
