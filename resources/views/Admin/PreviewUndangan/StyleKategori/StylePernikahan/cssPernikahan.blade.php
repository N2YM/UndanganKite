<style>
    html,
    body {
        overflow: hidden;
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