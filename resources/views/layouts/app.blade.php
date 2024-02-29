<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Google Font: Source Sans Pro -->
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
<style>.nav-link.active {
    background-color: #1332ce;
    font-weight: bold;
}</style>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  {{-- <s src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    {{-- <img class="animation__shake" src="/docs/3.1//assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}


@include('layouts.header')

@include('layouts.sidebar')

@yield('content')

@include('layouts.footer')

</div>
</body>
<script>
    // function highlight(id) {

    //     var navLinks = document.querySelectorAll('.nav-link');
    //     navLinks.forEach(function(link) {
    //         link.classList.remove('active');
    //     });


    //     var clickedLink = document.getElementById(id);
    //     clickedLink.classList.add('active');
    // }
//     document.querySelectorAll('ul.nav-sidebar a').forEach(function(link) {
//     if (link.id === 'dashboard') {
//         link.classList.add('active');
//     }
// });
</script>
</html>
