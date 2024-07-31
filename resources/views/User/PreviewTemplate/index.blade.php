<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('CSS/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" />
    @include('User.PreviewTemplate.font')
    <title>Document</title>
    <style>
        html,
        body {
            overflow-x: hidden;
        }

        body .container {
            background-color: rgba(0, 0, 0, 0.6);
            /* Mengubah latar belakang menjadi sedikit gelap */
        }

        .formatted-text {
            color: white;
            margin-top: 20px;
            word-wrap: break-word;
            font-size: 20px;
            /* Memastikan kata panjang dibungkus */
        }

        .logo-text {
            font-family: 'Cursive', sans-serif;
            /* Ganti dengan font yang diinginkan */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Tambahkan bayangan untuk efek logo */
            letter-spacing: 5px;
            /* Jarak antar huruf */
        }

        .vertical-text {
            display: flex;
            flex-direction: row;
            /* Mengatur arah flex menjadi horizontal */
            gap: 10px;
            /* Menambahkan jarak antara elemen */
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

        .days {
            color: #333;
            border-radius: 8px;
            background: white;
            padding: 20px;

        }

        .hours {
            color: #333;
            border-radius: 8px;
            background: white;
            padding: 20px;

        }

        .minute {
            color: #333;
            border-radius: 8px;
            background: white;
            padding: 20px;

        }

        .seconds {
            color: #333;
            border-radius: 8px;
            background: white;
            padding: 20px;
        }

        .days,
        .hours,
        .minute,
        .seconds {
            font-weight: bold;
            /* Menebalkan angka */
        }

        .save-tanggal {
            color: #b3b3b3;
            font-size: 20px;
        }

        .teks-acara {
            text-transform: uppercase;
        }


        /* Tambahkan efek daun maple */
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
            /* Ganti warna menjadi orange */
            font-size: 1px;
            opacity: 0.5;
            pointer-events: none;
            animation: fall linear infinite 2s;
            /* Durasi animasi diubah menjadi 2 detik */
        }

        .three {
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.1),
        }

        /* Tambahkan efek blur pada body */
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


        /* Tambahkan gaya untuk tombol buka undangan */
        #open-invitation {
            position: absolute;
            top: 50%;
            /* Pindahkan ke tengah vertikal */
            left: 50%;
            /* Pindahkan ke tengah horizontal */
            transform: translate(-50%, -50%);
            /* Pusatkan tombol */
            z-index: 10;
            filter: none;
            /* Pastikan tidak ada efek blur */
        }

        /* Tambahkan gaya untuk animasi slide */
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
    </style>
</head>

