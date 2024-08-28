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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    @include('User.TambahUndangan.Font.font')
</head>

<body class="no-scroll">
    <div class="outer-container">
        <div class="container">
            <div class="content">
                <section id="opening" class="section background1">
                    <div style="position: relative; font-family: {{ $undangan->font_keagamaan }}">
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
                                <p
                                    style="font-size: 18px; margin-top: -10px; margin-bottom: 20px; font-family: {{ $undangan->font_keagamaan }}">
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
            <audio id="audio" src="{{ asset($undangan->audio) ?? '' }}"></audio>
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
<style>
    .image-container {
        text-align: center;
        margin: 10px auto 20px auto;
        width: 180px;
        /* Sesuaikan ukuran sesuai kebutuhan */
        height: 180px;
        border: 5px solid #ffcc00;
        /* Warna border sesuai tema ulang tahun */
        border-radius: 50%;
        /* Membuat gambar berbentuk bulat */
        padding: 5px;
        background: linear-gradient(135deg, #ff99cc, #ffcc00);
        /* Latar belakang gradient untuk efek dekoratif */
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
        /* Bayangan untuk efek kedalaman */
    }

    .birthday-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        /* Pastikan gambar tetap bulat */
        object-fit: cover;
        /* Agar gambar memenuhi container dengan baik */
    }

    .birthday-title {
        color: #ffffff;
        font-size: 3rem;
        /* Ukuran font yang lebih besar */
        font-weight: bold;
        /* Membuat teks lebih tebal */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Bayangan teks untuk efek 3D */
        margin: 0;
        padding: 0;
        text-transform: uppercase;
        /* Membuat teks menjadi huruf kapital */
        letter-spacing: 2px;
        /* Jarak antar huruf */
        line-height: 1.2;
        /* Jarak antara baris teks */
        text-align: center;
        /* Menyelaraskan teks ke tengah */
        font-family: 'Arial', sans-serif;
        /* Font yang bersih dan jelas */
    }

    .card1 {
        width: 400px;
        /* Menambah lebar card */
        height: 500px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -60px;

    }

    .card2 {
        width: 400px;
        /* Menambah lebar card */
        height: 558px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -30%;
    }

    .card3 {
        width: 400px;
        /* Menambah lebar card */
        height: 450px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -20%;
    }

    .card4 {
        width: 400px;
        /* Menambah lebar card */
        height: 450px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -20%;
    }

    .card5 {
        width: 400px;
        /* Menambah lebar card */
        height: 450px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -20%;
    }

    .card6 {
        width: 400px;
        /* Menambah lebar card */
        height: 380px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -20%;
    }

    .card7 {
        width: 400px;
        /* Menambah lebar card */
        height: 380px;
        /* Menambah tinggi card */
        padding: 20px;
        /* Menambah ruang di dalam card */
        box-sizing: border-box;
        /* Memastikan padding termasuk dalam ukuran total */
        /* Gaya tambahan jika diperlukan */
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-top: -20%;
    }

    /* Mengatur tampilan galeri agar rapi dalam card */
    .gallery-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        grid-gap: 10px;
        margin-top: 10px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 5px;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    /* .background1 {
        background-image: url('/info/style_undangan/bgk26.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: left;
        background-attachment: fixed;
    } */
    .header {
        text-align: center;

    }

    @media (max-width: 768px) {
        .header-img {
            width: 40vw;
            height: 40vw;
        }
    }

    @media (max-width: 480px) {
        .header-img {
            width: 50vw;
            height: 50vw;
        }
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f7fbfc;
        overflow: hidden;
        height: 100vh;
    }

    body.no-scroll {
        overflow: hidden;
    }

    .navigation.hidden {
        display: none;
    }

    .navigation.fullscreen {
        display: flex !important;
    }

    .outer-container {
        display: flex;
        justify-content: center;
        background-color: #dcdcdc;
        height: 100%;
    }

    .container {
        width: 100%;
        max-width: 480px;
        display: flex;
        flex-direction: column;
        min-height: 100%;
        height: 100%;
        background-color: #ffffff;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-image: url('{{ asset('storage/' . ($undangan->cover ?? 'default_cover_image.jpg')) }}');
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: center top;
        padding-bottom: 100px;
    }

    .content {
        flex: 1;
        overflow-y: hidden;
        scroll-behavior: smooth;
        padding: 10px;
    }

    .section {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: rgb(3, 3, 3);
        padding: 20px;

        background-repeat: no-repeat;
        background-position: center;
    }

    #opening {
        background-image: url('background-image.jpg');
        background-size: cover;
        background-position: center;
    }

    .countdown {
        display: flex;
        gap: 10px;
        margin-top: 30px;

    }

    .countdown div {
        background: yellow;
        color: black;
        padding: 10px;
        border-radius: 10px;
        font-size: 1rem;
    }

    .navigation {
        position: fixed;
        bottom: 0;
        width: 150%;
        max-width: 480px;
        background-color: #3E4A61;
        display: flex;
        justify-content: flex-start;
        overflow-x: auto;
        padding: 10px 0;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        scrollbar-width: none;
        /* Hide scrollbar in Firefox */
    }

    .navigation a {
        color: #f7c96d;
        text-decoration: none;
        font-size: 1.9rem;
        padding: 12px 25px;
        border-radius: 10px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .navigation::-webkit-scrollbar {
        display: none;
        /* Hide scrollbar in Chrome, Safari, and Edge */
    }

    .navigation a.active {
        background-color: #2B3648;
        color: yellow;
    }

    .navigation a:hover {
        color: yellow;
        background-color: #2B3648;
        transform: translateY(-2px);
    }

    .fullscreen-btn {
        position: absolute;
        margin-top: 8%;
        padding: 10px 20px;
        font-size: 14px;
        background-color: #3E4A61;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btnMap {

        margin-top: 8%;
        padding: 10px 20px;
        font-size: 14px;
        background-color: #3E4A61;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        z-index: 999;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .fullscreen-btn:hover {
        background-color: #2B3648;
        transform: translateY(-2px);
    }
</style>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const countdownKeagamaan = "{{ $undangan->keagamaan->countdown_keagamaan ?? '' }}";
        console.log("Countdown Date:", countdownKeagamaan);

        if (!countdownKeagamaan || isNaN(Date.parse(countdownKeagamaan))) {
            document.getElementById('countdown').innerHTML = '<p>Countdown data tidak tersedia.</p>';
            return;
        }

        const targetDate = new Date(countdownKeagamaan).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById('countdown').innerHTML = '<p>Countdown telah berakhir.</p>';
                clearInterval(countdownInterval);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').innerText = days;
            document.getElementById('hours').innerText = hours;
            document.getElementById('minutes').innerText = minutes;
            document.getElementById('seconds').innerText = seconds;
        }

        const countdownInterval = setInterval(updateCountdown, 1000);

        const fullscreenBtn = document.getElementById("fullscreenBtn");
        const navigation = document.querySelector(".navigation");

        if (fullscreenBtn) {
            fullscreenBtn.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                }
            });
        }

        document.addEventListener("fullscreenchange", function() {
            if (document.fullscreenElement) {
                fullscreenBtn.style.display = "none";
                navigation.classList.remove("hidden");
                document.body.classList.remove("no-scroll");
            } else {
                fullscreenBtn.style.display = "block";
                navigation.classList.add("hidden");
                document.body.classList.add("no-scroll");
            }
        });

        const navLinks = document.querySelectorAll('.navigation a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
    let scrollAmount = 0;
    const scrollStep = 150; // Sesuaikan ukuran langkah scroll
    const maxScroll = navigation.scrollWidth - navigation.clientWidth;

    function autoScrollNavigation() {
        if (scrollAmount < maxScroll) {
            scrollAmount += scrollStep;
        } else {
            scrollAmount = 0; // Reset ke awal
        }
        navigation.scrollLeft = scrollAmount;
    }

    setInterval(autoScrollNavigation, 3000); // Scroll otomatis setiap 3 detik
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil data latitude dan longitude
        var latKeagamaan = {{ $undangan->keagamaan->latitude_keagamaan ?? 'null' }};
        var lngKeagamaan = {{ $undangan->keagamaan->longitude_keagamaan ?? 'null' }};

        // Periksa jika data latitude dan longitude valid
        if (latKeagamaan !== null && lngKeagamaan !== null && !isNaN(latKeagamaan) && !isNaN(lngKeagamaan)) {
            // Inisialisasi peta hanya jika data valid
            const map1 = L.map('map1').setView([latKeagamaan, lngKeagamaan], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map1);

            L.marker([latKeagamaan, lngKeagamaan]).addTo(map1);

            L.circle([latKeagamaan, lngKeagamaan], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map1);
        } else {
            // Tampilkan pesan atau sembunyikan elemen peta jika data tidak valid
            document.getElementById('map1').innerHTML = '<p>Lokasi tidak tersedia.</p>';
        }

        // Fullscreen button functionality
        const fullscreenBtn = document.getElementById("fullscreenBtn");
        const navigation = document.querySelector(".navigation");

        if (fullscreenBtn) {
            fullscreenBtn.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                }
            });
        }

        document.addEventListener("fullscreenchange", function() {
            if (document.fullscreenElement) {
                fullscreenBtn.style.display =
                    "none"; // Sembunyikan tombol fullscreen saat mode fullscreen aktif
                if (navigation) {
                    navigation.classList.remove("hidden"); // Tampilkan navigasi saat fullscreen
                }
            } else {
                fullscreenBtn.style.display =
                    "none"; // Sembunyikan tombol fullscreen saat keluar dari fullscreen
                if (navigation) {
                    navigation.classList.remove(
                        "hidden"); // Tampilkan navigasi saat keluar dari fullscreen
                }
            }
        });

        const navLinks = document.querySelectorAll('.navigation a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navLinks.forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>
<script>
    function showContent(type) {
        // Sembunyikan semua konten
        document.getElementById('hadiah').style.display = 'none';
        document.getElementById('kado').style.display = 'none';

        // Tampilkan konten sesuai tombol yang diklik
        if (type === 'hadiah') {
            document.getElementById('hadiah').style.display = 'block';
        } else if (type === 'kado') {
            document.getElementById('kado').style.display = 'block';
        }
    }
</script>
<script>
    const audio = document.getElementById('audio');
    const playBtn = document.getElementById('play-btn');
    const playIcon = document.getElementById('play-icon');
    const volumeBtn = document.getElementById('volume-btn');
    const volumeIcon = document.getElementById('volume-icon');

    // Play/Pause Toggle
    playBtn.addEventListener('click', () => {
        if (audio.paused || audio.ended) {
            audio.play();
            playIcon.classList.remove('fa-play');
            playIcon.classList.add('fa-pause');
        } else {
            audio.pause();
            playIcon.classList.remove('fa-pause');
            playIcon.classList.add('fa-play');
        }
    });

    // Volume/Mute Toggle
    volumeBtn.addEventListener('click', () => {
        if (audio.muted) {
            audio.muted = false;
            volumeIcon.classList.remove('fa-volume-mute');
            volumeIcon.classList.add('fa-volume-up');
        } else {
            audio.muted = true;
            volumeIcon.classList.remove('fa-volume-up');
            volumeIcon.classList.add('fa-volume-mute');
        }
    });
</script>
