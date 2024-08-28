<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('CSS/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    @include('User.PreviewTemplate.font')
    <title>Document</title>
    @include('Admin.PreviewUndangan.StyleKategori.StylePernikahan.cssPernikahan')
</head>

<body>
    <div class="container">
        <section id="one" class="banner backgorund-section1">
            <div class="card"
                style="
                    background-color: transparent; 
                    padding: 30px; 
                    border-radius: 15px; 
                    text-align: center; 
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    max-width: 800px;
                    margin: 0 auto; /* Pusatkan kartu */
                ">
                <br><br>
                <h1 class="fade-in logo-text" style="font-size: 70px; text-align: center; color: white;"></h1>
                <div class="wedding-card slide-up"
                    style="text-align: center; background: transparent; border-radius: 10px; padding: 20px; margin-top: 20px; position: relative; border: 2px solid rgba(255, 255, 255, 0.8); opacity: 0.9; color: #f0f0f0;">
                    <!-- Content for Section One -->
                    <div class="judul slide-up">
                        <h2 style="{{ $undangan->wedding->font ?? 'font-arial' }}">{!! $undangan->wedding->judul_acara ?? 'Judul Acara Tidak Tersedia' !!}</h2>
                    </div>
                    <br>
                    <div class="vertical-text" style="justify-content: center; align-items: center;">
                        <h3 style="margin: 0;" class="slide-up">{!! $undangan->wedding->np_pria ?? 'Nama Mempelai Pria Tidak Tersedia' !!}</h3>
                        <h3 style="margin: 0;" class="slide-up">&</h3>
                        <h3 style="margin: 0;" class="slide-up">{!! $undangan->wedding->np_wanita ?? 'Nama Mempelai Wanita Tidak Tersedia' !!}</h3>
                    </div>
                    <br><br><br>
                    <div class="hari-tgl">
                        <p class="slide-up">
                            {{ \Carbon\Carbon::parse(optional($undangan->wedding)->countdown)->locale('id')->translatedFormat('l, d F Y') ?? 'Tanggal Acara Tidak Tersedia' }}
                        </p>

                    </div>
                    <br>
                    <div class="save-tanggal">
                        <h3 class="slide-up">- Save the Date Pernikahan-</h3>
                    </div>
                    <br>
                    <div class="countdown" id="countdown" style="display: flex; justify-content: center; gap: 10px;">
                        <div class="days" id="days" style="min-width: 80px;">00 Hari</div>
                        <div class="hours" id="hours" style="min-width: 80px;">00 Jam</div>
                        <div class="minute" id="minutes" style="min-width: 80px;">00 Menit</div>
                        <div class="seconds" id="seconds" style="min-width: 80px;">00 Detik</div>
                    </div>
                    <div id="countdown-message" style="display: none; text-align: center; margin-top: 20px;">Acara
                        Dimulai!</div>
                </div>
            </div>
        </section>
        <!-- Repeat for other sections -->
        <section id="two" class="banner bacground-section2">
            <div class="card"
                style="
                        background-color: transparent; 
                        padding: 30px; 
                        border-radius: 15px; 
                        text-align: center; 
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                        max-width: 800px;
                        margin: 0 auto; /* Pusatkan kartu */
                    ">
                <h2
                    style="
                            font-family: 'Georgia', serif; 
                            font-size: 2.5rem; 
                            color: #f0f0f0;
                        ">
                    Mempelai</h2>

                <p
                    style="
                            text-align: center; 
                            white-space: pre-line; 
                            font-family: 'Arial', sans-serif; 
                            font-size: 1rem; 
                            color: #cccccc; 
                            margin-bottom: 40px;
                        ">
                    {{ $undangan->wedding->kata_sambutan ?? '' }}
                </p>

                <div
                    style="
                            display: flex; 
                            justify-content: center; 
                            gap: 50px;
                        ">
                    <!-- Mempelai Pria -->
                    <div style="text-align: center;">
                        <div
                            style="
                                    border-radius: 50%; 
                                    overflow: hidden; 
                                    width: 150px; 
                                    height: 150px; 
                                    margin: auto;
                                ">
                            <img src="{{ asset('storage/foto_pria/' . (optional($undangan->wedding)->foto_pria ?? 'default-image.jpg')) }}"
                                alt="Foto Pria" style="width: 100%; height: 100%; object-fit: cover;">

                        </div>
                        <h3
                            style="
                                    font-family: 'Georgia', serif; 
                                    font-size: 1.8rem; 
                                    color: #f0f0f0;
                                ">
                            {{ $undangan->wedding->np_pria ?? '' }}
                        </h3>
                        <p
                            style="
                                    font-family: 'Arial', sans-serif; 
                                    font-size: 1rem; 
                                    color: #cccccc;
                                ">
                            {{ $undangan->wedding->nl_pria ?? '' }}<br>Putra
                            dari<br><b>{{ $undangan->wedding->ayah_pria ?? '' }}</b><br>&<br><b>{{ $undangan->wedding->ibu_pria ?? '' }}</b><br>{{ $undangan->wedding->alamat_org_tua_mp ?? '' }}
                        </p>
                    </div>

                    <!-- Mempelai Wanita -->
                    <div style="text-align: center;">
                        <div
                            style="
                                    border-radius: 50%; 
                                    overflow: hidden; 
                                    width: 150px; 
                                    height: 150px; 
                                    margin: auto;
                                ">
                            <img src="{{ asset('storage/foto_wanita/' . (optional($undangan->wedding)->foto_wanita ?? 'default-woman.jpg')) }}"
                                alt="Foto Wanita" style="width: 100%; height: 100%; object-fit: cover;">

                        </div>
                        <h3
                            style="
                                    font-family: 'Georgia', serif; 
                                    font-size: 1.8rem; 
                                    color: #f0f0f0;
                                ">
                            {{ $undangan->wedding->np_wanita ?? '' }}
                        </h3>
                        <p
                            style="
                                    font-family: 'Arial', sans-serif; 
                                    font-size: 1rem; 
                                    color: #cccccc;
                                ">
                            {{ $undangan->wedding->nl_wanita ?? '' }}<br>Putri
                            dari<br><b>{{ $undangan->wedding->ayah_wanita ?? '' }}</b><br>&<br><b>{{ $undangan->wedding->ibu_wanita ?? '' }}</b><br>{{ $undangan->wedding->alamat_org_tua_mw ?? '' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="three" class="banner bacground-section3">
            <div class="card"
                style="padding: 10px; 
                   border-radius: 20px; 
                   text-align: center; 
                   width: 1000px; 
                   margin-top: 0px; 
                   height: 550px;">
                <h2 style="font-size: 36px; color: rgb(252, 252, 252); margin-bottom: 30px;">Detail Acara</h2>
                <div style="display: flex; justify-content: space-around; gap: 20px; margin-top: 2%;">
                    <!-- Acara 1 -->
                    <div class="card"
                        style="background-color: transparent; padding: 20px; border-radius: 20px; width: 45%; height: 450px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); display: flex; flex-direction: column;">
                        <div style="flex: 1;">
                            <h3 class="mt-2" style="font-size: 24px; color: rgb(255, 255, 255);">Resepsi</h3>
                            <p style="color: rgb(255, 255, 255);">
                                {{ optional($undangan->wedding)->countdown? \Carbon\Carbon::parse(optional($undangan->wedding)->countdown)->locale('id')->translatedFormat('l, d F Y'): 'Tanggal Acara Tidak Tersedia' }}
                            </p>

                            <p style="color: rgb(255, 255, 255);">{{ $undangan->wedding->jam_mulai_resepsi ?? '' }} -
                                {{ $undangan->wedding->jam_selesai_resepsi ?? '' }} WIB</p>
                            <h4 style="font-size: 18px; color: rgb(255, 255, 255);">Gedung Acara 1</h4>
                            <p style="color: rgb(255, 255, 255);">{{ $undangan->wedding->lokasi_acara_resepsi ?? '' }}
                            </p>
                        </div>
                        <!-- Map for Acara 1 -->
                        <div style="flex-grow: 1; align-self: stretch; margin-top: 20px;">
                            <div id="map1" style="width: 100%; height: 250px; border-radius: 10px;"></div>
                        </div>
                        <button
                            style="background-color: #4a4a4a; color: white; padding: 10px 20px; border-radius: 10px; border: none; margin-top: 10px; align-self: center;">Buka
                            Map</button>
                    </div>

                    <!-- Acara 2 -->
                    <div class="card"
                        style="background-color: transparent; padding: 20px; border-radius: 20px; width: 45%; height: 450px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4); display: flex; flex-direction: column;">
                        <div style="flex: 1;">
                            <h3 style="font-size: 24px; color: rgb(255, 255, 255);">Akad</h3>
                            <p style="color: rgb(255, 255, 255);">
                                {{ optional($undangan->wedding)->countdown? \Carbon\Carbon::parse(optional($undangan->wedding)->countdown)->locale('id')->translatedFormat('l, d F Y'): 'Tanggal Acara Tidak Tersedia' }}
                            </p>

                            <p style="color: rgb(255, 255, 255);">{{ $undangan->wedding->jam_mulai_akad ?? '' }} -
                                {{ $undangan->wedding->jam_selesai_akad ?? '' }} WIB</p>
                            <h4 style="font-size: 18px; color: rgb(255, 255, 255);">Gedung Acara 2</h4>
                            <p style="color: rgb(255, 255, 255);">{{ $undangan->wedding->lokasi_acara_akad ?? '' }}
                            </p>
                        </div>
                        <!-- Map for Acara 2 -->
                        <div style="flex-grow: 1; align-self: stretch;">
                            <div id="map2" style="width: 100%; height: 250px; border-radius: 10px;"></div>
                        </div>
                        <button
                            style="background-color: #4a4a4a; color: white; padding: 10px 20px; border-radius: 10px; border: none; margin-top: 10px; align-self: center;">Buka
                            Map</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="four" class="banner bacground-section4" style=" padding: 50px 0; text-align: center;">
            <div class="container"
                style="overflow: hidden; background: transparent;  max-width: 1200px; margin: 0 auto; padding: 0 15px; height: 400px;">
                <div class="card-wrapper"
                    style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                    <div class="card-galeri1">
                        <h3 class="card-title"
                            style="font-family: 'Cursive', sans-serif; font-size: 24px; color: #6f7a8c; margin: 10px 0;">
                            Kenalan</h3>
                        <p class="card-subtitle"
                            style="font-style: italic; font-size: 16px; color: #6f7a8c; margin-bottom: 10px;">
                            {{ $undangan->wedding->tanggal_kenalan ?? '' }}</p>
                        <p class="card-text"
                            style="font-size: 14px; color: #6f7a8c; text-align: center; padding: 0 15px;">
                            {{ $undangan->wedding->cerita_kenalan ?? '' }}</p>
                        <div
                            style="position: absolute; top: -20px; left: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                        <div
                            style="position: absolute; bottom: -20px; right: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                    </div>
                    <div class="card"
                        style="background-color: transparent; border-radius: 50%; width: 250px; height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(0, 0, 0, 0.4); margin-bottom: 20px; position: relative;">
                        <h3 class="card-title"
                            style="font-family: 'Cursive', sans-serif; font-size: 24px; color: #6f7a8c; margin: 10px 0;">
                            Jadian</h3>
                        <p class="card-subtitle"
                            style="font-style: italic; font-size: 16px; color: #6f7a8c; margin-bottom: 10px;">
                            {{ $undangan->wedding->tanggal_jadian ?? '' }}</p>
                        <p class="card-text"
                            style="font-size: 14px; color: #6f7a8c; text-align: center; padding: 0 15px;">
                            {{ $undangan->wedding->cerita_jadian ?? '' }}</p>
                        <div
                            style="position: absolute; top: -20px; left: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                        <div
                            style="position: absolute; bottom: -20px; right: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                    </div>
                    <div class="card"
                        style="background-color: transparent; border-radius: 50%; width: 250px; height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(0, 0, 0, 0.4); margin-bottom: 20px; position: relative;">
                        <h3 class="card-title"
                            style="font-family: 'Cursive', sans-serif; font-size: 24px; color: #6f7a8c; margin: 10px 0;">
                            Tunangan</h3>
                        <p class="card-subtitle"
                            style="font-style: italic; font-size: 16px; color: #6f7a8c; margin-bottom: 10px;">
                            {{ $undangan->wedding->tanggal_tunangan ?? '' }}</p>
                        <p class="card-text"
                            style="font-size: 14px; color: #6f7a8c; text-align: center; padding: 0 15px;">
                            {{ $undangan->wedding->cerita_tunangan ?? '' }}</p>
                        <div
                            style="position: absolute; top: -20px; left: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                        <div
                            style="position: absolute; bottom: -20px; right: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                    </div>
                    <div class="card"
                        style="background-color: transparent; border-radius: 50%; width: 250px; height: 250px; display: flex; flex-direction: column; justify-content: center; align-items: center; box-shadow: 0 0 15px rgba(0, 0, 0, 0.4); margin-bottom: 20px; position: relative;">
                        <h3 class="card-title"
                            style="font-family: 'Cursive', sans-serif; font-size: 24px; color: #6f7a8c; margin: 10px 0;">
                            Nikah</h3>
                        <p class="card-subtitle"
                            style="font-style: italic; font-size: 16px; color: #6f7a8c; margin-bottom: 10px;">
                            {{ $undangan->wedding->tanggal_nikah ?? '' }}</p>
                        <p class="card-text"
                            style="font-size: 14px; color: #6f7a8c; text-align: center; padding: 0 15px;">
                            {{ $undangan->wedding->cerita_nikah ?? '' }}</p>
                        <div
                            style="position: absolute; top: -20px; left: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                        <div
                            style="position: absolute; bottom: -20px; right: -20px; width: 70px; height: 70px; background: url('your-floral-image-url.png') no-repeat center center; background-size: contain;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="five" class="banner bacground-section5"
            style="padding: 50px 0; text-align: center; position: relative;">
            <h2 class="section-title"
                style="font-family: 'Cursive', sans-serif; font-size: 36px; color: #ffffff; margin-bottom: 40px; position: absolute; top: 120px; left: 50%; transform: translateX(-50%); z-index: 1; background: transparent; padding: 10px 20px; border-radius: 5px;">
                Photo Gallery
            </h2>
            <div class="gallery"
                style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 8px; max-width: 1200px; margin: 0 auto;">
                @php
                    // Ambil data gallery dari model
                    $galleryData = optional($undangan->wedding)->gallery;

                    // Jika gallery berupa string JSON, decode
                    if (is_string($galleryData)) {
                        $galleryImages = json_decode($galleryData, true);
                    } elseif (is_array($galleryData)) {
                        // Jika sudah berupa array, gunakan langsung
                        $galleryImages = $galleryData;
                    } else {
                        $galleryImages = []; // Jika tidak valid, gunakan array kosong
                    }

                    // Filter elemen kosong dari array
                    $galleryImages = array_filter($galleryImages, function ($item) {
                        return !empty($item); // Hapus elemen kosong
                    });
                @endphp

                @if (!empty($galleryImages))
                    @foreach ($galleryImages as $image)
                        <div class="gallery-item" style="position: relative; overflow: hidden;">
                            <img src="{{ asset('storage/gallery/' . $image) }}" alt="Gallery Image"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                        </div>
                    @endforeach
                @else
                    <p>No images available.</p>
                @endif
            </div>

        </section>
    </div>
    <div class="navigation-buttons">
        <button class="nav-button" onclick="scrollToSection('one')"><i class="fa-solid fa-home"></i></button>
        <button class="nav-button" onclick="scrollToSection('two')"><i class="fa-solid fa-user"></i></button>
        <button class="nav-button" onclick="scrollToSection('three')"><i class="fa-solid fa-calendar"></i></button>
        <button class="nav-button" onclick="scrollToSection('four')"><i class="fa-solid fa-envelope"></i></button>
        <button class="nav-button" onclick="scrollToSection('five')"><i class="fa-solid fa-image"></i></button>
        <button class="nav-button" onclick="toggleAudio()">
            <i id="audio-icon" class="fa-solid fa-play"></i>
        </button>
        <audio id="background-audio" src="{{ asset('storage/' . $undangan->audio) }}" preload="auto"
            autoplay></audio>

    </div>

</body>
@include('Admin.PreviewUndangan.StyleKategori.StylePernikahan.jsPernikahan')

</html>
