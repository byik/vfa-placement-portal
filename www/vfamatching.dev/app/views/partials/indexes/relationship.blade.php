<div class="col-md-4">
	<div class="row">
		<div class="col-xs-6">
            {{ $pieChart }}
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
            btn-primary btn-large">Update</a>
        </div>
	</div>		
</div>

<!-- Modal -->
<div class="modal" id="relationship-update-modal-{{ $relationship->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Update Progress: {{ $relationship->opportunity->title }}</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                <a href="#" class="btn btn-primary">Update Relationship</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->