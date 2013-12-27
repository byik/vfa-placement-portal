{{-- Requires $adminNotes--}}
<div id="admin-notes">
    <div class="container">
        <h3>Admin Notes</h3>
        @if(count($adminNotes))
            <div class="col-xs-12 well">
                @foreach( $adminNotes as $adminNote)
                    @include('partials.indexes.adminNote', array('adminNote' => $adminNote))
                @endforeach
            </div>
        @endif
        <div class="col-xs-12 well">
            @include('partials.forms.adminNote', array('entityId' => $entityId, 'entityType' => $entityType))
        </div>
    </div>
</div>