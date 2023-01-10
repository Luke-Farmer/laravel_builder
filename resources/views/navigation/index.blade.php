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
                                    {{ $link['text'] }}
                                @else
                                    {{ $link['text'] }}
                                @endif
                                @if(!empty($link['children']))
                                    <ul class="">
                                        @foreach($link['children'] as $child)
                                            <li class="">
                                                {{ $child['text'] }}
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
