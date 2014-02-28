{{-- Requires $adminNotes--}}
<div id="notes">
    <div class="container">
        <div class="col-xs-12 well">
            @if(count($adminNotes))
                <h3>Admin Notes</h3>
                @foreach( $adminNotes as $adminNote)
                    @include('partials.indexes.adminNote', array('adminNote' => $adminNote))
                @endforeach
            @endif
            @include('partials.forms.adminNote', array('entityId' => $entityId, 'entityType' => $entityType))
        </div>
    </div>
</div>