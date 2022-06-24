<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="{{ asset('dashboard_admin_files/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('dashboard_admin_files/assets/js/loader.js') }}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('dashboard_admin_files/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard_admin_files/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

        {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_admin_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_admin_files/plugins/noty/noty.min.js') }}"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('dashboard_admin_files/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard_admin_files/plugins/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard_admin_files/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard_admin_files/assets/css/tables/breadcrumb.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard_admin_files/assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard_admin_files/plugins/notification/snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    {{-- fonts.googleapis --}}
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

    <style>
        body, h1, h2, h3, h4, h5, h6 {
            font-family: 'Cairo', sans-serif !important;
        }
        .delete {
            background-color: transparent !important;
        }
    </style>

</head>
{{-- alt-menu open meun --}}
<body class="alt-menu sidebar-noneoverflow">

    <!-- BEGIN LOADER -->
    {{-- @include('dashboard_admin.layout.include._loader') --}}
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('dashboard_admin.layout.include._header')
    <!--  END NAVBAR  -->


    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('dashboard_admin.layout.include._sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @yield('content')

            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('dashboard_admin_files/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/assets/js/app.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('dashboard_admin_files/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('dashboard_admin_files/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/assets/js/dashboard/dash_1.js') }}"></script>
    
    <script src="{{ asset('dashboard_admin_files/plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/assets/js/custom/confirm_deleded.js') }}"></script>

    <script src="{{ asset('dashboard_admin_files/plugins/notification/snackbar/snackbar.min.js') }}"></script>
    <script src="{{ asset('dashboard_admin_files/assets/js/components/notification/custom-snackbar.js') }}"></script>

    @include('partials._session')

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>