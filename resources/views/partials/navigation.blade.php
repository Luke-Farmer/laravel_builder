<?php $count = $count ?? 1; ?>
<ul class="dropdown-menu0-{{ strval($count) }}">
    @foreach($navigation as $link)
        <li class="nav-item">
            <a href="{{ $link['url'] }}" class="dropdown-item">{{ $link['text'] }}</a>
            @if(!empty($link['children']))
                <?php $count++; ?>
                @include('partials.navigation', ['navigation' => $link['children'], ['count' => $count]])
            @endif
        </li>
    @endforeach
</ul>