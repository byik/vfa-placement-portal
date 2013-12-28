{{ Form::open(array('route' => 'pitches.store', 'class'=>'pitch-form')) }}
    <fieldset>
        {{ Form::hidden('fellow_id', $fellow_id) }}
        {{ Form::hidden('opportunity_id', $opportunity_id) }}
        <div class="form-group">
            {{ Form::label('body', 'Why are you interested in this opportunity?') }}
            {{ Form::textarea('body', null, array('class'=>'form-control character-limit required', 'character-limit-max'=>1400, 'character-limit-min'=>140)) }}
        </div>
    </fieldset>
    Your pitch will be submitted to VFA. Pending approval, you will be introduced to the hiring managers at this company, and the hiring manager will receive your pitch.
{{ Form::close() }}