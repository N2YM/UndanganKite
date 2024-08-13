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
    </style>
</head>

<body>
    <div class="container">
        <section id="one" class="banner">
            <div class="card"
                style="max-width: 900px; margin-top: -90px; background-color: transparent; padding: 20px; border-radius: 20px; height: 500px;">
                <br><br>
                <h1 class="fade-in logo-text" style="font-size: 70px; text-align: center; color: white;"></h1>
                <div class="wedding-card slide-up"
                    style="text-align: center; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; padding: 20px; margin-top: 20px; position: relative; border: 2px solid rgba(255, 255, 255, 0.8); opacity: 0.9; color: #f0f0f0;">
                    <!-- Content for Section One -->
                    <div class="judul slide-up">
                        <h2>{!! $undangan->wedding->judul_acara ?? 'Judul Acara Tidak Tersedia' !!}</h2>
                    </div>
                    <br>
                    <div class="vertical-text" style="justify-content: center; align-items: center;">
                        <h3 style="margin: 0;" class="slide-up">{!! $undangan->wedding->np_pria ?? 'Nama Mempelai Pria Tidak Tersedia' !!}</h3>
                        <h3 style="margin: 0;" class="slide-up">&</h3>
                        <h3 style="margin: 0;" class="slide-up">{!! $undangan->wedding->np_pria ?? 'Nama Mempelai Wanita Tidak Tersedia' !!}</h3>
                    </div>
                    <br><br><br>
                    <div class="hari-tgl">
                        <p class="slide-up">
                            {{ \Carbon\Carbon::parse($undangan->wedding->countdown)->locale('id')->translatedFormat('l, d F Y') ?? 'Tanggal Acara Tidak Tersedia' }}
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
        <section id="two" class="banner">
            <div class="card"
                style="background-color: transparent; padding: 30px; border-radius: 15px; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                <h2 style="font-family: 'Georgia', serif; font-size: 2.5rem; color: #f0f0f0;">Mempelai</h2>
                <p
                    style="text-align: center; white-space: pre-line; font-family: 'Arial', sans-serif; font-size: 1rem; color: #cccccc; margin-bottom: 40px;">
                    {{ $undangan->wedding->kata_sambutan }}
                </p>
                <div style="display: flex; justify-content: center; gap: 50px;">
                    <div style="text-align: center;">
                        <div style="border-radius: 50%; overflow: hidden; width: 150px; height: 150px; margin: auto;">
                            <img src="{{ asset('storage/foto_pria/' . $undangan->wedding->foto_pria) }}"
                                alt="Foto Pria">
                        </div>
                        <h3 style="font-family: 'Georgia', serif; font-size: 1.8rem; color: #f0f0f0;">
                            {{ $undangan->wedding->np_pria }}</h3>
                        <p style="font-family: 'Arial', sans-serif; font-size: 1rem; color: #cccccc;">
                            {{ $undangan->wedding->nl_pria }}<br>Putra
                            dari<br><b>{{ $undangan->wedding->ayah_pria }}</b><br>&<br><b>
                                {{ $undangan->wedding->ibu_pria }}</b><br>{{ $undangan->wedding->alamat_org_tua_mp }}
                        </p>
                    </div>
                    <div style="text-align: center;">
                        <div style="border-radius: 50%; overflow: hidden; width: 150px; height: 150px; margin: auto;">
                            <img src="{{ asset('storage/foto_wanita/' . $undangan->wedding->foto_wanita) }}"
                                alt="Foto Wanita">
                        </div>
                        <h3 style="font-family: 'Georgia', serif; font-size: 1.8rem; color: #f0f0f0;">
                            {{ $undangan->wedding->np_wanita }}</h3>
                        <p style="font-family: 'Arial', sans-serif; font-size: 1rem; color: #cccccc;">
                            {{ $undangan->wedding->nl_wanita }}<br>Putri
                            dari<br><b>{{ $undangan->wedding->ayah_wanita }}</b><br>&<br><b>{{ $undangan->wedding->ibu_wanita }}</b><br>{{ $undangan->wedding->alamat_org_tua_mw }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="three" class="banner">
            <div class="card"
                style="background-color: rgba(255, 255, 255, 0.7); padding: 10px; border-radius: 20px; text-align: center; width: 1000px; margin-top:0px; height: 550px;">
                <h2 style="font-size: 36px; color: #4a4a4a; margin-bottom: 30px;">Detail Acara</h2>
                <div style="display: flex; justify-content: space-around; gap: 20px;">
                    <!-- Acara 1 -->
                    <div class="card"
                        style="background-color: #f7f7f7; padding: 20px; border-radius: 20px; width: 45%; height: 450px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 style="font-size: 24px; color: #4a4a4a;">Acara 1</h3>
                        <p style="color: #7a7a7a;">Minggu, 17 April 2022</p>
                        <p style="color: #7a7a7a;">10:00 - 12:00 WIB</p>
                        <h4 style="font-size: 18px; color: #4a4a4a;">Gedung Acara 1</h4>
                        <p style="color: #7a7a7a;">Jalan Alamat Gedung Acara 1</p>
                        <!-- Map for Acara 1 -->
                        <div style="margin: 20px;">
                            <div id="map1" style="width: 100%; height: 250px; border-radius: 10px;"></div>
                        </div>
                        <button
                            style="background-color: #4a4a4a; color: white; padding: 10px 20px; border-radius: 10px; border: none; margin-top: -15%;">Buka
                            Map</button>
                    </div>

                    <!-- Acara 2 -->
                    <div class="card"
                        style="background-color: #f7f7f7; padding: 20px; border-radius: 20px; width: 45%; height: 450px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <h3 style="font-size: 24px; color: #4a4a4a;">Acara 1</h3>
                        <p style="color: #7a7a7a;">Minggu, 17 April 2022</p>
                        <p style="color: #7a7a7a;">10:00 - 12:00 WIB</p>
                        <h4 style="font-size: 18px; color: #4a4a4a;">Gedung Acara 1</h4>
                        <p style="color: #7a7a7a;">Jalan Alamat Gedung Acara 1</p>
                        <!-- Map for Acara 1 -->
                        <div style="margin: 20px;">
                            <div id="map2" style="width: 100%; height: 250px; border-radius: 10px;"></div>
                        </div>
                        <button
                            style="background-color: #4a4a4a; color: white; padding: 10px 20px; border-radius: 10px; border: none; margin-top: -15%;">Buka
                            Map</button>
                    </div>

                </div>
            </div>
        </section>

        <section id="four" class="banner">
            <div class="card" style="/* similar styles */">
                <!-- Content for Section Four -->
                <!-- You can copy the previous card's content or modify it as needed -->
            </div>
        </section>
    </div>
    <div class="navigation-buttons">
        <button class="nav-button" onclick="scrollToSection('one')"><i class="fa-solid fa-home"></i></button>
        <button class="nav-button" onclick="scrollToSection('two')"><i class="fa-solid fa-user"></i></button>
        <button class="nav-button" onclick="scrollToSection('three')"><i class="fa-solid fa-calendar"></i></button>
        <button class="nav-button" onclick="scrollToSection('four')"><i class="fa-solid fa-envelope"></i></button>
    </div>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialize map for Acara 1
        const map1 = L.map('map1').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map1);
        L.marker([51.5, -0.09]).addTo(map1);
        L.circle([51.508, -0.11], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map1);
        L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(map1);

        // Initialize map for Acara 2
        const map2 = L.map('map2').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map2);
        L.marker([51.5, -0.09]).addTo(map2);
        L.circle([51.508, -0.11], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map2);
        L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(map2);
    </script>
    <script>
        var audio = document.getElementById('background-audio');
        var icon = document.getElementById('audio-icon');
        var isPlaying = false;
        var autoScrollInterval;
        var isAutoScrolling = false;
        var scrollIcon = document.getElementById('scroll-icon');

        function toggleAudio() {
            if (isPlaying) {
                audio.pause();
                icon.classList.remove('fa-pause');
                icon.classList.add('fa-play');
            } else {
                audio.play();
                icon.classList.remove('fa-play');
                icon.classList.add('fa-pause');
            }
            isPlaying = !isPlaying;
        }

        function scrollToSection(sectionId) {
            var section = document.getElementById(sectionId);
            section.scrollIntoView({
                behavior: 'smooth'
            });
            updateActiveButton(sectionId);
        }

        function updateActiveButton(sectionId) {
            var buttons = document.querySelectorAll('.nav-button');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });
            var activeButton = document.querySelector('button[onclick="scrollToSection(\'' + sectionId + '\')"]');
            activeButton.classList.add('active');
        }


        var countDownDate = new Date("{!! \Carbon\Carbon::parse($undangan->wedding->countdown)->format('Y-m-d\TH:i:s') !!}").getTime();

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
</body>

</html>
