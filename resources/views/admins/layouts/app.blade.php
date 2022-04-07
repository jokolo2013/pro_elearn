<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">

      <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- 1. Top Menu --}}
        @include('admins.layouts.topMenu')

        {{-- 2. Left Menu --}}
        @include('admins.layouts.leftMenu')

        {{-- 3. Main Content (Body) --}}
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>

        {{-- 4. Right Menu --}}
        @include('admins.layouts.rightMenu')

        {{-- 5. Footer --}}
        @include('admins.layouts.footer')
        @yield('footer');
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
