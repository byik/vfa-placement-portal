{{-- Requires $label, $url --}}
<div class="row">
    <div class="col-md-6">{{ $label }}</div>
    <div class="col-md-6">
      <form class="navbar-form" role="search" method="get" action="{{ $url }}">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search" id="search">
        <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
    </div>
</div>