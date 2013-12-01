<tr>
    <td><a data-toggle="modal" href="#pitch-modal-{{ $opportunity->id }}" class="btn btn-default btn-large modal-btn">Pitch</a></td>
    <td><a href="{{ URL::to('/opportunities/'.$opportunity->id) }}">{{ $opportunity->title }}</a></td>
    <td><a href="{{ URL::to('/companies/'.$opportunity->company->id) }}">{{ $opportunity->company->name }}</a></td>
    <td>{{ $opportunity->city }}</td>
    <td>{{ $opportunity->created_at }}</td>
</tr>
<!-- Modal -->
<div class="modal" id="pitch-modal-{{ $opportunity->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" class="btn close btn-default" data-dismiss="modal">&times;</a>
                <h4 class="modal-title">Pitch for the {{ $opportunity->title }} Opportunity</h4>
            </div>
            <div class="modal-body">
                <h1>TODO: put a form here</h1>
            </div>
            <div class="modal-footer">
                <a href="" class="btn btn-default" data-dismiss="modal">Cancel</a>
                <a href="" class="btn btn-primary placement-status-submit">Submit</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->