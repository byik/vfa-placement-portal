{{-- Requires $adminNote --}}
<div class="col-xs-12 note well">
    <p>{{ Parser::linkUrlsInText($adminNote->content) }}</p>
    <span class="pull-right">
        <strong><i class="fa fa-comments-o"></i> {{ $adminNote->admin->user->firstName . ' ' . $adminNote->admin->user->lastName}}</strong>
        <em>{{ Carbon::createFromFormat('Y-m-d H:i:s', $adminNote->created_at)->diffForHumans() }}</em>
    </span>
</div>