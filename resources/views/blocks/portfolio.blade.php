<?php $items = \App\Models\Portfolio::latest()->get(); ?>
<div class="col-12">
    <div class="row portfolio-wrap">
        @foreach($items as $item)
            <div class="col-12">
                <div class="portfolio-item-wrapper position-relative d-flex">
                    <img src="{{ $item->image }}" class="rounded" style="width: 275px;height: 155px;object-fit:cover;"/>
                    <div class="portfolio-item-content ps-4">
                        <div class="portfolio-item-content-wrap">
                            <p class="white fs-4">{{ $item->title }}</p>
                            <p class="white clamp">{{ $item->excerpt }}</p>
                            <a href="{{ $item->slug }}" class="button-new border-0 p-0">View Project</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .portfolio-wrap .col-12 .portfolio-item-wrapper {
        padding-bottom: 0.5rem;
        padding-top: 0.5rem;
        border-bottom: solid 1px #6b9fb4;
    }
    .portfolio-wrap .col-12:last-child .portfolio-item-wrapper {
        padding-bottom: 0!important;
    }
</style>