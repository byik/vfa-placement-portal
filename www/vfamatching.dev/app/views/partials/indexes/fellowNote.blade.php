{{-- Requires $fellow --}}
<div class="col-xs-12 note well">
    <span>
        <strong><i class="fa fa-comments-o"></i> {{ $fellowNote->fellow->user->firstName . ' ' . $fellowNote->fellow->user->lastName}}</strong>
        <em>{{ Carbon::createFromFormat('Y-m-d H:i:s', $fellowNote->created_at)->diffForHumans() }}</em>
    </span>
    <p>{{ Parser::linkUrlsInText($fellowNote->content) }}</p>
</div>