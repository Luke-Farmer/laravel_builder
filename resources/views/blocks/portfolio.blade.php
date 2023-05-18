<?php $items = \App\Models\Portfolio::latest()->get(); ?>
<div class="col-12">
    <div class="row">
        @foreach($items as $item)
            <div class="col-12 mb-3 mb-lg-0">
                <div class="portfolio-item-wrapper position-relative d-flex">
                    <img src="{{ $item->image }}" class="rounded" style="width: 275px;height: 150px;object-fit:cover;"/>
                    <div class="portfolio-item-content ps-4">
                        <div class="portfolio-item-content-wrap">
                            <p class="white fs-4">{{ $item->title }}</p>
                            <p class="white clamp">{{ $item->excerpt }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>