<div>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Register</title>
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
            body {
                overflow: hidden;
                background-size: cover;
                background-position: center;
            }

            .login-container {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .content {
                width: 100%;
                max-width: 400px;
                padding: 20px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
        </style>
    </head>

    <body style="background-image: url('info/bg_login/bg3.png');">
        <div class="login-container">
            <div class="content">
                <div class="register">
                    <form id="register-form" wire:submit.prevent="registerUser">
                        <h2 class="login-title">Register</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" placeholder="Name" wire:model.defer="name">
                                    @error('name')
                                        <div class="invalid-feedback" style="color: red;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('email') is-invalid @enderror" type="email"
                                name="email" placeholder="Email" wire:model.defer="email">
                            @error('email')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                type="password" name="password" placeholder="Password" wire:model.defer="password">
                            @error('password')
                                <div class="invalid-feedback" style="color: red;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="password_confirmation" type="password"
                                placeholder="Confirm Password" wire:model.defer="password_confirmation">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block" type="submit">Daftar</button>
                        </div>
                        <div class="social-auth-hr"></div>
                        <div class="text-center">Sudah Punya Akun?
                            <a class="color-blue" href="{{ route('login') }}">Login disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN PAGE BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
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
                $('#register-form').validate({
                    errorClass: "help-block",
                    rules: {
                        name: {
                            required: true,
                            minlength: 2
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            equalTo: "#password"
                        }
                    },
                    highlight: function(e) {
                        $(e).closest(".form-group").addClass("has-error");
                    },
                    unhighlight: function(e) {
                        $(e).closest(".form-group").removeClass("has-error");
                    },
                });
            });
        </script>
    </body>

    </html>
</div>
