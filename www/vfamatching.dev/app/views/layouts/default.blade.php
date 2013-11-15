<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>VFA Placement Portal</title>
    <!-- TODO: Add local fallback for bootstrap and jQuery -->
    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <script src="js/bootstrap.js"></script>
    <!-- Chart.js -->
    <script src="js/Chart.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
 
@include('partials.nav')


<div class="page-header vfa-header">
    <div class="container">
        <h1>@yield('header')</h1>
    </div>
</div>

<div class="container">
    @if(Session::has('flash_notice'))
        @include('partials.alerts.notice', array('notice'=>Session::get('flash_notice')))
    @endif

    @if (Session::has('flash_error'))
        @include('partials.alerts.error', array('error'=>Session::get('flash_error')))
    @endif
    
    @yield('content')
</div>


</body>
</html>