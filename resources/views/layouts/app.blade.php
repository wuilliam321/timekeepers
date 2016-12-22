<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de timekeepers de Ingenier&iacute;a RM - @yield('title') </title>


    <link rel="stylesheet" href="/css/vendor.css" />
    <link rel="stylesheet" href="/css/app.css" />

</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.topnavbar')

            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
    <script>
      window.Laravel = <?php echo json_encode([
              'csrfToken' => csrf_token(),
      ]); ?>
    </script>
    <script src="/js/app.js" type="text/javascript"></script>
@section('scripts')
@show

</body>
</html>
