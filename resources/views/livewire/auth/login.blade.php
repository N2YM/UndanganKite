<div>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>InviVibe | Login</title>
        <!-- GLOBAL MAINLY STYLES-->
        <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap/dist/css/bootstrap.min.css"
            rel="stylesheet" />
        <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css"
            rel="stylesheet" />
        <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/themify-icons/css/themify-icons.css"
            rel="stylesheet" />
        <!-- THEME STYLES-->
        <link href="{{ url('TemplateSystem/html/dist') }}/assets/css/main.css" rel="stylesheet" />
        <!-- PAGE LEVEL STYLES-->
        <link href="{{ url('TemplateSystem/html/dist') }}/assets/css/pages/auth-light.css" rel="stylesheet" />
        <style>
            /* Tambahkan ini ke file CSS Anda */
            .login-container {
                min-height: 100vh;
                /* memastikan div mengambil tinggi penuh layar */
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .login-content {
                width: 100%;
                max-width: 400px;
                /* Ubah ini untuk mengatur lebar maksimum konten */
                padding: 20px;
                /* Opsional: Tambahkan padding untuk memberi ruang ekstra di dalam konten */
                background-color: white;
                /* Opsional: Tambahkan warna latar belakang jika diinginkan */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* Opsional: Tambahkan bayangan untuk efek yang lebih menarik */
                border-radius: 8px;
                /* Opsional: Tambahkan border-radius untuk sudut yang membulat */
            }

            .input-group {
                position: relative;
            }

            .input-group-append {
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 10;
            }

            body {
                overflow: hidden;
                /* background-image: url('{{ url('info/bg_login/bg1.jpg') }}');  */
                background-size: cover;
                /* Mengatur ukuran background agar menutupi seluruh area */
                background-position: center;
            }
        </style>
    </head>
    <body class="bg-white">
        <div class="login-container d-flex justify-content-center align-items-center">
            <div class="content login-content">
                <form wire:submit.prevent="loginUser">
                    <h2 class="login-title">InviVibe</h2>
                    <div class="form-group">
                        <div class="input-group-icon right">
                            <div class="input-icon"><i class="fa fa-envelope"></i></div>
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" id="email" placeholder="example@gmail.com" autocomplete="off"
                                wire:model.defer="email">
                            @error('email')
                                <div class="ivalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-icon right">
                            <div class="input-icon"></div>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="******" wire:model.defer="password">
                            <div class="input-group-append">
                                <button type="button" onclick="togglePassword()" class="btn"
                                    style="border: none; background: transparent;">
                                    <i id="toggle-icon" class="fa fa-lock"></i> <!-- Ganti dengan ikon gembok -->
                                </button>
                            </div>
                            @error('password')
                                <div class="ivalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between float-right">
                        <a href="{{ route('password.request') }}">Lupa Sandi</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" type="submit">Login</button>
                    </div>
                    <div class="social-auth-hr">
                    </div>
                    <div class="text-center">Belum Punya Akun?
                        <a class="color-blue" href="{{ route('register') }}">Daftar Sini</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- BEGIN PAGE BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <!-- END PAGE BACKDROPS-->
        <!-- CORE PLUGINS -->
        <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript">
        </script>
        <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/popper.js/dist/umd/popper.min.js"
            type="text/javascript"></script>
        <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap/dist/js/bootstrap.min.js"
            type="text/javascript"></script>
        <!-- PAGE LEVEL PLUGINS -->
        <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jquery-validation/dist/jquery.validate.min.js"
            type="text/javascript"></script>
        <!-- CORE SCRIPTS-->
        <script src="{{ url('TemplateSystem/html/dist') }}/assets/js/app.js" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script type="text/javascript">
            $(function() {
                $('#login-form').validate({
                    errorClass: "help-block",
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },
                    highlight: function(e) {
                        $(e).closest(".form-group").addClass("has-error")
                    },
                    unhighlight: function(e) {
                        $(e).closest(".form-group").removeClass("has-error")
                    },
                });
            });
        </script>
        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const toggleIcon = document.getElementById('toggle-icon');
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                toggleIcon.className = type === 'password' ? 'fa fa-lock' : 'fa fa-unlock'; // Ganti ikon
            }
        </script>

        {{-- Sweet Alert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "{{ $message }}",

                });
            </script>
        @endif
        @if ($message = Session::get('failed'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "{{ $message }}",
                    text: "Silahkan Periksa Lagi",
                });
            </script>
        @endif
    </body>

    </html>

</div>
