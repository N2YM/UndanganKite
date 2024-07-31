@extends('Template.User.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Card  -->
            @foreach ($tmp as $tmp)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        @if ($tmp->cover1)
                            <img class="card-img-top" src="{{ asset('storage/' . $tmp->cover1) }}" alt="Cover Image">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $tmp->judul_undangan }}</h5>
                            <p class="card-text">{{ $tmp->kategori_undangan }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('preview-undangan', ['id' => $tmp->id]) }}"
                                    class="btn btn-secondary btn-sm stretched-link">Preview</a>
                                <div>
                                    <a href="{{ route('edit-undangan', $tmp->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('destroy-undangan', $tmp->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            style="cursor: pointer;">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .card {
            height: 300px;
            /* Atur tinggi kartu agar sama */
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            /* Tambahkan flex untuk meratakan konten */
            flex-direction: column;
            /* Atur arah flex */
        }

        .card-img-top {
            height: 150px;
            /* Atur tinggi gambar */
            width: 150px;
            /* Atur lebar gambar agar sama */
            object-fit: cover;
            /* Memastikan gambar terpotong dengan baik */
        }

        .card-body {
            padding: 1rem;
            flex-grow: 1;
            /* Membuat body kartu tumbuh untuk mengisi ruang */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Meratakan konten di dalam body */
        }

        .btn-secondary {
            width: 100%;
            border-radius: 5px;
        }
    </style>
@endsection
