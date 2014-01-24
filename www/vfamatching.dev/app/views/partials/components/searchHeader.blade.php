{{-- Requires $label, $url --}}
<div class="row">
    <div class="col-md-6">
        {{ $title }} <small>(<em> {{ $results }} of {{ $total }}</em>)</small>
    </div>
    <div class="col-md-6">
      <form class="navbar-form" role="search" method="get" action="{{ $url }}">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search {{ isset($type) ? ucfirst(str_plural($type)) : "" }}" name="search" id="search">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </div>
        <?php $queryData = Parser::extractDataFromQueryString($_SERVER['QUERY_STRING']); ?>
        @foreach($queryData as $name => $value)
          @include('partials.components.hidden-input', array('name'=>$name, 'value'=>$value))
        @endforeach
      </div>
    </form>
    </div>
</div>

<!-- Preserve querystring parameters -->
