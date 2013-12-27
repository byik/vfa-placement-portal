<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VFA Placement Portal</title>
        <!-- TODO: Add local fallback for bootstrap and jQuery -->
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css') }}">
        <!-- Fontawesome -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <script src="{{ URL::to('js/bootstrap.js') }}"></script>
        <!-- Datepicker -->
        <link rel="stylesheet" href="{{ URL::to('css/datepicker.css') }}">
        <script src="{{ URL::to('js/bootstrap-datepicker.js') }}"></script>
        <!-- Chart.js -->
        <script src="{{ URL::to('js/Chart.js') }}"></script>
        <!-- Noty -->
        <script type="text/javascript" src="{{ URL::to('js/noty/packaged/jquery.noty.packaged.min.js') }}"></script>
        <!-- character-limit.js -->
        <script src="{{ URL::to('js/character-limit.js') }}"></script>
        <!-- Our custom css -->
        <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    </head>
    <body> 
        @include('partials.nav')
        <div class="page-header vfa-header">
            <div class="container">
                <h1>@yield('header')</h1>
            </div>
        </div>
        <div id="content">
            @if(Session::has('flash_notice'))
                @include('partials.alerts.notice', array('notice'=>Session::get('flash_notice')))
            @endif

            @if (Session::has('flash_error'))
                @include('partials.alerts.error', array('error'=>Session::get('flash_error')))
            @endif

            @if (Session::has('validation_errors'))
                @foreach(Session::get('validation_errors')->all() as $errorMessage)
                    @include('partials.alerts.error', array('error'=>$errorMessage))
                @endforeach
            @endif
            
            @yield('content')
        </div>
    </body>
</html>

<!-- <small class="pull-right"><em>Test</em></small> -->