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
@if (optional($undangan->wedding)->countdown)
    var countDownDate = new Date("{!! \Carbon\Carbon::parse($undangan->wedding->countdown)->format('Y-m-d\TH:i:s') !!}").getTime();
@else
    var countDownDate = null; // Jika tidak ada countdown, set ke null
@endif

// Hanya jalankan interval countdown jika countDownDate valid
if (countDownDate) {
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
} else {
    // Jika countdown tidak valid, tampilkan pesan alternatif
    document.getElementById("countdown").innerHTML = "Tanggal countdown tidak tersedia.";
}
</script>
<script>
function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({
            behavior: 'smooth'
        });
    }
}
// Get the audio element and icon
var audio = document.getElementById('background-audio');
var icon = document.getElementById('audio-icon');
var isPlaying = false;

// Function to toggle audio playback
function toggleAudio() {
    if (isPlaying) {
        // Pause the audio
        audio.pause();
        // Change icon to play
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
    } else {
        // Play the audio
        audio.play().catch(function(error) {
            console.error('Error playing audio:', error);
            // Handle playback error (e.g., due to user interaction restrictions)
        });
        // Change icon to pause
        icon.classList.remove('fa-play');
        icon.classList.add('fa-pause');
    }
    // Toggle the playing state
    isPlaying = !isPlaying;
}

// Optional: Add event listeners to handle audio events
audio.addEventListener('ended', function() {
    // When audio ends, reset icon and playing state
    icon.classList.remove('fa-pause');
    icon.classList.add('fa-play');
    isPlaying = false;
});
</script>
