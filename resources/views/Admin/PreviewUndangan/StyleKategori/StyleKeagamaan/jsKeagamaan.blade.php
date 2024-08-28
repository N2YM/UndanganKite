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
