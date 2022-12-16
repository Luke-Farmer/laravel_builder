<?php $items = \App\Models\Portfolio::latest()->take(3)->get(); ?>
<div class="col-12">
    <div class="row">
        @foreach($items as $item)
            <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                <div class="portfolio-item-wrapper position-relative">
                    <img src="{{ $item->image }}" class="w-100" style="height: 416px;object-fit:cover;"/>
                    <div class="portfolio-item-content position-absolute p-4">
                        <div class="portfolio-item-content-wrap p-5">
                            <p class="white fs-4">{{ $item->title }}</p>
                            <p class="white clamp">{{ $item->excerpt }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>