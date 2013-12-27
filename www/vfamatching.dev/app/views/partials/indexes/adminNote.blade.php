{{-- Requires $adminNote --}}
<div class="col-xs-12 note well">
    <span>
        <strong><i class="fa fa-comments-o"></i> {{ $adminNote->admin->user->firstName . ' ' . $adminNote->admin->user->lastName}}</strong>
        <em>{{ Carbon::createFromFormat('Y-m-d H:i:s', $adminNote->created_at)->diffForHumans() }}</em>
    </span>
    <p>{{ Parser::linkUrlsInText($adminNote->content) }}</p>
</div>