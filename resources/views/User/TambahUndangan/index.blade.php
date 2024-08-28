@extends('Template.User.base')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($undangan as $undangan)
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
                            <!-- Edit Button -->
                            <a href="{{ route('user-edit-undangan', ['id' => $undangan->id, 'kategori_id' => $undangan->kategori_id]) }}"
                                class="btn btn-warning btn-sm btn-spacing">Edit</a>

                            <!-- Preview Button -->
                            <a href="{{ route('user-undangan-form', ['id' => $undangan->id, 'kategori_id' => $undangan->kategori_id]) }}"
                                class="btn btn-info btn-sm btn-spacing">Preview</a>
                            <!-- Delete Form -->
                            <form
                                action="{{ route('user-undangan-destroy', ['id' => $undangan->id, 'kategori_id' => $undangan->kategori_id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-spacing"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
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
@endsection
