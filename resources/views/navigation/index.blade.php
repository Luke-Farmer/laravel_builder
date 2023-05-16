<?php
use App\Services\NavigationService;
use App\Models\Settings;

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
                    <div class="col-12 col-lg-6">
                        <ul class="" style="list-style:none;">
                            @foreach($navigation as $link)
                                <li class="nav-item">
                                    @if(empty($link['children']))
                                        {{ $link['text'] }} - {{ $link['url'] }} - {{ $link['id'] }}
                                    @else
                                        {{ $link['text'] }} - {{ $link['url'] }} - {{ $link['id'] }}
                                    @endif
                                    @if(!empty($link['children']))
                                        <ul class="" style="list-style:none;">
                                            @foreach($link['children'] as $child)
                                                <li class="">
                                                    {{ $child['text'] }} - {{ $child['url'] }} - {{ $child['id'] }}
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
                    <div class="col-12 col-lg-6">

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="position-relative" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                    <textarea class="w-100" id="editor" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" >{{ $code->value }}</textarea>
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
