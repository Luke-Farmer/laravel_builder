<ul>
    @foreach($navigation as $link)
        <li>
            <a href="{{ $link['slug'] }}">{{ $link['menu_title'] }}</a>
            @if(!empty($link['children']))
                @include('partials.navigation', ['navigation' => $link['children']])
            @endif
        </li>
    @endforeach
</ul>