<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Invitation</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/regular.css') }}">
</head>

<body class="no-scroll">
    <div class="outer-container">
        <div class="container">
            <div class="content">
                <section id="opening" class="section background1">
                    <div style="position: relative;">
                        <h1
                            style="color: #ffffff; position: absolute; top: -180px; left: 50%; transform: translateX(-50%); text-align: center; font-size: 38px; font-weight: 1000; font-family: 'League Spartan', sans-serif;">
                            SYUKURAN
                        </h1>
                    </div>
                    <div class="card1"
                        style="background-color: transparent; box-shadow: 0 0 15px rgba(247, 201, 109, 1); border-radius: 2%; border: 2px solid #f7c96d">
                        <div class="card-body">
                            <div class="header" style="text-align: center; padding: 20px;">
                                <h1
                                    style="font-size: 40px; font-family: 'Cinzel', serif; margin-top: 0; color: #f5e6c8;"">
                                    {{ $undangan->keagamaan->judul_acara_keagamaan ?? '' }}</h1>
                                <h2
                                    style="font-size: 20px; color: #ffffff; background-color: transparent; padding: 10px 20px; border-radius: 50px; display: inline-block; margin-top: 10%; border: 2px solid #f7c96d;">
                                    {{ $undangan->keagamaan->nama_lengkap_keagamaan ?? '' }}
                                </h2>

                                <div
                                    style="margin-top: 20px; background-color: transparent; padding: 15px; border-radius: 15px; text-align: center; border: 2px solid #f7c96d;">
                                    <p style="color: #ffffff; margin: 0; font-size: 18px; font-weight: bold;">
                                        Kepada Yth:
                                    </p>
                                    <hr style="border-top: 1px solid #f7c96d;">
                                    <p style="color: #ddd; margin: 5px 0 0; font-size: 16px;">
                                        Bapak/Ibu/Saudara/I
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button id="fullscreenBtn" class="fullscreen-btn"><i class="far fa-paper-plane"></i> Buka
                        Undangan</button>
                </section>
                <section id="acara" class="section">
                    <div class="card2"
                        style="box-shadow: 0 0 15px rgba(255, 255, 255, 0.2); background-color: transparent; padding: 20px; border-radius: 10px;">
                        <div class="card-body">
                            <div class="details" style="text-align: center; color: #ffffff;">
                                <p style="margin-top: 0; font-size: 24px;">Assalamu'alaikum Wr Wb</p>
                                <p style="font-size: 18px; margin-top: -10px; margin-bottom: 20px;">
                                    Tanpa mengurangi rasa hormat kami bermaksud mengundang Bapak/Ibu/Saudara/i pada
                                    acara syukuran khitan anak kami:
                                </p>
                                <img src="{{ optional($undangan->keagamaan)->foto_keagamaan ? asset('storage/foto_keagamaan/' . $undangan->keagamaan->foto_keagamaan) : asset('path/to/placeholder-image.png') }}"
                                    alt="Foto Keagamaan"
                                    style="
         width: 200px; 
         height: 260px; 
         object-fit: cover; 
         background: url('/path/to/background-pattern.png') no-repeat center center;
         background-size: cover;
         border-radius: 100px 100px 0 0; /* Rounded top corners */
         overflow: hidden; /* Ensures the image does not overflow the rounded corners */
     ">


                                <p style="font-size: 28px; font-weight: bold; margin-bottom: 3px;">
                                    {{ $undangan->keagamaan->nama_lengkap_keagamaan ?? '' }}</p>
                                <p style="font-size: 18px; margin-bottom: 20px;">
                                    {{ $undangan->keagamaan->nama_ayah_keagamaan ?? '' }} &
                                    {{ $undangan->keagamaan->nama_ibu_keagamaan ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="maps" class="section">
                    <div class="card4"
                        style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); background-color: transparent; padding: 20px; border-radius: 10px;">
                        <div class="card-body" style="color: #ffffff; text-align: center;">
                            <h1 class="birthday-title"
                                style="font-size: 40px; font-family: 'Cinzel', serif; margin-top: 0; color: #f5e6c8;">
                                {{ $undangan->keagamaan->judul_acara_keagamaan ?? '' }}
                            </h1>
                            <p style="font-size: 18px; margin-top: 10px;">Insya Allah akan di laksanakan pada:</p>
                            <p style="font-size: 24px; font-weight: bold; margin-top: 10px;">
                                {{ optional($undangan->keagamaan)->countdown_keagamaan? \Carbon\Carbon::parse($undangan->keagamaan->countdown_keagamaan)->locale('id')->isoFormat('dddd, D MMMM YYYY'): '' }}
                            </p>


                            <p style="font-size: 18px; margin-bottom: 20px;">
                                {{ $undangan->keagamaan->jam_mulai_keagamaan ?? '' }} -
                                {{ $undangan->keagamaan->jam_selesai_keagamaan ?? '' }} PM</p>
                            <p style="font-size: 18px; margin-bottom: 20px;">
                                {{ $undangan->keagamaan->alamat_acara_keagamaan ?? '' }}
                            </p>
                            <div id="countdown" class="countdown"
                                style="display: flex; justify-content: space-around; margin-top: 20px; font-size: 16px;">
                                <div
                                    style="background-color: #f5e6c8; padding: 10px 20px; border-radius: 10px; color: #3e2723;">
                                    <span id="days"></span> Hari
                                </div>
                                <div
                                    style="background-color: #f5e6c8; padding: 10px 20px; border-radius: 10px; color: #3e2723;">
                                    <span id="hours"></span> Jam
                                </div>
                                <div
                                    style="background-color: #f5e6c8; padding: 10px 20px; border-radius: 10px; color: #3e2723;">
                                    <span id="minutes"></span> Menit
                                </div>
                                <div
                                    style="background-color: #f5e6c8; padding: 10px 20px; border-radius: 10px; color: #3e2723;">
                                    <span id="seconds"></span> Detik
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section id="rsvp" class="section">
                    <div class="card4"style=" box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                        <div class="card-body">
                            <h1 class="birthday-title"
                                style="color: rgb(255, 255, 255); margin-top: 3%; font-size: 30px">
                                LOKASI ACARA</h1>
                            <div id="map1"
                                style="width: 100%; height: 250px; border-radius: 10px; margin-top: 5%;"></div>
                        </div>
                        <a href="{{ $undangan->keagamaan->link_map_keagamaan ?? '' }}" target="_blank">
                            <button class="btnMap">Petunjuk ke Lokasi</button>
                        </a>
                    </div>
                </section>
                <section id="galeri" class="section">
                    <div class="card7"
                        style="
                        width: 400px;
                        height: 380px;
                        padding: 20px;
                        box-sizing: border-box;
                        background-color: transparent;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        margin-top: -20%;
                    ">
                        <div class="card-body" style="text-align: center; color: #ffffff; font-size: 18px;">
                            <h2 style="margin-bottom: 20px;">Galeri</h2>
                            <div class="gallery-container"
                                style="
                                display: flex;
                                flex-wrap: wrap;
                                justify-content: space-between;
                                gap: 5px;
                                height: 100%;
                            ">
                                @php
                                    $galleryImages = [];
                                    if ($undangan->keagamaan) {
                                        $galleryData = $undangan->keagamaan->galeri_keagamaan;

                                        if (!empty($galleryData)) {
                                            if (is_string($galleryData)) {
                                                $galleryImages = json_decode($galleryData, true);
                                            } elseif (is_array($galleryData)) {
                                                $galleryImages = $galleryData;
                                            }
                                        }

                                        $galleryImages = array_filter($galleryImages, function ($item) {
                                            return !empty($item);
                                        });
                                    }
                                @endphp

                                @if (count($galleryImages) > 0)
                                    @foreach ($galleryImages as $index => $image)
                                        @if ($index < 4)
                                            <!-- Only display the first 4 images -->
                                            <div class="gallery-item"
                                                style="
                                                width: calc(50% - 5px); 
                                                height: calc(50% - 5px);
                                                overflow: hidden;
                                            ">
                                                <img src="{{ asset('storage/gallery_keagamaan/' . $image) ?? '' }}"
                                                    alt="Gallery Image"
                                                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <section id="gift" class="section">
                    <div class="card6">
                        <div class="card-body" style="text-align: center; color: #ffffff; font-size: 18px;">
                            <p>{{ $undangan->keagamaan->terimakasih_keagamaan ?? 'Nama kosong' }}</p>

                            <!-- Jarak antara teks sebelumnya dengan "Hormat Kami" -->
                            <p style="margin-top: 25px; font-size: 20px; font-style: italic;">Hormat Kami Yang
                                Mengundang</p>
                            <!-- Jarak antara "Hormat Kami" dengan nama -->
                            <p style="font-size: 28px; margin-top: 10px;">
                                {{ $undangan->keagamaan->nama_ayah_keagamaan ?? 'Nama kosong' }} &
                                {{ $undangan->keagamaan->nama_ibu_keagamaan ?? 'Nama kosong' }}</p>
                        </div>
                    </div>
                </section>

            </div>
            <!-- Add the buttons inside content and stack them vertically -->
            <div class="audio-controls"
                style="display: flex; flex-direction: column; align-items: center; position: absolute; top: 60%; right: 35%; z-index: 10;">
                <button class="audio-btn" id="volume-btn"
                    style="background-color: #3e4a61; border-radius: 50%; padding: 15px; margin-bottom: 10px; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                    <i class="fas fa-volume-up" id="volume-icon" style="color: white; font-size: 18px;"></i>
                </button>
                <button class="play-btn" id="play-btn"
                    style="background-color: #3e4a61; border-radius: 50%; padding: 15px; width: 50px; height: 50px; display: flex; justify-content: center; align-items: center;">
                    <i class="fas fa-play" id="play-icon" style="color: white; font-size: 18px;"></i>
                </button>
            </div>
            <audio id="audio" src="{{ asset('storage/' . $undangan->audio) }}" autoplay></audio>
            <div class="navigation hidden">
                <a href="#opening"><i class="fa fa-home"></i></a>
                <a href="#acara"><i class="fas fa-file-alt"></i></a>
                <a href="#maps"><i class="far fa-calendar-alt"></i></a>
                <a href="#rsvp"><i class="fa fa-map-marker-alt"></i></a>
                <a href="#galeri"><i class="far fa-file-image"></i></a>
                <a href="#gift"><i class="fa fa-check-square"></i></a>
                {{-- <a href="#gift"><i class="fa fa-check-square"></i></a> --}}
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
@include('Admin.PreviewUndangan.StyleKategori.StyleKeagamaan.cssKeagamaan')
@include('Admin.PreviewUndangan.StyleKategori.StyleKeagamaan.jsKeagamaan')
