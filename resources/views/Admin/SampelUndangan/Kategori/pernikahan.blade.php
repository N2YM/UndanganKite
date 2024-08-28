@extends('Template.Admin.base')
@section('content')
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    {{-- Serif Elegan, FONT Playfair Display  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Elegan, FONT Merriweather --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Elegan, FONT Georgia --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@100..900&display=swap" rel="stylesheet">
    {{-- Script, FONT Great Vibes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&display=swap"
        rel="stylesheet">
    {{-- Script, FONT Dancing Script --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&display=swap"
        rel="stylesheet">
    {{-- Script, FONT Alex Brush --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Playful, FONT Comic Sans MS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Playful, FONT Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Playful, FONT Quicksand --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- Handwritten, FONT Pacifico --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- Handwritten, FONT Chewy --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Modern, FONT Montserrat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Modern, FONT Lato --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Modern, FONT Raleway --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- Serif, FONT Bebas Neue --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- Serif, FONT Roboto Slab --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Traditional, FONT Luxurius Roman --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Traditional, FONT Garamond --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Sans Serif Simpel, FONT Open Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Elegant, FONT Cinzel --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Cinzel:wght@400..900&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Serif Elegant, FONT Libre Baskerville --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Cinzel:wght@400..900&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    {{-- Script Halus, FONT Satisfy --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Cinzel:wght@400..900&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap"
        rel="stylesheet">
    {{-- Script Halus, FONT Italiana --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Bebas+Neue&family=Chewy&family=Cinzel:wght@400..900&family=Comic+Neue:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Dancing+Script:wght@400..700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Great+Vibes&family=Italiana&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Luxurious+Roman&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+Georgian:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Satisfy&display=swap"
        rel="stylesheet">

    <style>
        .font-playfair-display {
            font-family: 'Playfair Display', serif;
        }

        .font-merriweather {
            font-family: 'Merriweather', serif;
        }

        .font-georgia {
            font-family: 'Georgia', serif;
        }

        .font-great-vibes {
            font-family: 'Great Vibes', cursive;
        }

        .font-dancing-script {
            font-family: 'Dancing Script', cursive;
        }

        .font-alex-brush {
            font-family: 'Alex Brush', cursive;
        }

        .font-comic-sans-ms {
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }

        .font-quicksand {
            font-family: 'Quicksand', sans-serif;
        }

        .font-pacifico {
            font-family: 'Pacifico', cursive;
        }

        .font-chewy {
            font-family: 'Chewy', cursive;
        }

        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .font-lato {
            font-family: 'Lato', sans-serif;
        }

        .font-raleway {
            font-family: 'Raleway', sans-serif;
        }

        .font-bebas-neue {
            font-family: 'Bebas Neue', sans-serif;
        }

        .font-roboto-slab {
            font-family: 'Roboto Slab', serif;
        }

        .font-times-new-roman {
            font-family: 'Times New Roman', serif;
        }

        .font-garamond {
            font-family: 'Garamond', serif;
        }

        .font-open-sans {
            font-family: 'Open Sans', sans-serif;
        }

        .font-arial {
            font-family: 'Arial', sans-serif;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .font-libre-baskerville {
            font-family: 'Libre Baskerville', serif;
        }

        .font-satisfy {
            font-family: 'Satisfy', cursive;
        }

        .font-italiana {
            font-family: 'Italiana', cursive;
        }

        .preview-text {
            margin-top: 10px;
            font-size: 18px;
        }

        .font-arial {
            font-family: 'Arial', sans-serif;
        }

        .font-georgia {
            font-family: 'Georgia', serif;
        }

        .font-courier {
            font-family: 'Courier New', monospace;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            flex: 0 0 150px;
            margin-right: 5px;
        }

        .form-group .form-control,
        .form-group .preview-text {
            flex: 1;
            margin-right: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
        }

        .preview-text {
            border: 1px solid #ced4da;
            padding: 4px;
            background-color: #f8f9fa;
            max-height: 100px;
            overflow-y: auto;
            overflow-x: hidden;
            margin-top: 0;
            font-size: 0.830rem;
            color: #777;
        }

        .nav-tabs .nav-item.hidden {
            display: none;
        }

        .form-group .middle-text {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 10%;
            padding-right: 11%;
        }

        .map {
            height: 140px;
            width: 100%;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;

        }

        .map-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50%;
        }

        .center {
            display: block;
            margin: 1rem 0;
        }

        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .img-wrapper {
            position: relative;
            display: inline-block;
        }

        .gallery-preview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 2px 5px;
        }

        #error-message {
            font-size: 14px;
        }
    </style>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('sampel-undangan') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
                <div class="ibox mt-2">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit/Isi Data Undangan Pernikahan</div>
                    </div>
                    <div class="ibox-body ">
                        <ul class="nav nav-tabs tabs-line mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pengaturan" data-toggle="tab"><i
                                        class="fa fa-cogs"></i>
                                    Pengaturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pengantin" data-toggle="tab"><i class="fa fa-heart"></i>
                                    Pengantin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#orangTua" data-toggle="tab"><i class="fa fa-users"></i>
                                    Orang Tua Pengantin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#waktuTempat "data-toggle="tab"><i class="fa fa-map"></i>
                                    Waktu & Tempat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#cerita" data-toggle="tab"><i class="fa fa-signature"></i>
                                    Cerita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#galeri" data-toggle="tab"><i class="fa fa-image"></i>
                                    Galeri</a>
                            </li>
                        </ul>
                        <form
                            action="{{ route('admin-update-undangan-form', ['id' => $sampel->id, 'kategori_id' => $kategori->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="tab-content" id="form-pernikahan">
                                <!-- Tab Pengaturan -->
                                <div class="tab-pane fade show active" id="pengaturan">
                                    <div class="form-group">
                                        <label for="fontSelect">Pilih Jenis Font</label>
                                        <select class="form-control" id="fontSelect" onchange="changeFont()"
                                            name="font">
                                            <option value="font-arial"
                                                {{ isset($sampel->font) && $sampel->font == 'font-arial' ? 'selected' : '' }}>
                                                Arial</option>
                                            <option value="font-playfair-display"
                                                {{ isset($sampel->font) && $sampel->font == 'font-playfair-display' ? 'selected' : '' }}>
                                                Playfair Display</option>
                                            <option value="font-merriweather"
                                                {{ isset($sampel->font) && $sampel->font == 'font-merriweather' ? 'selected' : '' }}>
                                                Merriweather</option>
                                            <option value="font-georgia"
                                                {{ isset($sampel->font) && $sampel->font == 'font-georgia' ? 'selected' : '' }}>
                                                Georgia</option>
                                            <option value="font-great-vibes"
                                                {{ isset($sampel->font) && $sampel->font == 'font-great-vibes' ? 'selected' : '' }}>
                                                Great Vibes</option>
                                            <option value="font-dancing-script"
                                                {{ isset($sampel->font) && $sampel->font == 'font-dancing-script' ? 'selected' : '' }}>
                                                Dancing Script</option>
                                            <option value="font-alex-brush"
                                                {{ isset($sampel->font) && $sampel->font == 'font-alex-brush' ? 'selected' : '' }}>
                                                Alex Brush</option>
                                            <option value="font-comic-sans-ms"
                                                {{ isset($sampel->font) && $sampel->font == 'font-comic-sans-ms' ? 'selected' : '' }}>
                                                Comic Sans MS</option>
                                            <option value="font-poppins"
                                                {{ isset($sampel->font) && $sampel->font == 'font-poppins' ? 'selected' : '' }}>
                                                Poppins</option>
                                            <option value="font-quicksand"
                                                {{ isset($sampel->font) && $sampel->font == 'font-quicksand' ? 'selected' : '' }}>
                                                Quicksand</option>
                                            <option value="font-pacifico"
                                                {{ isset($sampel->font) && $sampel->font == 'font-pacifico' ? 'selected' : '' }}>
                                                Pacifico</option>
                                            <option value="font-chewy"
                                                {{ isset($sampel->font) && $sampel->font == 'font-chewy' ? 'selected' : '' }}>
                                                Chewy</option>
                                            <option value="font-montserrat"
                                                {{ isset($sampel->font) && $sampel->font == 'font-montserrat' ? 'selected' : '' }}>
                                                Montserrat</option>
                                            <option value="font-lato"
                                                {{ isset($sampel->font) && $sampel->font == 'font-lato' ? 'selected' : '' }}>
                                                Lato</option>
                                            <option value="font-raleway"
                                                {{ isset($sampel->font) && $sampel->font == 'font-raleway' ? 'selected' : '' }}>
                                                Raleway</option>
                                            <option value="font-bebas-neue"
                                                {{ isset($sampel->font) && $sampel->font == 'font-bebas-neue' ? 'selected' : '' }}>
                                                Bebas Neue</option>
                                            <option value="font-roboto-slab"
                                                {{ isset($sampel->font) && $sampel->font == 'font-roboto-slab' ? 'selected' : '' }}>
                                                Roboto Slab</option>
                                            <option value="font-times-new-roman"
                                                {{ isset($sampel->font) && $sampel->font == 'font-times-new-roman' ? 'selected' : '' }}>
                                                Times New Roman</option>
                                            <option value="font-garamond"
                                                {{ isset($sampel->font) && $sampel->font == 'font-garamond' ? 'selected' : '' }}>
                                                Garamond</option>
                                            <option value="font-open-sans"
                                                {{ isset($sampel->font) && $sampel->font == 'font-open-sans' ? 'selected' : '' }}>
                                                Open Sans</option>
                                            <option value="font-cinzel"
                                                {{ isset($sampel->font) && $sampel->font == 'font-cinzel' ? 'selected' : '' }}>
                                                Cinzel</option>
                                            <option value="font-libre-baskerville"
                                                {{ isset($sampel->font) && $sampel->font == 'font-libre-baskerville' ? 'selected' : '' }}>
                                                Libre Baskerville</option>
                                            <option value="font-satisfy"
                                                {{ isset($sampel->font) && $sampel->font == 'font-satisfy' ? 'selected' : '' }}>
                                                Satisfy</option>
                                            <option value="font-italiana"
                                                {{ isset($sampel->font) && $sampel->font == 'font-italiana' ? 'selected' : '' }}>
                                                Italiana</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSambutan">Judul Acara</label>
                                        <input type="text" class="form-control previewable" id="judulAcara"
                                            name="judul_acara" value="{{ $sampel->Wedding->judul_acara ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Kata Judul Acara</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSambutan">Kata Sambutan</label>
                                        <textarea name="kata_sambutan" id="" cols="30" rows="2">{{ $sampel->Wedding->kata_sambutan ?? ' ' }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="countDown">Count Down</label>
                                        <input type="date" class="form-control previewable" id="countDown"
                                            name="countdown" value="{{ $sampel->Wedding->countdown ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Count Down</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="pengantin">
                                    <strong class="center" style="font-size: 18px">Pengantin</strong>
                                    <div class="form-group">
                                        <label for="namaPengantin">Nama Panggilan Pria</label>
                                        <input type="text" class="form-control previewable" name="np_pria"
                                            value="{{ $sampel->Wedding->np_pria ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Pengantin Pria</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengantinPria">Nama Panggilan Wanita</label>
                                        <input type="text" class="form-control previewable" id="np_wanita"
                                            name="np_wanita" value="{{ $sampel->Wedding->np_wanita ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Nama Pengantin Wanita</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengantinPria">Nama Lengkap Pria</label>
                                        <input type="text" class="form-control" id="nl_pria"
                                            name="nl_pria"value="{{ $sampel->Wedding->nl_pria ?? ' ' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengantinPria">Nama Lengkap Wanita</label>
                                        <input type="text" class="form-control " id="nl_wanita" name="nl_wanita"
                                            value="{{ $sampel->Wedding->nl_wanita ?? ' ' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengantinPria">Inisial Nama Pria</label>
                                        <input type="text" class="form-control previewable uppercase"
                                            name="inisial_pria"value="{{ $sampel->Wedding->inisial_pria ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Inisial Nama Pengantin Pria</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengantinWanita">Inisial Nama Wanita</label>
                                        <input type="text" class="form-control previewable uppercase"
                                            name="inisial_wanita" value="{{ $sampel->Wedding->inisial_wanita ?? ' ' }}">
                                        <div class="preview-text">Pratinjau Inisial Nama Pengantin Wanita</div>
                                    </div>
                                    <div class="row" style="padding: 0%">
                                        <div class="form-group col-md-6">
                                            <label>Foto Pria</label>
                                            <input type="file" class="form-control" name="foto_pria"
                                                value="{{ $sampel->Wedding->foto_pria ?? ' ' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Foto Wanita</label>
                                            <input type="file" class="form-control "
                                                name="foto_wanita"value="{{ $sampel->Wedding->foto_wanita ?? ' ' }}">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="ucapan_terima_kasih"> Ucapan Terima Kasih</label>
                                        <input type="text" class="form-control" id="ucapan_terima_kasih"
                                            name="ucapan_terima_kasih"value="{{ $sampel->Wedding->ucapan_terima_kasih ?? ' ' }}">
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="orangTua">
                                    <strong class="center" style="font-size: 18px">Orang Tua/Wali
                                        Mempelai
                                        Pria</strong>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria">Ayah</label>
                                        <input type="text" class="form-control" id="ayah_pria" name="ayah_pria"
                                            value="{{ $sampel->Wedding->ayah_pria ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria"> Ibu</label>
                                        <input type="text" class="form-control" id="ibu_pria"
                                            name="ibu_pria"value="{{ $sampel->Wedding->ayah_wanita ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria"> Alamat</label>
                                        <input type="text" class="form-control" id="alamat_org_tua_mp"
                                            name="alamat_org_tua_mp"value="{{ $sampel->Wedding->alamat_org_tua_mp ?? ' ' }}">
                                        <div class="preview-text"></div>
                                    </div>
                                    <strong class="center" style="font-size: 18px">Orang Tua/Wali
                                        Mempelai
                                        Wanita</strong>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria">Ayah</label>
                                        <input type="text" class="form-control " id="ayah_wanita"
                                            name="ayah_wanita"value="{{ $sampel->Wedding->ayah_wanita ?? ' ' }}">

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria"> Ibu</label>
                                        <input type="text" class="form-control " id="ibu_wanita"
                                            name="ibu_wanita"value="{{ $sampel->Wedding->ibu_wanita ?? ' ' }}">

                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="namaPengantinPria"> Alamat</label>
                                        <input type="text" class="form-control " id="alamat_org_tua_mw"
                                            name="alamat_org_tua_mw"value="{{ $sampel->Wedding->alamat_org_tua_mw ?? ' ' }}">

                                    </div>
                                </div>
                                <div class="tab-pane fade "id="waktuTempat">
                                    <strong class="center" style="font-size: 18px">Waktu & Lokasi Acara Akad
                                        Nikah</strong>
                                    <div class="row">
                                        <div class="form-section col-md-6">
                                            <div class="form-group">
                                                <label for="lokasiAcaraAkad">Lokasi Acara</label>
                                                <input type="text" id="addressAkad" class="form-control "
                                                    name="lokasi_acara_akad"value="{{ $sampel->Wedding->lokasi_acara_akad ?? ' ' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jamMulaiAkad">Jam Mulai</label>
                                                <input type="time" class="form-control " id="jamMulaiAkad"
                                                    name="jam_mulai_akad"value="{{ $sampel->Wedding->jam_mulai_akad ?? ' ' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jamSelesaiAkad">Jam Selesai</label>
                                                <input type="time" class="form-control previewable"
                                                    id="jamSelesaiAkad"
                                                    name="jam_selesai_akad"value="{{ $sampel->Wedding->jam_selesai_akad ?? ' ' }}">
                                            </div>
                                            <input id="latitudeAkad" type="hidden" class="form-control"
                                                name="latitude_akad"value="{{ $sampel->Wedding->latitude_akad ?? ' ' }}">
                                            <input id="longitudeAkad" type="hidden" class="form-control"
                                                name="longitude_akad"value="{{ $sampel->Wedding->longitude_akad ?? ' ' }}">
                                        </div>
                                        <div class="map-container col-md-6">
                                            <div class="map" id="mapAkad"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <strong class="center" style="font-size: 18px">Waktu & Lokasi Acara
                                            Resepsi</strong>
                                        <div class="form-section col-md-6">
                                            <div class="form-group">
                                                <label for="lokasiAcaraResepsi">Lokasi Acara</label>
                                                <input type="text" id="addressResepsi"
                                                    class="form-control previewable"
                                                    name="lokasi_acara_resepsi"value="{{ $sampel->Wedding->lokasi_acara_resepsi ?? ' ' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jamMulaiResepsi">Jam Mulai</label>
                                                <input type="time" class="form-control " id="jamMulaiResepsi"
                                                    name="jam_mulai_resepsi"value="{{ $sampel->Wedding->jam_mulai_resepsi ?? ' ' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="jamSelesaiResepsi">Jam Selesai</label>
                                                <input type="time" class="form-control " id="jamSelesaiResepsi"
                                                    name="jam_selesai_resepsi"value="{{ $sampel->Wedding->jam_selesai_resepsi ?? ' ' }}">
                                            </div>
                                            <input id="latitudeResepsi" type="hidden" class="form-control"
                                                name="latitude_resepsi"
                                                value="{{ $sampel->Wedding->latitude_resepsi ?? ' ' }}">
                                            <input id="longitudeResepsi" type="hidden" class="form-control"
                                                name="longitude_resepsi"value="{{ $sampel->Wedding->longitude_resepsi ?? ' ' }}">
                                        </div>
                                        <div class="map-container col-md-6">
                                            <div class="map" id="mapResepsi"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade "id="cerita">
                                    <strong class="center" style="font-size: 18px">Perjalanan
                                        Cinta</strong><br>
                                    <strong class="center " style="font-size: 18px; margin-top: -2%">Kenalan</strong>
                                    <div class="form-group mt-3">
                                        <label for="tanggal_kenalan">Tanggal </label>
                                        <input type="text" class="form-control"
                                            name="tanggal_kenalan"value="{{ $sampel->Wedding->tanggal_kenalan ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="deskripsi">Cerita</label>
                                        <textarea class="form-control " id="cerita_kenalan" name="cerita_kenalan" rows="2">{{ $sampel->Wedding->cerita_kenalan ?? ' ' }}</textarea>
                                    </div>
                                    <strong style="padding-left: 7%" class="center "
                                        style="font-size: 18px">Jadian</strong>
                                    <div class="form-group mt-3">
                                        <label for="tanggal_jadian">Tanggal </label>
                                        <input type="text" class="form-control previewable" id="tanggal_jadian"
                                            name="tanggal_jadian"value="{{ $sampel->Wedding->tanggal_jadian ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cerita_jadian">Cerita</label>
                                        <textarea class="form-control" id="cerita_jadian" name="cerita_jadian" rows="2">{{ $sampel->Wedding->tanggal_jadian ?? ' ' }}</textarea>
                                    </div>
                                    <strong style="padding-left: 7%" class="center "
                                        style="font-size: 18px">Tunangan</strong>
                                    <div class="form-group mt-3">
                                        <label for="lokasiAcara">Tanggal </label>
                                        <input type="text" class="form-control "
                                            name="tanggal_tunangan"value="{{ $sampel->Wedding->tanggal_jadian ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cerita_kenalan">Cerita</label>
                                        <textarea class="form-control " id="cerita_kenalan" name="cerita_tunangan" rows="2">{{ $sampel->Wedding->cerita_tunangan ?? ' ' }}</textarea>
                                    </div>
                                    <strong style="padding-left: 7%" class="center "
                                        style="font-size: 18px">Nikah</strong>
                                    <div class="form-group mt-3">
                                        <label for="tanggal_nikah">Tanggal </label>
                                        <input type="text" class="form-control " id="tanggal_nikah"
                                            name="tanggal_nikah"value="{{ $sampel->Wedding->tanggal_nikah ?? ' ' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="cerita_nikah">Cerita</label>
                                        <textarea class="form-control previewable" id="cerita_nikah" name="cerita_nikah" rows="2">{{ $sampel->Wedding->cerita_nikah ?? ' ' }}</textarea>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="galeri">
                                    <strong class="center" style="font-size: 18px">Galeri Kedua Mempelai</strong>
                                    <div class="form-group">
                                        <label for="galleryUpload">Upload Foto Galeri</label>
                                        <input type="file" class="form-control" id="galleryUpload" name="gallery[]"
                                            multiple>
                                    </div>
                                    <div class="gallery-preview" id="galleryPreview">
                                        @php
                                            // Inisialisasi array kosong untuk gallery images
                                            $galleryImages = [];

                                            // Periksa jika $sampel dan $sampel->wedding tidak null
                                            if ($sampel && $sampel->wedding) {
                                                $galleryData = $sampel->wedding->gallery;

                                                // Jika gallery berupa array langsung, tidak perlu di-decode
                                                if (is_array($galleryData)) {
                                                    $galleryImages = $galleryData;
                                                } elseif (is_string($galleryData)) {
                                                    // Decode data JSON jika berupa string
                                                    $galleryImages = json_decode($galleryData, true);
                                                    if (!is_array($galleryImages)) {
                                                        $galleryImages = []; // Jika json_decode gagal, gunakan array kosong
                                                    }
                                                }

                                                // Filter elemen kosong dari array
                                                $galleryImages = array_filter($galleryImages, function ($item) {
                                                    return !empty($item); // Hanya ambil elemen yang tidak kosong
                                                });
                                            }
                                        @endphp

                                        @if (!empty($galleryImages))
                                            @foreach ($galleryImages as $image)
                                                <div class="img-wrapper">
                                                    <img src="{{ asset('storage/gallery/' . $image) }}"
                                                        class="gallery-img" alt="Gallery Image">
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No images available.</p>
                                        @endif
                                    </div>



                                    <button type="button" id="addMoreImages" class="btn btn-secondary mt-2">Tambah Foto
                                        Lain</button>
                                    <div id="error-message" class="text-danger mt-2"></div>
                                    <input type="hidden" id="selectedFont" name="font">
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary"
                                            style="margin-top: -20%">Simpan</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-rotatedmarker/leaflet.rotatedMarker.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="https://unpkg.com/leaflet-rotatedmarker/leaflet.rotatedMarker.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kategori = document.getElementById('kategori');
        const fontSelect = document.getElementById('fontSelect');
        const formWedding = document.getElementById('form-pernikahan');
        const previewableInputs = formWedding.querySelectorAll('.previewable');
        const selectedFont = document.getElementById('selectedFont');

        function updateWeddingPreviews() {
            previewableInputs.forEach((input) => {
                const preview = input.nextElementSibling;
                preview.className = 'preview-text ' + fontSelect.value;
                preview.textContent = input.value;
            });
        }

        // Update previews when font changes
        fontSelect.addEventListener('change', function() {
            selectedFont.value = fontSelect
                .value; // Simpan jenis font yang dipilih ke input tersembunyi
            updateWeddingPreviews();
        });

        // Update previews when input changes
        previewableInputs.forEach((input) => {
            input.addEventListener('input', updateWeddingPreviews);
        });

        // Update previews on initial load
        updateWeddingPreviews();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryUpload = document.getElementById('galleryUpload');
        const galleryPreview = document.getElementById('galleryPreview');
        const addMoreImagesButton = document.getElementById('addMoreImages');
        const errorMessage = document.getElementById('error-message');

        let allFiles = [];

        galleryUpload.addEventListener('change', function() {
            const files = Array.from(galleryUpload.files);

            // Check if the total number of files exceeds 9
            if (allFiles.length + files.length > 9) {
                errorMessage.textContent = 'Jumlah foto tidak boleh lebih dari 9.';
                return;
            } else {
                errorMessage.textContent = ''; // Clear error message
            }

            allFiles = allFiles.concat(files);
            updatePreview();
        });

        addMoreImagesButton.addEventListener('click', function() {
            galleryUpload.click();
        });

        function updatePreview() {
            galleryPreview.innerHTML = ''; // Clear existing previews

            allFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.className = 'img-wrapper';

                    const imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.className = 'gallery-img';

                    const removeButton = document.createElement('button');
                    removeButton.className = 'remove-btn btn btn-danger';
                    removeButton.textContent = 'Hapus';
                    removeButton.addEventListener('click', function() {
                        allFiles.splice(index, 1);
                        updatePreview();
                    });

                    imgWrapper.appendChild(imgElement);
                    imgWrapper.appendChild(removeButton);
                    galleryPreview.appendChild(imgWrapper);
                }
                reader.readAsDataURL(file);
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function initializeMap(mapId, latInputId, lngInputId, addressInputId) {
            var map = L.map(mapId).setView([-1.8592694909901866, 109.97138592970299], 13);

            var streetLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var marker;
            var geocoder = L.Control.geocoder({
                    defaultMarkGeocode: false
                })
                .on('markgeocode', function(e) {
                    var latlng = e.geocode.center;
                    // Remove existing marker if any
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    // Add a new marker with draggable option
                    marker = L.marker(latlng, {
                        draggable: true
                    }).addTo(map);
                    map.setView(latlng, 16);
                    // Update input fields with the coordinates
                    document.getElementById(latInputId).value = latlng.lat;
                    document.getElementById(lngInputId).value = latlng.lng;
                    // Update address field with reverse geocoding
                    updateAddress(latlng, addressInputId);
                    // Add event listener for marker dragend event
                    marker.on('dragend', function(event) {
                        var position = marker.getLatLng();
                        document.getElementById(latInputId).value = position.lat;
                        document.getElementById(lngInputId).value = position.lng;
                        updateAddress(position, addressInputId);
                    });
                })
                .addTo(map);

            function updateAddress(latlng, addressInputId) {
                var url =
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${latlng.lat}&lon=${latlng.lng}`;
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById(addressInputId).value = data.display_name;
                    })
                    .catch(error => {
                        console.error('Error fetching address:', error);
                    });
            }

            // Allow map rotation with mouse right-click and drag
            var rotationAngle = 0;
            var isRotating = false;
            map.getContainer().addEventListener('contextmenu', function(e) {
                e.preventDefault();
            });
            map.getContainer().addEventListener('mousedown', function(e) {
                if (e.button === 2) { // Right mouse button
                    isRotating = true;
                }
            });
            map.getContainer().addEventListener('mousemove', function(e) {
                if (isRotating) {
                    rotationAngle += e.movementX * 0.5; // Adjust rotation speed as needed
                    map.getPane('mapPane').style.transform = `rotate(${rotationAngle}deg)`;
                }
            });
            map.getContainer().addEventListener('mouseup', function(e) {
                if (e.button === 2) { // Right mouse button
                    isRotating = false;
                }
            });
        }

        // Initialize maps for both Akad and Resepsi
        initializeMap('mapAkad', 'latitudeAkad', 'longitudeAkad', 'addressAkad');
        initializeMap('mapResepsi', 'latitudeResepsi', 'longitudeResepsi', 'addressResepsi');
        initializeMap('mapUlangTahunDewasa', 'latitudeUTD', 'longitudeUTD', 'addressUTD');
        initializeMap('mapKeagamaan', 'latitudeKeagamaan', 'longitudeKeagamaan', 'addressKeagamaan');
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all input elements with class 'uppercase'
        var inputs = document.querySelectorAll('.uppercase');

        // Add event listener to each input element to convert value to uppercase and limit to 3 characters
        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                input.value = input.value.toUpperCase().slice(0,
                    3); // Convert to uppercase and limit to 3 characters
            });
        });
    });
</script>
