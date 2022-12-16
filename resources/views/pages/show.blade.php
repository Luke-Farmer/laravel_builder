<x-master>
    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-12">
                <p  style="color: #65fbf8;font-size: 45px;font-weight: 500;line-height: 60px;margin-left: 0px;font-family: Raleway;font-weight:bold;padding:0;"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="p-5" style="background:linear-gradient(to bottom, #1d5e8f, #012257);border-top-left-radius: 10px;border-top-right-radius: 10px;">
                            <p class="hero-heading mb-0" style="text-transform: none;">{{ $page->title }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="p-5 bg-white text-dark" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                            {{ $page->body }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="p-5" style="background:linear-gradient(to bottom, #1d5e8f, #012257);border-radius:10px;">
                    <p class="mb-0 text-start me-3 fw-bold">URL:<span class="float-end fw-normal">{{ $page->slug }}</span></p>
                    <p class="mb-0 text-start me-3 fw-bold">Created At:<span class="float-end fw-normal">{{ date('j M Y',strtotime($page->created_at)) }}</span></p>
                    <p class="mb-0 text-start me-3 fw-bold">Last Updated At:<span class="float-end fw-normal">{{ date('j M Y',strtotime($page->updated_at)) }}</span></p>
                    <div class="admin-buttons">
                        <div class="row mt-5">
                            <div class="col-12 col-lg-6">
                                <a href="{{ route('pages.edit', $page->id) }}" class="button button-small fs-6 w-100" style="min-width:unset!important;">Edit</a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <form class="" action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input href="{{ route('pages.destroy', $page->id) }}" class="button button-small fs-6 w-100" value="Delete" type="submit" style="min-width:unset!important;"></input>
                                </form>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <a href="{{ url('/blog/'.$page->slug) }}" class="button button-small fs-6 w-100" style="min-width:unset!important;">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master>