<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Undangan Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- ICON -->
    <link rel="stylesheet" href="{{ asset('TemplateSystem/icon/themify/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('TemplateSystem/icon/fontawesome/css/all.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" style="padding-top: 3%;">
                <div class="card card-success card-outline">
                    <strong style="text-align: center; margin-top: 3%; font-size: 30px;">
                        <i class="fa fa-gear"></i> Setting
                    </strong>
                    <div class="card-body">
                        <form action="{{ route('admin-store-undangan') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong><label>Judul Undangan</label></strong>
                                    <input type="text" class="form-control" name="judul_undangan" required>
                                </div>
                                <div class="form-group">
                                    <strong><label>Kategori Undangan</label></strong>
                                    <input type="text" class="form-control" disabled
                                        value="{{ $template->kategori->kategori_tmp }}">
                                </div>
                                <div class="form-group">
                                    <strong><label>Audio</label></strong>
                                    <select class="form-control mt-2" id="musicSelect" name="audio" required>
                                        @foreach ($audio as $kategori)
                                            <!-- Use the ID or the file name as the value -->
                                            <option value="{{ $kategori->musik }}">
                                                {{ $kategori->judul }} - {{ $kategori->kategori_audio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Input hidden untuk cover -->
                                <input type="hidden" name="cover" value="{{ $template->cover }}">
                                <input type="hidden" name="kategori_id" value="{{ $template->kategori_id }}">
                                <div class="row">
                                    <div class="col-md-2" style="padding-right: 0%;">
                                        <a href="{{ route('pilih-undangan') }}" class="btn btn-secondary btn-sm"
                                            style="width:100%;">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-10 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-outline-success btn-sm"
                                            style="width: 100%;">
                                            Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{ asset('TemplateSystem/icon/Themify.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-dQW7tLtShM0P3HqA9z2ovdXgATsH1Fs4v9HxOB5Z0zAy+U1XB6T9t2eNnJhPPhZW" crossorigin="anonymous">
    </script>
</body>

</html>
