{{ Form::open(array('route' => 'placementstatuses.store', 'id'=>'placementStatus-'.$placementStatus->id,'class'=>'placementStatus-form')) }}
    <fieldset>
        {{ Form::hidden('fellow_id', $placementStatus->fellow_id) }}
        {{ Form::hidden('opportunity_id', $placementStatus->opportunity_id) }}
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::select('status', array_combine(PlacementStatus::statuses(), PlacementStatus::statuses()), $placementStatus->status, array('class'=>'form-control placementStatus-select')) }}
        </div>
        <div class="form-group">
            {{ Form::label('score', 'Score:') }}
            <ul class="list-unstyled">
                <li>5 = I would absolutely love to work here</li>
                <li>3 = This would be a decent fit for me</li>
                <li>1 = I would work here only as a last resort</li>
            </ul>
            {{ Form::select('score', array_combine(PlacementStatus::scores(),PlacementStatus::scores()), 3, array('class'=>'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('message', 'How are you feeling about this opportunity?') }}
            {{ Form::textarea('message', null, array('class'=>'form-control limit', 'limit'=>280)) }}
        </div>
    </fieldset>
{{ Form::close() }}