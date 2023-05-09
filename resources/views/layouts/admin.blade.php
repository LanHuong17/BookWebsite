<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- plugins:css -->

    <link rel="stylesheet" href="{{ asset('public/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- plugin css for this page -->

    <link rel="stylesheet" href="{{ asset('public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">


    <!-- endinject -->

    <link rel="shortcut icon" href="{{ asset('public/admin/images/favicon.png') }}" />
    @livewireStyles
</head>
<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('public/admin/vendors/base/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('public/admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

    <script src="{{ asset('public/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/admin/js/template.js') }}"></script>

        <!-- Custom js for this page-->
    <script src="{{ asset('public/admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/admin/js/data-table.js') }}"></script>
    <script src="{{ asset('public/admin/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/admin/js/dataTables.bootstrap4.js') }}"></script>
        <!-- End custom js for this page-->
    
    @stack('script')
    @livewireScripts
</body>
</html>