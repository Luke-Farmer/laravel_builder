<?php $items = \App\Models\Portfolio::latest()->get(); ?>
<div class="p-5 rounded" style="background:linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
    <div class="d-flex align-items-center mb-4">
        <img src="/img/1684416388.png" class="mb-2" style="width: 50px;height: 50px;" />
        <p class="fs-2 fw-bold white mb-0 ps-2" style="bottom:0;left:0;">Web Design</p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row portfolio-wrap">
                @foreach($items as $item)
                    @if($item->category == "Web Design")
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
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .portfolio-wrap .col-12 .portfolio-item-wrapper {
        padding-bottom: 1rem;
        padding-top: 1rem;
        border-bottom: solid 1px #6b9fb4;
    }
    .portfolio-wrap .col-12:last-child .portfolio-item-wrapper {
        padding-bottom: 0!important;
        border-bottom: 0!important;
    }
    .portfolio-wrap .col-12:first-child .portfolio-item-wrapper {
        padding-top: 0!important;
    }
</style>