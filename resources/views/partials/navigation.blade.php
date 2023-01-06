<ul>
    @foreach($navigation as $link)
        <li>
            <a href="{{ $link['url'] }}">{{ $link['text'] }}</a>
            @if(!empty($link['children']))
                @include('partials.navigation', ['navigation' => $link['children']])
            @endif
        </li>
    @endforeach
</ul>