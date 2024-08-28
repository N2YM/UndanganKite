@extends('Template.User.base')
@section('content')
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@include('User.TambahUndangan.Font.font')
    <style>
       

        .preview-text {
            margin-top: 10px;
            font-size: 18px;
        }
    </style>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('sampel-undangan') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
                <div class="ibox mt-2">
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
