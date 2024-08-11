@extends('Template.Admin.base')
@section('content')
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    {{-- @include('Admin.SampelUndangan.CSSMap.index') --}}
    {{-- @include('Admin.SampelUndangan.JenisFont.index') --}}
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
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit/Isi Data Undangan Syukuran</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pengaturan" data-toggle="tab"><i class="fa fa-cogs"></i>
                                    Pengaturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#InformasiUmum" data-toggle="tab"><i
                                        class="fa fa-info-circle"></i>
                                    Informasi Umum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#opening" data-toggle="tab"><i class="fa fa-heart"></i>
                                    Opening</a>
                            </li>
                            {{-- <li class="nav-item hidden" id="tab-ulangtahun">
                                <a class="nav-link" href="#tab-ulangtahun-content" data-toggle="tab"><i
                                        class="fa fa-birthday-cake"></i> Detail Ulang Tahun</a>
                            </li>
                            <li class="nav-item hidden" id="tab-keagamaan">
                                <a class="nav-link" href="#tab-keagamaan-content" data-toggle="tab"><i
                                        class="fa fa-praying-hands"></i> Detail Keagamaan</a>
                            </li> --}}
                        </ul>
                        <form action="" method="POST">
                            @csrf
                            <div class="tab-content">
                                <!-- Tab Pengaturan -->
                                <div class="tab-pane fade show active" id="pengaturan">
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

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="InformasiUmum">
                                    <h1>hii</h1>
                                </div>
                                <div class="tab-pane fade " id="opening">
                                    <h1>hi</h1>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
