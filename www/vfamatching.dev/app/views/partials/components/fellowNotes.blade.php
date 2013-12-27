{{-- Requires $fellowNotes--}}
<div id="notes">
    <div class="container">
        <h3>Fellow Notes</h3>
        @if(count($fellowNotes))
            <div class="col-xs-12 well">
                @foreach( $fellowNotes as $fellowNote)
                    @include('partials.indexes.fellowNote', array('fellowNote' => $fellowNote))
                @endforeach
            </div>
        @endif
        <div class="col-xs-12 well">
            @include('partials.forms.fellowNote', array('entityId' => $entityId, 'entityType' => $entityType))
        </div>
    </div>
</div>