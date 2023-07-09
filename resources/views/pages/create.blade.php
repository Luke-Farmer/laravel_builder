<x-admin-master>
    @section('title', 'New Page')
    <form class="p-3 ps-0 mb-0" action="{{ route('pages.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row g-0 border-top-radius" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
                    <div class="col-12 p-3 d-flex">
                        <p class="white mb-0 w-100">Page Settings</p>
                        <div class="d-flex">
                            <input href="{{ route('pages.store') }}" class="white fs-6 p-0 me-3 plain-button" value="Create" type="submit">
                            <a href="{{ route('dashboard') }}" class="white fs-6 p-0 ms-3 text-center">Cancel</a>
                        </div>
                    </div>
                </div>
                <div class="row g-0 p-3 border-bottom-radius" style="background: #D9D9D6;">
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

                </div>
            </div>
        </div>
    </form>
</x-admin-master>