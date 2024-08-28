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
</head>

<body class="no-scroll">
    <div class="outer-container">
        <div class="container">
            <div class="content">
                <section id="opening" class="section background1">
                    <div class="card1"
                        style="background-color: transparent; box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); border-radius: 2%;">
                        <div class="card-body">
                            <div class="header">
                                <h1 class="birthday-title"
                                    style="
                                    font-size: 40px; 
                                    font-family: 'Playfair Display', serif; 
                                    color: #ffffff; 
                                    letter-spacing: 2px; 
                                    text-transform: uppercase;
                                    text-align: center;
                                    margin-top: 20px;">
                                    Happy Birthday
                                </h1>
                                <br>
                                @if (isset($undangan->ulangTahun) && isset($undangan->ulangTahun->foto_ultah))
                                    <div class="image-container">
                                        <img src="{{ asset('storage/foto_ultah/' . $undangan->ulangTahun->foto_ultah) }}"
                                            alt="Foto Ulang Tahun" class="header-img birthday-img">
                                    </div>
                                @else
                                    <div class="image-container">
                                        <img src="{{ asset('default-image-path.jpg') }}" alt="Default Image"
                                            class="header-img birthday-img">
                                    </div>
                                @endif

                                <h1 style="font-size: 30px; color: #ddd;">
                                    {{ $undangan->ulangTahun->nama_panggilan_ultah ?? '' }}</h1>

                                <h2 style="color: #ddd;">Ulang Tahun
                                    ke:{{ $undangan->ulangTahun->ulang_tahun_yang_ke ?? '' }}</h2>
                            </div>
                        </div>
                    </div>
                    <button id="fullscreenBtn" class="fullscreen-btn"><i class="far fa-paper-plane"></i> Buka
                        Undangan</button>
                </section>

                <section id="acara" class="section">
                    <div class="card2" style=" box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);">
                        <div class="card-body">
                            <div class="details">
                                <p class="birthday-title"
                                    style="color: rgb(255, 255, 255); margin-top: -1%; font-size: 38px">WELCOME TO
                                </p>
                                <p class="birthday-title"style="font-size: 50px;">
                                    {{ $undangan->ulangTahun->ulang_tahun_yang_ke ?? '' }}ST</p>
                                <p class="birthday-title" style="font-size: 30px;">
                                    {{ $undangan->ulangTahun->nama_lengkap_ultah ?? 'Nama kosong' }}</p>
                                <p class="birthday-title" style="font-size: 15px;margin-top: 1% ">
                                    {{ $undangan->ulangTahun->hari_tanggal_ultah ?? 'Nama kosong' }}</p>
                                <p class="birthday-title" style="font-size: 15px;margin-top: 4%;">
                                    {{ $undangan->ulangTahun->jam_mulai_ultah ?? 'Nama kosong' }} -
                                    {{ $undangan->ulangTahun->jam_selesai_ultah ?? 'Nama kosong' }}</p>
                                <p class="birthday-title" style="font-size: 18px; margin-top: 5%;">Lokasi Acara:</p>
                                <p style="color: #ffffff">
                                    {{ $undangan->ulangTahun->lokasi_acara_ultah ?? 'Nama kosong' }}
                                </p>
                                <div class="countdown">
                                    <div><span id="days">150</span> Hari</div>
                                    <div><span id="hours">23</span> Jam</div>
                                    <div><span id="minutes">44</span> Menit</div>
                                    <div><span id="seconds">25</span> Detik</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="maps" class="section">
                    <div class="card4"style=" box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                        <div class="card-body">
                            <h1 class="birthday-title"
                                style="color: rgb(255, 255, 255); margin-top: 3%; font-size: 30px">
                                LOKASI ACARA</h1>
                            <div id="map1"
                                style="width: 100%; height: 250px; border-radius: 10px; margin-top: 5%;"></div>
                        </div>
                        <a href="{{ $undangan->ulangTahun->link_map ?? '' }}" target="_blank">
                            <button class="btnMap">Petunjuk ke Lokasi</button>
                        </a>

                    </div>
                </section>
                <section id="rsvp" class="section">
                    <div class="card5"style=" box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);">
                        <div class="card-body">
                            <div
                                style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 300px;">
                                <h1 class="birthday-title"
                                    style="color: rgb(255, 255, 255); font-size: 28px; margin-top: -25%; text-transform: none;">
                                    <strong>Tanda Kasih</strong>
                                </h1>
                                <div style="color: #ddd; text-align: left; font-size: 16px;">
                                    <p style="margin: 0; text-align: center; margin-top: 4%">Terimakasih telah
                                        menambahkan semangat
                                        <br> kegembiraan ulang tahun atas kehadirannya. Namun jika anda ingin memberi
                                        hadiah kami<br>
                                    </p>
                                    <h2
                                        style="color: #ddd; text-align: center; font-size: 16px; margin: 0; padding: 0;">
                                        sediakan fitur ini.</h2>
                                </div>
                            </div>
                            <div class="row"
                                style="margin-top: -35%; display: flex; justify-content: center; gap: 120px;">
                                <button class="btnMap" onclick="showContent('hadiah')">Hadiah</button>
                                <button class="btnMap" onclick="showContent('kado')">Kado</button>
                            </div>
                            <!-- Konten yang akan ditampilkan saat tombol diklik -->
                            <div id="hadiah" class="content"
                                style="display: none; color: white; text-align: center; margin-top: 20px;">
                                <p><strong>Nomor Rekening:</strong>{{ $undangan->ulangTahun->nomor_rek_ultah ?? '' }}
                                </p>
                                <img src="link-gambar-rekening.jpg" alt="Foto Rekening"
                                    style="width: 200px; height: auto;">
                            </div>

                            <div id="kado" class="content"
                                style="display: none; color: white; text-align: center; margin-top: 20px;">
                                <p><strong>Alamat:</strong>
                                    {{ $undangan->ulangTahun->lokasi_acara_ultah ?? 'Nama kosong' }}</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="gift" class="section">
                    <div class="card6">
                        <div class="card-body" style="text-align: center; color: #ffffff; font-size: 18px;">
                            <p>{{ $undangan->ulangTahun->ucapan_terima_kasih_ultah ?? 'Nama kosong' }}</p>

                            <!-- Jarak antara teks sebelumnya dengan "Hormat Kami" -->
                            <p style="margin-top: 25px; font-size: 20px; font-style: italic;">Hormat Kami</p>
                            <!-- Jarak antara "Hormat Kami" dengan nama -->
                            <p style="font-size: 28px; margin-top: 10px;">
                                {{ $undangan->ulangTahun->nama_lengkap_ultah ?? 'Nama kosong' }}</p>
                        </div>
                    </div>
                </section>
                <section id="galeri" class="section">
                    <div class="card7">
                        <div class="card-body" style="text-align: center; color: #ffffff; font-size: 18px;">
                            <h2 style="margin-bottom: 20px;">Galeri</h2>
                            <div class="gallery-container">
                                @php
                                    // Pastikan undangan->ulangTahun tidak null sebelum mengakses galeri_ultah
                                    $galleryImages = [];
                                    if ($undangan->ulangTahun) {
                                        $galleryData = $undangan->ulangTahun->galeri_ultah;

                                        // Decode JSON menjadi array jika data berupa string JSON
                                        if (!empty($galleryData)) {
                                            if (is_string($galleryData)) {
                                                $galleryImages = json_decode($galleryData, true);
                                            } elseif (is_array($galleryData)) {
                                                $galleryImages = $galleryData;
                                            }
                                        }

                                        // Filter elemen kosong dari array
                                        $galleryImages = array_filter($galleryImages, function ($item) {
                                            return !empty($item); // Hapus elemen kosong
                                        });
                                    }
                                @endphp

                                <!-- Looping through gallery images -->
                                @if (count($galleryImages) > 0)
                                    @foreach ($galleryImages as $image)
                                        <div class="gallery-item">
                                            <img src="{{ asset('storage/gallery_ultah/' . $image) }}"
                                                alt="Gallery Image">
                                        </div>
                                    @endforeach
                                @else
                                    <p>No images available.</p>
                                @endif
                            </div>
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
            <div class="navigation hidden ">
                <a href="#opening"><i class=" fa fa-home"></i> </a>
                <a href="#acara"><i class="fa fa-calendar"></i></a>
                <a href="#maps"><i class=" fa fa-map-marker-alt"></i></a>
                <a href="#rsvp"><i class="fa fa-gifts"></i></a>
                <a href="#galeri"><i class="fa fa-image"></i></a>
                <a href="#gift"><i class="fa fa-check-square"></i></a>
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
        margin-top: -20%;

    }

    .card2 {
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
        width: 100%;
        max-width: 480px;
        background-color: #3E4A61;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    .navigation a {
        color: white;
        text-decoration: none;
        font-size: 1.2rem;
        padding: 12px 20px;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.3s ease;
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
        // Mengambil data countdown dari kolom countdown_ultah
        const countdownUltah = "{{ $undangan->ulangTahun->countdown_ultah ?? '' }}";

        // Memeriksa jika countdownUltah kosong atau tidak valid
        if (!countdownUltah || isNaN(Date.parse(countdownUltah))) {
            document.getElementById('countdown').innerHTML = '<p>Countdown data tidak tersedia.</p>';
            return;
        }

        const targetDate = new Date(countdownUltah).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                // Jika countdown selesai, tampilkan pesan
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
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil data latitude dan longitude
        var ultahLat = {{ $undangan->ulangTahun->latitude_ultah ?? 'null' }};
        var ultahLng = {{ $undangan->ulangTahun->longitude_ultah ?? 'null' }};

        // Periksa jika data latitude dan longitude valid
        if (ultahLat !== null && ultahLng !== null && !isNaN(ultahLat) && !isNaN(ultahLng)) {
            // Inisialisasi peta hanya jika data valid
            const map1 = L.map('map1').setView([ultahLat, ultahLng], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map1);

            L.marker([ultahLat, ultahLng]).addTo(map1);

            L.circle([ultahLat, ultahLng], {
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
