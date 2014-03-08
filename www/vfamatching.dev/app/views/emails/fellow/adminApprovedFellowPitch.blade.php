<p>Hey, {{ $firstName }}!</p>
<p>We have approved your pitch and forwarded it to <a href="{{ URL::to('/companies/' . $pitch->opportunity->company->id)}}">{{ $pitch->opportunity->company->name }}</a> for approval. They will have the option to interview you now or to wait list you for a possible future interview. You will receive a notification when <a href="{{ URL::to('/companies/' . $pitch->opportunity->company->id)}}">{{ $pitch->opportunity->company->name }}</a> has taken action on your pitch.</p>
<p>Please email corpdev@ventureforamerica.org with any questions, comments, or concerns and one of us will reach out to you promptly.</p> 
<p>Best,<br/>
The VFA Robot</p>