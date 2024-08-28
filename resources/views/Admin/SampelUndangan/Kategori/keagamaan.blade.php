@extends('Template.Admin.base')
@section('content')
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @include('Admin.SampelUndangan.CSSMap.index')
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
            height: 200px;
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
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('sampel-undangan') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>
                    Kembali</a>
                <div class="ibox mt-2">
                    <div class="ibox-head">
                        <div class="ibox-title">Edit/Isi Data Undangan Acara Keagamaan</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="nav nav-tabs tabs-line mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="#pengaturan" data-toggle="tab"><i
                                        class="fa fa-cogs"></i>
                                    Pengaturan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#detailAcara" data-toggle="tab"><i
                                        class="fa fa-praying-hands"></i>
                                    Detail Acara</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#galeri" data-toggle="tab"><i class="fa fa-praying-hands"></i>
                                    Galeri</a>
                            </li>
                        </ul>
                        <form
                            action="{{ route('admin-update-undangan-form', ['id' => $sampel->id, 'kategori_id' => $kategori->id]) }}?? ''"
                            method="POST" id="form-keagamaan" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="tab-content" id="form-keagamaan">
                                <!-- Tab Pengaturan -->
                                <div class="tab-pane fade show active" id="pengaturan">
                                    <div class="form-group">
                                        <label for="fontSelect">Pilih Jenis Font</label>
                                        <select class="form-control" id="fontSelect" onchange="changeFont()">
                                            <option value="font-arial">Arial</option>
                                            <option value="font-playfair-display">Playfair Display</option>
                                            <option value="font-merriweather">Merriweather</option>
                                            <option value="font-georgia">Georgia</option>
                                            <option value="font-great-vibes">Great Vibes</option>
                                            <option value="font-dancing-script">Dancing Script</option>
                                            <option value="font-alex-brush">Alex Brush</option>
                                            <option value="font-comic-sans-ms">Comic Sans MS</option>
                                            <option value="font-poppins">Poppins</option>
                                            <option value="font-quicksand">Quicksand</option>
                                            <option value="font-pacifico">Pacifico</option>
                                            <option value="font-chewy">Chewy</option>
                                            <option value="font-montserrat">Montserrat</option>
                                            <option value="font-lato">Lato</option>
                                            <option value="font-raleway">Raleway</option>
                                            <option value="font-bebas-neue">Bebas Neue</option>
                                            <option value="font-roboto-slab">Roboto Slab</option>
                                            <option value="font-times-new-roman">Times New Roman</option>
                                            <option value="font-garamond">Garamond</option>
                                            <option value="font-open-sans">Open Sans</option>
                                            <option value="font-cinzel">Cinzel</option>
                                            <option value="font-libre-baskerville">Libre Baskerville</option>
                                            <option value="font-satisfy">Satisfy</option>
                                            <option value="font-italiana">Italiana</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSambutan">Judul Acara</label>
                                        <input type="text" class="form-control previewable" id="kataSambutan"
                                            name="judul_acara_keagamaan"required
                                            value="{{ $sampel->keagamaan->judul_acara_keagamaan ?? '' }}">
                                        <div class="preview-text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSambutan">Nama Lengkap</label>
                                        <input type="text" class="form-control previewable" id="kataSambutan"
                                            name="nama_lengkap_keagamaan" required
                                            value="{{ $sampel->keagamaan->nama_lengkap_keagamaan ?? '' }}">
                                        <div class="preview-text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kataSambutan">Foto</label>
                                        <input type="file" class="form-control previewable" id="kataSambutan"
                                            name="foto_keagamaan" value="{{ $sampel->keagamaan->foto_keagamaan ?? '' }}">
                                        <div class="preview-text"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="countDown">Hitung Mundur</label>
                                        <input type="date" class="form-control previewable" id="countDown"
                                            name="countdown_keagamaan" required
                                            value="{{ $sampel->keagamaan->countdown_keagamaan ?? '' }}">
                                        <div class="preview-text"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="detailAcara">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaAyah">Nama Ayah</label>
                                                <input type="text" class="form-control " id="namaAyah"
                                                    name="nama_ayah_keagamaan"
                                                    value="{{ $sampel->keagamaan->nama_ayah_keagamaan ?? '' }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="namaIbu">Nama Ibu</label>
                                                <input type="text" class="form-control " id="namaIbu"
                                                    name="nama_ibu_keagamaan"
                                                    value="{{ $sampel->keagamaan->nama_ibu_keagamaan ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jamMulai">Jam Mulai</label>
                                                <input type="time" class="form-control" id="jamMulai"
                                                    name="jam_mulai_keagamaan"value="{{ $sampel->keagamaan->jam_mulai_keagamaan ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jamSelesai">Jam Selesai</label>
                                                <input type="time" class="form-control" id="jamSelesai"
                                                    name="jam_selesai_keagamaan"value="{{ $sampel->keagamaan->jam_selesai_keagamaan ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatAcara">Lokasi Acara</label>
                                        <input type="text" class="form-control" id="addressKeagamaan"
                                            name="alamat_acara_keagamaan"value="{{ $sampel->keagamaan->alamat_acara_keagamaan ?? '' }}">
                                    </div>
                                    <div class="form-group" style="padding: 0%">
                                        <label for="petaLokasi">Peta Lokasi</label>
                                        <div class="map" id="mapKeagamaan"></div>
                                        <input type="hidden" id="latitude_keagamaan"
                                            name="latitude_keagamaan"value="{{ $sampel->keagamaan->latitude_keagamaan ?? '' }}">
                                        <input type="hidden" id="longitude_keagamaan"
                                            name="longitude_keagamaan"value="{{ $sampel->keagamaan->longitude_keagamaan ?? '' }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkMap">Link Google Map</label>
                                        <input type="text" class="form-control" id="linkMap"
                                            name="link_map_keagamaan"value="{{ $sampel->keagamaan->link_map_keagamaan ?? '' }}">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="noRek">Nomor Rekening</label>
                                                <input type="text" class="form-control" id="noRek"
                                                    name="no_rek"value="{{ $sampel->keagamaan->no_rek ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="atasNama">Atas Nama</label>
                                                <input type="text" class="form-control" id="atasNama"
                                                    name="atas_nama"value="{{ $sampel->keagamaan->atas_nama ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="terimakasihKeagamaan">Ucapan Terima Kasih</label>
                                        <textarea class="form-control" name="terimakasih_keagamaan" id="terimakasihKeagamaan" rows="2">{{ $sampel->keagamaan->terimakasih_keagamaan ?? '' }}</textarea>
                                    </div>

                                </div>
                                <div class="tab-pane fade " id="galeri">
                                    <div class="form-group">
                                        <label for="galleryUpload">Upload Foto Galeri</label>
                                        <input type="file" class="form-control" id="galleryUpload"
                                            name="galeri_keagamaan[]" multiple
                                            value="{{ $sampel->keagamaan->galeri_keagamaan ?? '' }}">
                                    </div>
                                    <div class="gallery-preview" id="galleryPreview"></div>
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
                    </div>
                    </form>
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
        const galleryUpload = document.getElementById('galleryUpload');
        const galleryPreview = document.getElementById('galleryPreview');
        const addMoreImagesButton = document.getElementById('addMoreImages');
        const errorMessage = document.getElementById('error-message');

        let allFiles = [];

        // Function to clear allFiles when new images are uploaded
        function clearOldFiles() {
            allFiles = []; // Reset the allFiles array
            galleryPreview.innerHTML = ''; // Clear the preview
        }

        galleryUpload.addEventListener('change', function() {
            const files = Array.from(galleryUpload.files);

            // Clear old files when new ones are uploaded
            clearOldFiles();

            // Check if the total number of files exceeds 9
            if (allFiles.length + files.length > 4) {
                errorMessage.textContent = 'Jumlah foto tidak boleh lebih dari 4.';
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
        const fontSelect = document.getElementById('fontSelect');
        const formKeagamaan = document.getElementById('form-keagamaan');
        const previewableInputs = formKeagamaan.querySelectorAll('.previewable');
        const selectedFont = document.getElementById('selectedFont');

        function updateKeagamaanPreviews() {
            previewableInputs.forEach((input) => {
                const preview = input.nextElementSibling;
                if (preview && preview.classList.contains('preview-text')) {
                    preview.className = 'preview-text ' + fontSelect.value;
                    preview.textContent = input.value;
                }
            });
        }

        // Update previews when font changes
        fontSelect.addEventListener('change', function() {
            selectedFont.value = fontSelect
                .value; // Simpan jenis font yang dipilih ke input tersembunyi
            updateKeagamaanPreviews();
        });

        // Update previews when input changes
        previewableInputs.forEach((input) => {
            input.addEventListener('input', updateKeagamaanPreviews);
        });

        // Update previews on initial load
        updateKeagamaanPreviews();
    });
</script>
{{-- MAP --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function initializeMap(mapId, latInputId, lngInputId, addressInputId) {
            var map = L.map(mapId).setView([-1.8592694909901866, 109.97138592970299], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
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

        // Initialize maps for the event
        initializeMap('mapKeagamaan', 'latitude_keagamaan', 'longitude_keagamaan', 'addressKeagamaan');
    });
</script>
{{-- END --}}