<body>
    <div class="container">
        {{-- SLIDE PERTAMA / OPENING --}}
        <section class="one banner">
            <div class="card"
                style="max-width: 900px; margin-top: -90px; background-color:transparent; padding: 20px; border-radius: 20px; height: 500px;">
                <br>
                <br>
                <h1 class="fade-in logo-text" style="font-size: 70px; text-align: center;color: white;">
                </h1>
                <!-- Card baru ditambahkan di sini -->
                <div class="wedding-card slide-up"
                    style="text-align: center; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px; padding: 20px; margin-top: 20px; position: relative; border: 2px solid rgba(255, 255, 255, 0.8); opacity: 0.9; color: #f0f0f0;">
                    <div class="judul slide-up">
                        <h2>{!! $tmp->opening->judul_acara ?? 'Judul Acara Tidak Tersedia' !!}</h2>
                    </div>
                    <br>

                    <div class="vertical-text" style=" justify-content: center; align-items: center;">
                        <h3 style=" margin: 0;" class="slide-up">{!! $tmp->undanganProfilWedding->nama_mempelai_pria ?? 'Nama Mempelai Pria Tidak Tersedia' !!}</h3>
                        <h3 style=" margin: 0;" class="slide-up">&</h3>
                        <h3 style=" margin: 0;" class="slide-up">{!! $tmp->undanganProfilWedding->nama_mempelai_wanita ?? 'Nama Mempelai Wanita Tidak Tersedia' !!}</h3>
                    </div>
                    <br><br><br>
                    <div class="hari-tgl">
                        <p class="slide-up">{!! $tmp->opening->tanggal_acara ?? 'Tanggal Acara Tidak Tersedia' !!}</p>
                    </div>
                    <br>
                    <div class="save-tanggal">
                        <h3 class="slide-up">- Save the Date -</h3>
                    </div>
                    <br>
                    <div class="countdown" id="countdown" style="display: flex; justify-content: center; gap: 10px;">
                        <div class="days" id="days" style="min-width: 80px;">00 Hari</div>
                        <div class="hours" id="hours" style="min-width: 80px;">00 Jam</div>
                        <div class="minute" id="minutes" style="min-width: 80px;">00 Menit</div>
                        <div class="seconds" id="seconds" style="min-width: 80px;">00 Detik</div>
                    </div>
                    <div id="countdown-message" style="display: none;">Acara Dimulai!</div>
                    <!-- Tambahkan elemen ini -->
                </div>

            </div>
        </section>
        {{-- END SLIDE PERTAMA / OPENING --}}
        <section class="two banner" style="min-height: 100vh; background-color: rgba(0, 0, 0, 0.1);">
            <div class="card"
                style="max-width: 800px; margin: auto; background-color: rgba(0, 0, 0, 0.0); padding: 20px; border-radius: 10px; text-align: center;">
                <h1 style="color: white;">Mempelai</h1>
                <br><br>
                <h1 class="formatted-text" style="color: white; margin-top: 20px;">{!! $tmp->undanganProfilWedding->salam_pembuka ?? 'data kosong' !!}</h1>
                <div style="display: flex; justify-content: space-around; margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 40px;">
                        <!-- Jarak diubah dari 20px menjadi 40px -->
                        <div>
                            <img src="{{ Storage::url($tmp->undanganProfilWedding->fm_pria ?? 'data kosong') }}"
                                alt="Butet"
                                style="border-radius: 50%; width: 150px; height: 150px; margin-bottom: 10px; border: 2px solid white;">
                            <h3 style="color: white; margin-top: 10px;">{!! $tmp->undanganProfilWedding->nama_mempelai_pria ?? 'data kosong' !!}</h3>
                            <p style="color: white; margin-top: 5px;">Putra dari Ayah {!! $tmp->undanganProfilWedding->nama_mempelai_pria ?? 'data kosong' !!}</p>

                        </div>
                        <div>
                            <img src="{{ Storage::url($tmp->undanganProfilWedding->fm_wanita ?? 'data kosong') }}"
                                alt="Butet"
                                style="border-radius: 50%; width: 150px; height: 150px; margin-bottom: 10px; border: 2px solid white;">
                            <h3 style="color: white; margin-top: 10px;">{!! $tmp->undanganProfilWedding->nama_mempelai_wanita ?? 'data kosong' !!}</h3>
                            <p style="color: white; margin-top: 5px;">Putri dari Ayah {!! $tmp->undanganProfilWedding->nama_mempelai_wanita ?? 'data kosong' !!}</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="three banner">
            <div class="event-details" style="text-align: center; color: white; padding: 20px;">
                <h2 class="detail-acara" style="margin-bottom: 20px;">Detail Acara</h2>
                <div class="event"
                    style="margin: 20px; padding: 20px; background-color: rgba(255, 255, 255, 0.2); border-radius: 10px; display: inline-block; width: 300px;">
                    <div class="teks-acara">
                        <h3 class="acara1" style="margin: 0;">{!! $tmp->detailWedding->acara1 ?? 'data kosong' !!}</h3>
                        <p class="acara2" style="margin: 5px 0;">{!! $tmp->detailWedding->hari_tanggal_acara1 ?? 'data kosong' !!}<br>{!! $tmp->detailWedding->jam_mulai_acara1 ?? 'data kosong' !!} -
                            {!! $tmp->detailWedding->jam_mulai_selesai1 ?? 'data kosong' !!} WIB</p>
                        <p class="acara 3" style="margin: 5px 0;">Gedung Acara 1<br>{!! $tmp->detailWedding->alamat_gedung_acara1 ?? 'data kosong' !!}</p>
                    </div>
                </div>
                <div class="event"
                    style="margin: 20px; padding: 20px; background-color: rgba(255, 255, 255, 0.2); border-radius: 10px; display: inline-block; width: 300px;">
                    <div class="teks-acara">

                        <h3 class="acara4" style="margin: 0;">{!! $tmp->detailWedding->acara2 ?? 'data kosong' !!}</h3>
                        <p style="margin: 5px 0;">{!! $tmp->detailWedding->hari_tanggal_acara2 ?? 'data kosong' !!}<br>{!! $tmp->detailWedding->jam_mulai_acara2 ?? 'data kosong' !!} -
                            {!! $tmp->detailWedding->jam_mulai_selesai2 ?? 'data kosong' !!}</p>
                        <p style="margin: 5px 0;">Gedung Acara 2<br>{!! $tmp->detailWedding->alamat_gedung_acara2 ?? 'data kosong' !!}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="four banner">
            <div class="photo-gallery" style="text-align: center; padding: 20px;">
                <h2 style="color: white;">Photo Gallery</h2>
                <br>
                <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 10px;">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($tmp->galeriWedding as $img)
                                <img src="{{ Storage::url($img->image_path ?? 'data kosong') }}" alt="Gallery Image"
                                    style="width: 200px; height: 200px; border-radius: 10px;">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="five banner">
            <div class="map-container" style="text-align: center; padding: 20px;">
                <h2 style="color: white;">Lokasi Acara</h2>
                <iframe
                    src="{{ $tmp->google_map_link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509123!2d144.9537353153164!3d-37.81627997975157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11f1b3%3A0x5045675218ceed30!2sMelbourne%20Australia!5e0!3m2!1sen!2sus!4v1616161616161!5m2!1sen!2sus' }}"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
    </div>
    <!-- Audio element -->
    <audio id="background-audio" src="{{ asset('' . $tmp->audio_undangan) }}" type="audio/mpeg" loop></audio>
    <!-- Control button -->
    <button class="control-button" onclick="toggleAudio()">
        <i id="audio-icon" class="fa-solid fa-play"></i>
    </button>
    <!-- Navigation buttons -->
    <div class="navigation-buttons"
        style="display: flex; justify-content: center; background-color: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 10px;">
        <button class="nav-button" onclick="scrollToSection('one')"><i class="fa-solid fa-home"></i></button>
        <button class="nav-button" onclick="scrollToSection('two')"><i class="fa-solid fa-users"></i></button>
        <button class="nav-button" onclick="scrollToSection('three')"><i class="fa-solid fa-calendar"></i></button>
        <button class="nav-button" onclick="scrollToSection('four')"><i class="fa-solid fa-image"></i></button>
        <button class="nav-button" onclick="scrollToSection('five')"><i class="fa-solid fa-map"></i></button>
        <!-- Button untuk mengontrol scroll otomatis -->
        {{-- <button class="nav-button" onclick="toggleAutoScroll()"><i id="scroll-icon"
                class="fa-solid fa-play"></i></button> --}}
    </div>
    <script>
        var audio = document.getElementById('background-audio');
        var icon = document.getElementById('audio-icon');
        var isPlaying = false;
        var autoScrollInterval;
        var isAutoScrolling = false;
        var scrollIcon = document.getElementById('scroll-icon');
        // Debugging log
        console.log('Audio URL:', audio.src);
        audio.addEventListener('error', function(event) {
            console.error('Error loading audio:', event);
        });

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

        function scrollToSection(sectionClass) {
            var section = document.querySelector('.' + sectionClass);
            section.scrollIntoView({
                behavior: 'smooth'
            });
            // Tambahkan animasi pada tombol navigasi
            updateActiveButton(sectionClass);
        }

        function updateActiveButton(sectionClass) {
            var buttons = document.querySelectorAll('.nav-button');
            buttons.forEach(function(button) {
                button.classList.remove('active');
            });
            var activeButton = document.querySelector('button[onclick="scrollToSection(\'' + sectionClass + '\')"]');
            activeButton.classList.add('active');
        }
        // Tambahkan event listener untuk scroll
        window.addEventListener('scroll', function() {
            var sections = document.querySelectorAll('section');
            var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

            sections.forEach(function(section) {
                if (scrollPosition >= section.offsetTop - section.offsetHeight / 2 &&
                    scrollPosition < section.offsetTop + section.offsetHeight / 2) {
                    var sectionClass = section.className;
                    updateActiveButton(sectionClass);
                }
            });
        });

        function toggleAutoScroll() {
            if (isAutoScrolling) {
                clearInterval(autoScrollInterval);
                scrollIcon.classList.remove('fa-pause');
                scrollIcon.classList.add('fa-play');
            } else {
                autoScrollInterval = setInterval(function() {
                    window.scrollBy({
                        top: window.innerHeight,
                        behavior: 'smooth'
                    });
                }, 3000); // Scroll setiap 3 detik
                scrollIcon.classList.remove('fa-play');
                scrollIcon.classList.add('fa-pause');
            }
            isAutoScrolling = !isAutoScrolling;
        }
    </script>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{!! $tmp->detailWedding->first()->hari_tanggal_acara1 ?? '2023-01-01' !!} ??").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Check if the countdown is over
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown-message").style.display = "block"; // Tampilkan pesan
                // Set countdown to 0 0 0 0
                days = 0;
                hours = 0;
                minutes = 0;
                seconds = 0;
            }

            // Display the result in the elements
            document.getElementById("days").innerHTML = days + " Hari";
            document.getElementById("hours").innerHTML = hours + " Jam";
            document.getElementById("minutes").innerHTML = minutes + " Menit";
            document.getElementById("seconds").innerHTML = seconds + " Detik";
        }, 1000);
    </script>
    <style>
        .nav-button {
            transition: transform 0.3s ease;
            background-color: rgba(255, 255, 255, 0.7);
            /* Warna latar belakang tombol dengan transparansi */
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
    </style>
    <style>
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
    </style>

    <style>
        .banner {
            position: relative;
            min-height: 100vh;
            /* Minimum height to cover the full viewport height */
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

            /* Menggunakan cover untuk semua section */
            background-image: url('{{ asset('storage/' . ($tmp->cover1 ?? ($tmp->cover2 ?? ($tmp->cover3 ?? ($tmp->cover4 ?? $tmp->cover5))))) }}');
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
                transform: scale(1)
            }

            100% {
                transform: scale(1.5)
            }
        }
    </style>

    <script>
        // Fungsi untuk membuat daun maple
        function createMapleLeaves() {
            const leafCount = 1; // Jumlah daun maple diubah menjadi 1
            const leafContainer = document.body;

            for (let i = 0; i < leafCount; i++) {
                const leaf = document.createElement('div');
                leaf.className = 'maple-leaf';
                leaf.innerHTML = '🍁'; // Simbol daun maple
                leaf.style.left = Math.random() * 100 + 'vw'; // Posisi horizontal acak
                leaf.style.animationDuration = Math.random() * 5 + 5 +
                    's'; // Durasi acak diubah menjadi antara 10-20 detik
                leaf.style.fontSize = Math.random() * 2 + 1 + 'em'; // Ukuran acak
                leafContainer.appendChild(leaf);

                // Hapus daun setelah animasi selesai
                leaf.addEventListener('animationend', () => {
                    leaf.remove();
                });
            }
        }

        // Buat daun maple setiap 500ms
        setInterval(createMapleLeaves, 5000);
    </script>
</body>

</html>
