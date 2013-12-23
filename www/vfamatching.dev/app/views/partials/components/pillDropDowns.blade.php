{{-- Requires: $pills, where pill->label, pill->dropdownItems --}}
@if(count($pills))
<ul class="nav nav-pills">
    @foreach($pills as $pill)
        <li class="dropdown">
            <a data-toggle="dropdown" role="button" href="#">{{ $pill->label }} <span class="caret"></span></a>
            @if(count($pill->dropdownItems))
                <ul class="dropdown-menu" role="menu">
                    @foreach($pill->dropdownItems as $dropdownItem)
                        <li><a href="{{ $dropdownItem->url }}">
                            {{ $dropdownItem->label}}
                            @if(isset($dropdownItem->icon))
                                <i class="fa fa-{{ $dropdownItem->icon }}"></i>
                            @endif
                        </a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
@endif