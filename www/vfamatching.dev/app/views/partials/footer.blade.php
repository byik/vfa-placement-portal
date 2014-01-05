<div class="vfa-footer">
	<div class="container">
		<ul>
			@if( Auth::check())
			@if(!is_null(Auth::user()->profile))
			    <!-- Dynamic footer -->
			    @if( Auth::user()->role == "Admin")
			      <li class=""><a href="{{ URL::to('/') }}"> Dashboard</a></li>
			      <li><a href="{{ URL::to('/users') }}"> Users</a></li>
			      <li><a href="{{ URL::to('/fellows') }}"> Fellows</a></li>
			      <li><a href="{{ URL::to('/companies') }}"> Companies</a></li>
			      <li><a href="{{ URL::to('/opportunities') }}"> Opportunities</a></li>
			      <li><a href="{{ URL::to('archive') }}"> Archives</a></li>
			    @elseif( Auth::user()->role == "Fellow")
			      <li class=""><a href="{{ URL::to('/') }}"> Dashboard</a></li>
			      <li><a href="{{ URL::to('/fellows/' . Auth::user()->profile->id) }}"> Profile</a></li>
			      <li><a href="{{ URL::to('/opportunities') }}"> Opportunities</a></li>
			      <li><a href="{{ URL::to('/companies') }}"> Companies</a></li>
			    @elseif( Auth::user()->role == "Hiring Manager" )
			      @if(Auth::user()->profile->isProfileComplete())
			      	<li class=""><a href="{{ URL::to('/') }}"> Dashboard</a></li>
			        <li><a href="{{ URL::to('/fellows') }}"> Fellows</a></li>
			        <li><a href="{{ URL::to('/companies/' . Auth::user()->profile->company->id) }}"> {{ Auth::user()->profile->company->name }}</a></li>
			        <li><a href="{{ URL::route('opportunities.index') }}"> Opportunities</a></li>
			        <li><a href="{{ URL::to('/hiringmanagers/' . Auth::user()->profile->id . '/edit') }}"> Profile</a></li>
			      @endif
			    @else
			      <!-- We've got problems -->
			    @endif
			@endif
			<li><a href="{{ URL::to('/logout') }}">Sign out</a></li>
		@endif
		</ul>
	</div>
</div>
