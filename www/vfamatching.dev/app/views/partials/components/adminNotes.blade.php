{{-- Requires $adminNotes--}}
<div id="notes">
    <div class="container">
        @if(count($adminNotes))
            <div class="col-xs-12 well">
                <h3>Admin Notes</h3>
                @foreach( $adminNotes as $adminNote)
                    @include('partials.indexes.adminNote', array('adminNote' => $adminNote))
                @endforeach
                @include('partials.forms.adminNote', array('entityId' => $entityId, 'entityType' => $entityType))
            </div>
        @endif
    </div>
</div>