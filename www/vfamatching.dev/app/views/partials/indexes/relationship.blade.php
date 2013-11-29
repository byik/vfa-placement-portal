<div class="col-md-4">
	<div class="row">
		<div class="col-xs-6">
            <div class="row">
                <p class="text-center">{{ $pieChart }}</p>
            </div>
            <div class="row">
                <p class="text-center">{{ $relationship->status }}</p>
            </div>
		</div>
        <div class="col-xs-6">
            <h3>{{ $relationship->opportunity->title }}</h3>
            <!-- TODO:
                Link opportunity title to opportunity page
                Add company name
                Link company name to company page
            -->
            <!-- Button trigger modal -->
            <a data-toggle="modal" href="#relationship-update-modal-{{ $relationship->id }}" class="btn
            btn-default btn-large">Update</a>
        </div>
	</div>		
</div>

<!-- Modal -->
<div class="modal" id="relationship-update-modal-{{ $relationship->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Update Placement Progress: {{ $relationship->opportunity->title }}</h4>
            </div>
            <div class="modal-body">
                {{-- This Form POST's to /placementstatus. Data is autofilled from PlacementStatus model in $relationship --}}
                {{ Form::model($relationship, array('route' => array('placementstatuses.store'))) }}
                    <fieldset>
                        {{ Form::hidden('fellow_id') }}
                        {{ Form::hidden('opportunity_id') }}
                        <div class="form-group">
                            {{ Form::label('status', 'Status:'); }}
                            {{ Form::select('status', array_combine(PlacementStatus::statuses(), PlacementStatus::statuses()), null, array('class'=>'form-control')) }}
                        </div>
                        <div class="form-group">                        
                            {{ Form::label('score', 'Score:'); }}
                            {{ Form::select('score', array_combine(PlacementStatus::scores(),PlacementStatus::scores()), null, array('class'=>'form-control')) }}
                            <p class="help-block">5 = I would love to work here, 1 = I would work here only as a last resort</p>
                        </div>
                        <div class="form-group">
                            {{ Form::label('message', 'Any comments?'); }}
                            {{ Form::textarea('message', null, array('class'=>'form-control')) }}
                        </div>
                    </fieldset>
                    {{-- TODO: add event date input conditional on  --}}
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <a href="#" class="btn btn-primary">Update Relationship</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- TODO
    Add Javascript validation to modal input so users don't have to submit to know their input is invalid
 -->