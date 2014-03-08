<p>Hi {{ $firstName }},</p>
<p><a href="{{ URL::to('/companies/' . $pitch->opportunity->company->id)}}">{{ $pitch->opportunity->company->name }}</a> has decided to place you on the waitlist for their <a href="{{ URL::to('/opportunities/' . $pitch->opportunity->id)}}">{{ $pitch->opportunity->title }}</a> Opportunity. You may get to interview with them in the future, but for now, it's best to concentrate on your <a href="{{ URL::to('/')}}">existing Opportunities</a> and to continue pitching for <a href="{{ URL::to('/opportunities?sort=opportunities.created_at&order=desc&search=&limit=5')}}">new Opportunities</a>.</p>
<p>Please feel free to reach out to corpdev@ventureforamerica.org and one of us will get back to you promptly.</p> 
<p>Best,<br/>
The VFA Robot</p>