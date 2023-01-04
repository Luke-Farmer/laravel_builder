<x-admin-master>
    <form class="p-3" action="{{ route('pages.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row g-0">
                    <div class="col-12">
                        <p class="white mb-0 bg-accent-light w-100 p-2">Page Settings</p>
                    </div>
                </div>
                <div class="row g-0 bg-white p-3">
                    <div class="col-12 pb-3">
                        <label class="mb-2">URL:</label>
                        <input class="edit-page-input p-1" type="text" label="slug" name="slug" value="">
                    </div>
                    <div class="col-12 pb-3">
                        <select name="enabled" class="edit-page-input p-1">
                            <option value="0">
                                Draft
                            </option>
                            <option value="1">
                                Published
                            </option>
                        </select>
                    </div>

                    <div class="col-12 pb-3">
                        <select name="page_template">
                            @foreach(\App\Models\Page::all() as $page)

                                @if($page->use_template != 0)
                                    <option>
                                        {{ $page->template->page_title }}
                                    </option>
                                @else
                                    <option>
                                        {{ $page->template->page_title }}
                                    </option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">Page Name:</label>
                        <input class="edit-page-input p-1" type="text" label="title" name="title" value="">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">SEO Meta Title:</label>
                        <input class="edit-page-input p-1" type="text" label="seo_title" name="seo_title" value="">
                    </div>
                    <div class="col-12 pb-3">
                        <label class="mb-2">SEO Meta Description:</label>
                        <input class="edit-page-input p-1" type="text" label="seo_description" name="seo_description" value="">
                    </div>
                    <div class="col-12">
                        <div class="position-relative" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;">
                            <textarea class="w-100" id="editor" style="min-height:800px;" label="body" type="text" name="body" spellcheck="false" ></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-2">
                <div class="p-3 save-box bg-accent-light">
                    <div class="d-flex">
                        <input href="{{ route('pages.store') }}" class="white main-button w-100 p-0 me-3" value="Create" type="submit">
                        <a href="{{ route('dashboard') }}" class="white main-button w-100 p-0 ms-3 text-center">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-admin-master>