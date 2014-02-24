<?php 
    $scores = PlacementStatus::scores(); 
    $statuses = PlacementStatus::statuses();
    array_unshift($scores, "");
    array_unshift($statuses, "");
?>
{{ Form::open(array('route' => 'placementstatuses.store', 'id'=>'placementStatus-'.$placementStatus->id,'class'=>'placementStatus-form')) }}
    <fieldset>
        {{ Form::hidden('fellow_id', $placementStatus->fellow_id) }}
        {{ Form::hidden('opportunity_id', $placementStatus->opportunity_id) }}
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', array_combine($statuses, $statuses), "", array('class'=>'form-control placementStatus-select required')) }}
            <small>Current Status: <em>{{ $placementStatus->status }}</em></small>
        </div>
        <div class="form-group">
            {{ Form::label('score', 'Feedback*') }}
            {{ Form::select('score', array_combine($scores,$scores), "", array('class'=>'form-control required')) }}
            @if(Auth::user()->role == "Fellow")
                <small><ul class="list-unstyled">
                    <li>5 = I would absolutely love to work here</li>
                    <li>3 = This would be a decent fit for me</li>
                    <li>1 = I would work here only as a last resort</li>
                </ul></small>
            @else
                <small><ul class="list-unstyled">
                    <li>5 = I would absolutely love to hire this fellow</li>
                    <li>3 = This fellow would be a decent fit for {{ $placementStatus->opportunity->company->name}}</li>
                    <li>1 = I would hire this fellow only as a last resort</li>
                </ul></small>
            @endif
        </div>
        <div class="form-group">
            {{ Form::label('message', 'How do you feel about this prospect?*') }}
            {{ Form::textarea('message', null, array('class'=>'form-control character-limit required', 'character-limit-max'=>280)) }}
        </div>
    </fieldset>
    <em>*</em> Only VFA staff will be able to see this
{{ Form::close() }}