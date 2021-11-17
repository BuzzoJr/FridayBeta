<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/fontawesome/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datepicker/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admiko/vendors/dropzone-5.7.0/dist/min/dropzone.min.css') }}">
<script src="{{ asset('assets/admiko/vendors/dropzone-5.7.0/dist/min/dropzone.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/admiko/css/theme')}}/{{auth()->user()->theme}}/theme.css">
<!-- add custom CSS here-->
<link rel="stylesheet" href="{{ asset('assets/admiko/css/style.css') }}">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/admiko/fav/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admiko/fav/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admiko/fav/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/admiko/fav/site.webmanifest') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- SELECT2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> <!-- SELECT2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> <!-- SELECT2 -->

<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>


<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  sanitize: false
  })
  </script>
