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

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        body .container {
            background-color: rgba(0, 0, 0, 0.6);

        }

        .formatted-text {
            color: white;
            margin-top: 20px;
            word-wrap: break-word;
            font-size: 20px;
        }

        .logo-text {
            font-family: 'Cursive', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            letter-spacing: 5px;
        }

        .vertical-text {
            display: flex;
            flex-direction: row;
            gap: 10px;
            font-size: 30px;
            color: #b3b3b3;
        }

        .judul {
            color: #b3b3b3;
            font-size: 30px;
        }

        .hari-tgl {
            color: #b3b3b3;
            font-size: 35px;
        }

        .days,
        .hours,
        .minute,
        .seconds {
            color: #333;
            border-radius: 8px;
            background: white;
            padding: 20px;
            font-weight: bold;
        }

        .save-tanggal {
            color: #b3b3b3;
            font-size: 20px;
        }

        .teks-acara {
            text-transform: uppercase;
        }

        @keyframes fall {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100vh);
            }
        }

        .maple-leaf {
            position: absolute;
            top: -10%;
            color: orange;
            font-size: 1px;
            opacity: 0.5;
            pointer-events: none;
            animation: fall linear infinite 2s;
        }

        .three {
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.1);
        }

        body {
            transition: filter 0.5s ease;
        }

        .acara1 {
            font-size: 30px;
            padding-bottom: 10%;
        }

        .acara4 {
            font-size: 30px;
            padding-bottom: 20%;
            margin-bottom: 100%;
        }

        .detail-acara {
            font-size: 40px;
            margin-bottom: 50%;
            font-family: 'Tisa', serif;
        }

        #open-invitation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            filter: none;
        }

        .slide-up {
            transform: translateY(100%);
            opacity: 0;
            animation: slideUp 0.5s forwards;
        }

        .event {
            font-size: 20px;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .nav-button {
            transition: transform 0.3s ease;
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 5px;
            padding: 10px;
            margin: 5px;
        }

        .nav-button.active {
            transform: scale(1.2);
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .zoom-in {
            animation: zoomIn 1s forwards;
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .banner {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            color: #fff;
        }

        .banner::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
            left: 0;
            bottom: 0;
        }

        .banner::before {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: -1;
            left: 0;
            top: 0;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: translateZ(0) scale(1.0, 1.0);
            -moz-transform: translateZ(0) scale(1.0, 1.0);
            -ms-transform: translateZ(0) scale(1.0, 1.0);
            -o-transform: translateZ(0) scale(1.0, 1.0);
            transform: translateZ(0) scale(1.0, 1.0);
            background-size: cover;
            background-image: url('{{ asset('storage/' . ($undangan->cover ?? 'default_cover_image.jpg')) }}');
            background-attachment: fixed;
            animation: increase 60s linear 10ms infinite;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -ms-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            z-index: -2;
        }

        @keyframes increase {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.5);
            }
        }

        /* GALERI */
        /* Ukuran desktop dan layar lebih besar */
        .gallery {
            grid-template-columns: repeat(3, 1fr);
            /* 3 kolom */
            gap: 8px;
            /* Jarak antar gambar */
        }

        .gallery-item {
            aspect-ratio: 1 / 1;
            /* Menjaga aspek rasio 1:1 */
            overflow: hidden;
            width: 100%;
            /* Lebar kontainer gambar */
            height: 180px;
            /* Tinggi gambar, ukuran diperkecil */
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Menjaga proporsi gambar dan mengisi kotak */
        }

        /* Ukuran tablet */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(2, 1fr);
                /* 2 kolom */
                gap: 8px;
                /* Jarak antar gambar */
            }

            .gallery-item {
                height: 150px;
                /* Tinggi gambar pada tablet */
            }
        }

        /* Ukuran ponsel */
        @media (max-width: 480px) {
            .gallery {
                grid-template-columns: 1fr;
                /* 1 kolom */
                gap: 6px;
                /* Jarak antar gambar */
            }

            .gallery-item {
                height: 120px;
                /* Tinggi gambar pada ponsel */
            }
        }

        /* BACKGROUND STYLE */
        .backgorund-section1 {
            background-image: url('/info/style_undangan/bgk27.png');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: 47% center;
            background-attachment: fixed;
            /* z-index: 2;  */
        }

        .bacground-section2 {
            background-image: url('/info/style_undangan/bgk18.png');
            background-size: 30%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .bacground-section3 {
            background-image: url('/info/style_undangan/bgk21.png');
            background-size: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .bacground-section4 {
            background-image: url('/info/style_undangan/bgk26.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: left;
            background-attachment: fixed;
            /* Agar tidak menutupi konten lain */
        }

        .bacground-section5 {
            background-image: url('/info/style_undangan/bgk25.png');
            background-size: 100%;
            background-repeat: no-repeat;
            background-position: center -40px;
        }

        .card-galeri1 {
            /* background-image: url('/info/style_undangan/bgk4.png') !important; */
            /* background-color: transparent; */
            border-radius: 50%;
            width: 250px;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
            margin-bottom: 20px;
            position: relative;
        }
    </style>
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
                        <p style="color: rgb(255, 255, 255);">
                            @if (isset($undangan->wedding) && $undangan->wedding->countdown)
                                {{ \Carbon\Carbon::parse($undangan->wedding->countdown)->locale('id')->translatedFormat('l, d F Y') }}
                            @else
                                Tanggal Acara Tidak Tersedia
                            @endif
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
                            @if (isset($undangan->wedding) && $undangan->wedding->foto_pria)
                                <img src="{{ asset('storage/foto_pria/' . $undangan->wedding->foto_pria) }}"
                                    alt="Foto Pria" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <!-- Alternatif jika foto tidak tersedia -->
                                <img src="{{ asset('images/default-foto-pria.jpg') }}" alt="Foto Pria Tidak Tersedia"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            @endif

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
                            @if (isset($undangan->wedding) && $undangan->wedding->foto_wanita)
                                <img src="{{ asset('storage/foto_wanita/' . $undangan->wedding->foto_wanita) }}"
                                    alt="Foto Wanita" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <!-- Alternatif jika foto wanita tidak tersedia -->
                                <img src="{{ asset('images/default-foto-wanita.jpg') }}"
                                    alt="Foto Wanita Tidak Tersedia"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            @endif

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
                                @if (isset($undangan->wedding) && $undangan->wedding->countdown)
                                    {{ \Carbon\Carbon::parse($undangan->wedding->countdown)->locale('id')->translatedFormat('l, d F Y') }}
                                @else
                                    Tanggal Acara Tidak Tersedia
                                @endif
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
                                @if (isset($undangan->wedding) && $undangan->wedding->countdown)
                                    {{ \Carbon\Carbon::parse($undangan->wedding->countdown)->locale('id')->translatedFormat('l, d F Y') }}
                                @else
                                    Tanggal Acara Tidak Tersedia
                                @endif
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
                    $galleryData = $undangan->wedding->gallery ?? [];

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
        <audio id="background-audio" src="{{ asset($undangan->audio) }}" preload="auto"></audio>

    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Ambil koordinat dari variabel atau database
        var resepsiLat = {{ $undangan->wedding->latitude_resepsi ?? '' }};
        var resepsiLng = {{ $undangan->wedding->longitude_resepsi ?? '' }};
        var akadLat = {{ $undangan->wedding->latitude_akad ?? '' }};
        var akadLng = {{ $undangan->wedding->longitude_akad ?? '' }};

        // Initialize map for Acara 1 (Resepsi)
        const map1 = L.map('map1').setView([resepsiLat, resepsiLng], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map1);
        L.marker([resepsiLat, resepsiLng]).addTo(map1);
        L.circle([resepsiLat, resepsiLng], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map1);

        // Initialize map for Acara 2 (Akad)
        const map2 = L.map('map2').setView([akadLat, akadLng], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map2);
        L.marker([akadLat, akadLng]).addTo(map2);
        L.circle([akadLat, akadLng], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map2);
    </script>

    <script>
        @php
            // Pastikan $undangan->wedding tidak null
            if (isset($undangan->wedding) && $undangan->wedding->countdown) {
                $countdownDate = $undangan->wedding->countdown;
            } else {
                $countdownDate = null;
            }

            // Tanggal saat ini jika countdown kosong
            $defaultDate = \Carbon\Carbon::now()->format('Y-m-d\TH:i:s');

            // Format tanggal countdown atau gunakan defaultDate jika kosong
            $formattedDate = $countdownDate ? \Carbon\Carbon::parse($countdownDate)->format('Y-m-d\TH:i:s') : $defaultDate;
        @endphp

        // Inisialisasi countdownDate dengan tanggal yang diformat
        var countDownDate = new Date("{!! $formattedDate !!}").getTime();

        var x = setInterval(function() {
            var now = new Date().getTime(); // Dapatkan waktu saat ini
            var distance = countDownDate - now; // Hitung jarak waktu antara sekarang dan tanggal acara

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Tampilkan hasil di elemen dengan id "days", "hours", "minutes", dan "seconds"
            document.getElementById("days").innerHTML = days + " Hari";
            document.getElementById("hours").innerHTML = hours + " Jam";
            document.getElementById("minutes").innerHTML = minutes + " Menit";
            document.getElementById("seconds").innerHTML = seconds + " Detik";

            // Jika countdown selesai, tampilkan pesan dan sembunyikan countdown
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown-message").style.display = "block";
                document.getElementById("countdown").style.display = "none";
            }
        }, 1000);
    </script>


    < <script>
        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }


        var audio = document.getElementById('background-audio');
        var icon = document.getElementById('audio-icon');
        var isPlaying = false;

        function toggleAudio() {
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            } else {
                audio.play().catch(function(error) {
                    console.error('Error playing audio:', error);
                });
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
            }
            isPlaying = !isPlaying;
        }
    </script>

</body>

</html>
