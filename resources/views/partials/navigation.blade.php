<ul class="dropdown-menu">
    @foreach($navigation as $link)
        <li class="nav-item">
            <a href="{{ $link['url'] }}" class="dropdown-item">{{ $link['text'] }}</a>
            @if(!empty($link['children']))
                @include('partials.navigation', ['navigation' => $link['children']])
            @endif
        </li>
    @endforeach
</ul>