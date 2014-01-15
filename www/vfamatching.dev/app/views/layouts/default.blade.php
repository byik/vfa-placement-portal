<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>VFA Placement Portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- TODO: Add local fallback for bootstrap and jQuery -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ URL::to('css/bootstrap.css') }}">
        <!-- Fontawesome -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Datepicker CSS -->
        <link rel="stylesheet" href="{{ URL::to('css/datepicker.css') }}">
        <!-- Our custom css -->
        <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
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
        @include('partials.footer')
        
        <!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{ URL::to('js/bootstrap.js') }}"></script>
        <!-- Datepicker JS -->
        <script src="{{ URL::to('js/bootstrap-datepicker.js') }}"></script>
        <!-- Chart.js -->
        <script src="{{ URL::to('js/Chart.js') }}"></script>
        <!-- Noty -->
        <script type="text/javascript" src="{{ URL::to('js/noty/packaged/jquery.noty.packaged.min.js') }}"></script>
        <!-- character-limit.js -->
        <script src="{{ URL::to('js/character-limit.js') }}"></script>
        <!-- required-fields.js -->
        <script src="{{ URL::to('js/realtime-input-feedback.js') }}"></script>
    </body>
</html>

<!-- <small class="pull-right"><em>Test</em></small> -->