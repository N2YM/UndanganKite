<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" />
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/themify-icons/css/themify-icons.css"
        rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css"
        rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css"
        rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    {{-- Fontawsemo --}}
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/regular.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('icon/css/regular.min.css') }}">
    @include('User.PreviewTemplate.font')
    @yield('css')
</head>


<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('Template.User.Layout.header')
        <!-- START SIDEBAR-->
        @include('Template.User.Layout.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            @include('Utils.notif')
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                @yield('content')
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }

                    .costum-alert {
                        position: fixed;
                        top: -100px;
                        /* Menyembunyikan notifikasi di luar layar atas */
                        right: 20px;
                        z-index: 9999;
                        width: 450px;
                        padding: 10px;
                        border-radius: 4px;
                        font-size: 16px;
                        transition: top 0.5s ease-in-out;
                        /* Menambahkan animasi untuk transisi */
                    }

                    .costum-alert.show {
                        top: 70px;
                        /* Menampilkan notifikasi setelah animasi masuk */
                    }

                    .costum-alert:hover {
                        transform: scale(1.05);
                    }

                    .costum-alert .close {
                        position: absolute;
                        top: 5px;
                        right: 10px;
                        color: inherit;
                    }

                    /* Scrollbar pada menu font di Summernote */
                    .note-popover .dropdown-menu {
                        max-height: 200px;
                        /* Atur tinggi maksimal dropdown */
                        overflow-y: auto;
                        /* Aktifkan scroll vertikal */
                    }

                    /* Jika dropdown menu terlalu panjang */
                    .note-popover {
                        z-index: 9999;
                        /* Pastikan dropdown muncul di atas elemen lain */
                    }
                </style>

            </div>
            <!-- END PAGE CONTENT-->
            @include('Template.User.Layout.footer')
        </div>
    </div>
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript">
    </script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/popper.js/dist/umd/popper.min.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap/dist/js/bootstrap.min.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/metisMenu/dist/metisMenu.min.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript">
    </script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js"
        type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/js/scripts/dashboard_1_demo.js" type="text/javascript">
    </script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/summernote/dist/summernote.min.js"
        type="text/javascript"></script>
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js"
        type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    {{-- <div id="summernote1"></div> --}}

    <script>
        $(document).ready(function() {
            $('.nav-tabs a').click(function() {
                $(this).tab('show');
            });
            $('#summernote1, #summernote2, #summernote3, #summernote4, #summernote5, #summernote6, #summernote7, #summernote8, #summernote9,#summernote10,#summernote11,#summernote12,#summernote13,#summernote14')
                .summernote({
                    tabsize: 2,
                    height: 35,
                    toolbar: [
                        ['fontname', ['fontname']],
                        ['style', ['bold', 'italic']],
                    ],
                    fontNames: [
                        'Arial', 'Arial Black', 'Courier New', 'Helvetica', 'Impact', 'Times New Roman',
                        'Verdana',
                        'Poppins', 'Playfair Display', 'Lora', 'Raleway', 'Great Vibes', 'Pacifico',
                        'Montserrat',
                        'Roboto', 'Open Sans', 'Merriweather', 'Dancing Script', 'Cinzel', 'Noto Serif',
                        'Source Sans Pro',
                        'Lobster'
                    ],
                    fontNamesIgnoreCheck: [
                        'Poppins', 'Playfair Display', 'Lora', 'Raleway', 'Great Vibes', 'Pacifico',
                        'Montserrat',
                        'Roboto', 'Open Sans', 'Merriweather', 'Dancing Script', 'Cinzel', 'Noto Serif',
                        'Source Sans Pro',
                        'Lobster'
                    ],
                    popover: {
                        font: [
                            ['fontname', ['fontname']],
                            ['style', ['bold', 'italic', ]],
                        ]
                    }
                });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menutup notifikasi secara otomatis setelah 4 detik
            setTimeout(function() {
                var alerts = document.querySelectorAll('.costum-alert');
                alerts.forEach(function(alert) {
                    alert.remove();
                });
            }, 3000);
            // Menambahkan class show setelah notifikasi ditambahkan
            var alerts = document.querySelectorAll('.costum-alert');
            alerts.forEach(function(alert) {
                alert.classList.add('show');
            });
        });
    </script>
    @stack('javascript')
</body>

</html>
