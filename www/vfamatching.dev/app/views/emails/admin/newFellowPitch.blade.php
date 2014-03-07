<p>Hey, {{ $firstName }}!</p>
<p><a href="{{ URL::to('/fellows/' . $pitch->fellow->id) }}">{{ $pitch->fellow->user->firstName . " " . $pitch->fellow->user->lastName }}</a> just submitted the following pitch for the <a href="{{ URL::to('/opportunities/' . $pitch->opportunity->id)}}">{{ $pitch->opportunity->title }}</a> position at <a href="{{ URL::to('/companies/' . $pitch->opportunity->company->id)}}">{{ $pitch->opportunity->company->name }}</a>:</p>
<p>{{ $pitch->body }}</p>
<p>To approve or waitlist this pitch, please visit <a href="{{ URL::to('/') }}">your dashboard</a>.</p>
<p>Best,<br/>
The VFA Robot</p>