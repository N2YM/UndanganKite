@extends('Template.Admin.base')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Card  -->
            @foreach ($data as $tmp)
                <div class="col-md-2 mb-3">
                    <div class="card h-100">
                        @if ($tmp->cover)
                            <img class="card-img-top" src="{{ asset('storage/' . $tmp->cover) }}" alt="Cover Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">{{ $tmp->judul }}</h5>
                            <p class="card-text text-truncate">{{ $tmp->kategori_tmp }}</p>
                            <div class="mt-auto">
                                <a href="{{ route('view', ['id' => $tmp->id]) }}"
                                    class="btn btn-secondary btn-sm stretched-link">Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .card {
            height: 230px;
            /* Tinggi kartu */
            border-radius: 10px;
            /* Border radius */
            overflow: hidden;
            /* Hindari overflow dari gambar jika terlalu besar */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-body {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .card-title,
        .card-text {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            margin: 0;
        }

        .btn-secondary {
            width: 100%;
            /* Tombol lebar penuh */
            border-radius: 5px;
            /* Border radius tombol */
        }

        .card-img-top {
            height: 150px;
            /* Atur tinggi gambar */
            object-fit: cover;
            /* Memastikan gambar terpotong dengan rapi */
            width: 100%;
            /* Pastikan gambar memenuhi lebar kartu */
        }

        /* Menjaga tinggi kartu yang konsisten */
        .h-100 {
            height: 100%;
        }
    </style>
@endsection
