<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>VFA Placement Portal</title>
    <!-- TODO: Add local fallback for bootstrap and jQuery -->
    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!-- Chart.js -->
    <script src="js/Chart.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
 
@include('partials.nav')

<div class="container">
	@yield('content')
</div>

</body>
</html>