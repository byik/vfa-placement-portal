<p>Congratulations, {{ $firstName }}!</p>
<p><a href="{{ URL::to('/companies/' . $pitch->opportunity->company->id)}}">{{ $pitch->opportunity->company->name }}</a> wants to interview you for their <a href="{{ URL::to('/opportunities/' . $pitch->opportunity->id)}}">{{ $pitch->opportunity->title }}</a> position</p>
<p>Please reach out as soon as you can to schedule a time for your interview.</p>
<p>If you have any questions, comments, or concerns, please email corpdev@ventureforamerica.org and one of us will reach out to you promptly.</p> 
<p>Best,<br/>
The VFA Robot</p>