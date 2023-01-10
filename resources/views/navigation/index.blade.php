<?php
use App\Services\NavigationService;

$navigationService = new NavigationService();
$navigation = $navigationService->getNavigation();

?>
<x-admin-master>
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">Navigation</p>
            </div>
        </div>
        <div class="row g-0 bg-white">
            <div class="col-12 p-3">
                <div class="row">
                    <ul>
                        @foreach($navigation as $link)
                            <li class="nav-item">
                                @if(empty($link['children']))
                                    <a href="{{ $link['url'] }}" class="nav-link">{{ $link['text'] }}</a>
                                @else
                                    <a href="{{ $link['url'] }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" id="dropdown-{{ $link['text'] }}">{{ $link['text'] }}</a>
                                @endif
                                @if(!empty($link['children']))
                                    <ul class="dropdown-menu ms-0" aria-labelledby="dropdown-{{ $link['text'] }}">
                                        @foreach($link['children'] as $child)
                                            <li class="nav-item">
                                                <a href="{{ $child['url'] }}" class="dropdown-item" id="dropdown-{{ $link['text'] }}">{{ $child['text'] }}</a>
                                                @if(!empty($child['children']))
                                                    @include('partials.navigation', ['navigation' => $child['children']])
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:nth-child(odd) {
            background-color: #e9ecef;
        }
        td {
            padding: 5px;
        }
    </style>
</x-admin-master>
