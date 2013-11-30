 <nav class="navbar navbar-default vfa-navbar" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ URL::to('/') }}"><img src="{{ URL::to('img/vfa_logo_nav_white.png') }}" alt="Venture for America logo"></a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      @if( Auth::check() )
        <!-- Dynamic nav -->
        @if( Auth::user()->role == "Admin" )
          TODO
        @elseif( Auth::user()->role == "Fellow")
          <li class=""><a href="{{ URL::to('/') }}">Dashboard</a></li>
          <li><a href="{{ URL::to('/fellows/' . Auth::user()->profile->id) }}">Profile</a></li>
          <li><a href="{{ URL::to('/opportunities') }}">Opportunities</a></li>
          <li><a href="{{ URL::to('/logout') }}">Sign out &raquo;</a></li>
        @elseif( Auth::user()->role == "Hiring Manager" )
          TODO
        @else
          <!-- We've got problems -->
        @endif
      @endif
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>