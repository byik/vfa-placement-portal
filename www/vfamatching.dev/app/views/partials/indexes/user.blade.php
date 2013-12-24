<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
                    <h3><strong>{{ $user->firstName . ' ' . $user->lastName }}</strong></h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <h4><i class="fa fa-user"></i> {{ $user->role }}</h4>
            <h4><small><strong><em>{{ $user->email }}</em></strong></small></h4>
            @if(isset($user->lastLogin))
            <strong>Last login: </strong>{{ Carbon::createFromFormat('Y-m-d H:i:s', $user->lastLogin)->diffForHumans(); }}
            @else
            <strong>Last login: </strong>Never
            @endif
        </div>
    </div>
</div>