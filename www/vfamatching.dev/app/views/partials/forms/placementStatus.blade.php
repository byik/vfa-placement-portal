<?php 
    $scores = PlacementStatus::scores(); 
    $statuses = PlacementStatus::statuses();
    array_unshift($scores, "");
    array_unshift($statuses, "");
?>
{{ Form::open(array('route' => 'placementstatuses.store', 'class'=>'placementStatus-form')) }}
    <fieldset>
        {{ Form::hidden('fellow_id', $placementStatus->fellow_id) }}
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', array_combine($statuses, $statuses), "", array('class'=>'form-control placementStatus-select required')) }}
            <small>Current Status: <em>{{ $placementStatus->status }}</em></small>
        </div>
    </fieldset>
    
{{ Form::close() }}