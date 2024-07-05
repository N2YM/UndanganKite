@extends('Template.Admin.base')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Card  -->
            @foreach ($data as $tmp)
                <div class="col-md-2 mb-3">
                    <div class="card">
                        @if ($tmp->cover1)
                            <img class="card-img-top" src="{{ asset('storage/' . $tmp->cover1) }}" alt="Cover Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $tmp->judul }}</h5>
                            <p class="card-text">{{ $tmp->kategoriTemplate->kategori_tmp }}</p>
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
        }

        .card-body {
            padding: 1rem;
            display: flex;
            flex-direction: column;
        }

        .btn-secondary {
            width: 100%;
            /* Tombol lebar penuh */
            border-radius: 5px;
            /* Border radius tombol */
        }
    </style>
@endsection
