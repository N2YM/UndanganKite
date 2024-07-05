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
            height: 250px;
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
