{{ Form::open(array('route' => 'fellownotes.store')) }}
    <fieldset>
        {{ Form::hidden('entityId', $entityId) }}
        {{ Form::hidden('entityType', $entityType) }}
        <div class="form-group">
            {{ Form::label('content', 'Leave a note:') }}
            {{ Form::textarea('content', null, array('class'=>'form-control character-limit', 'character-limit-max'=>1400)) }}
            <small>Your notes will only be visible to other Fellows.</small>
        </div>
    </fieldset>
    <div class="form-group">
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    </div>
{{ Form::close() }}