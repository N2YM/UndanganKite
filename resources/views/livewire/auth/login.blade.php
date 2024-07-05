<div>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Login</title>
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
        </style>
    </head>

    <body class="bg-silver-300">
        <div class="login-container d-flex justify-content-center align-items-center">
            <div class="content login-content">
                <form wire:submit.prevent="loginUser">
                    <h2 class="login-title">Log in</h2>
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
                            <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" id="password" placeholder="******" wire:model.defer="password">
                            @error('password')
                                <div class="ivalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <label class="ui-checkbox ui-checkbox-info">
                            <input type="checkbox" wire:model.defer="remember">
                            <span class="input-span"></span>Remember me</label>
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-block" type="submit">Login</button>
                    </div>
                    <div class="social-auth-hr">
                    </div>
                    <div class="text-center">Not a member?
                        <a class="color-blue" href="{{ route('register') }}">Create account</a>
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
    </body>

    </html>

</div>
