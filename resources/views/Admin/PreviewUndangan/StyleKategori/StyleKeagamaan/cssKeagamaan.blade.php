<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
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
