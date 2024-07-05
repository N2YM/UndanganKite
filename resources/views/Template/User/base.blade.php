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
    
</head>


<body class="fixed-navbar">
    <div class="page-wrapper">
        @include('Template.User.Layout.header')
        <!-- START SIDEBAR-->
        @include('Template.User.Layout.sidebar')
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
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
                </style>

            </div>
            <!-- END PAGE CONTENT-->
            @include('Template.User.Layout.footer')
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i
                class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
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
        $('#summernote1').summernote({
            placeholder: 'Hello stand alone ui',
            tabsize: 1,
            height: 30,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#summernote2').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#summernote3').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#summernote4').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
</body>

</html>
