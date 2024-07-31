<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>InviVibe</title>
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
    <!-- THEME STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ url('TemplateSystem/html/dist') }}/assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- Fontawsemo --}}
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/css/regular.min.css') }}">
    
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
    </style>
</head>


<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('Template.Admin.Layout.header')
        <!-- START SIDEBAR-->
        @include('Template.Admin.Layout.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            @include('Utils.notif')
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                @yield('content')


            </div>
            <!-- END PAGE CONTENT-->
            @include('Template.Admin.Layout.footer')
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
    <script src="{{ url('TemplateSystem/html/dist') }}/assets/vendors/DataTables/datatables.min.js" type="text/javascript">
    </script>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "success", // Ubah icon menjadi "success"
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
    @endif --}}
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
</body>

</html>
