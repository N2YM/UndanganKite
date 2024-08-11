@extends('Template.Admin.base')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($sampel as $undangan)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card">
                        @if ($undangan->cover)
                            <img class="card-img-top" src="{{ asset('storage/' . $undangan->cover) }}" alt="Cover Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $undangan->judul_undangan }}</h5>
                            <p class="card-text">
                                <strong>{{ $undangan->kategori->kategori_tmp }}</strong>
                            </p>
                            <div class="mt-auto btn-group">
                                <a href="{{ route('admin-edit-undangan', ['id' => $undangan->id, 'kategori_id' => $undangan->kategori_id]) }}"
                                    class="btn btn-warning btn-sm stretched-link btn-spacing">Edit</a>
                                <a href="{{ route('admin-undangan-form', ['id' => $undangan->id, 'kategori_id' => $undangan->kategori_id]) }}"
                                    class="btn btn-info btn-sm stretched-link btn-spacing">Preview</a>
                                <a href="{{ route('destroy-undangan', ['id' => $undangan->id]) }}"
                                    class="btn btn-danger btn-sm stretched-link btn-spacing">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .card {
        height: auto;
        /* Menggunakan tinggi otomatis untuk fleksibilitas */
        border-radius: 10px;
        overflow: hidden;
    }

    .card-body {
        padding: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* Menjamin tombol selalu di bagian bawah */
    }

    .card-img-top {
        height: 150px;
        object-fit: cover;
        width: 100%;
    }

    .btn-secondary,
    .btn-spacing {
        width: 100%;
        border-radius: 5px;
        margin-bottom: 5px;
        /* Memberi jarak antar tombol */
    }

    /* Menyederhanakan margin dan border radius */
    .btn-spacing:last-child {
        margin-right: 0;
    }

    @media (max-width: 768px) {
        .btn-spacing {
            border-radius: 10%;
            /* Menyesuaikan bentuk untuk mudah diakses */
        }
    }

    @media (max-width: 576px) {
        .card-body {
            padding: 0.5rem;
            /* Mengurangi padding di perangkat kecil */
        }

        .btn-spacing {
            margin-right: 0;
            /* Menghilangkan margin kanan */
            border-radius: 5px;
            /* Menyesuaikan bentuk tombol */
        }
    }
</style>
