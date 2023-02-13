<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/icon-white.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon-white.png') }}">
  <title>@yield('title') | Siduksa</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- DataTables -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

  @stack('before-css')
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

  
  @stack('after-css')

  @livewireStyles
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100" style="background-image: url('assets/img/bg-header-img.jpg'); background-position-y: 50%;">
  <span class="mask bg-primary opacity-20"></span>
</div>

  @include('component.sidemenu')

  <main class="main-content position-relative border-radius-lg ">
    @include('component.navbar')
    <div class="container-fluid py-4">
      @yield('content')
      @include('component.footer')
    </div>
  </main>
  
  @include('component.plugin')

  @stack('before-script')
  <script src="{{ asset('assets/js/jquery-3.6.1.min.js') }}" type="text/javascript"></script>
  <!-- DataTables -->
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  
  
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>

  <!-- Moment -->
  <script src="{{ asset('assets/js/moment.js') }}"></script>

  <!-- Tanya JS -->
  <script src="{{ asset('assets/js/tanya.js') }}"></script>

  <!-- Tooltips -->
  <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

  @include('sweetalert::alert')

  @stack('after-script')

  @livewireStyles
</body>

</html>