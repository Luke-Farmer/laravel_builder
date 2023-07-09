<x-admin-master>
    @section('title', 'Media Library')
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">Images</p>
            </div>
        </div>
        <div class="row g-0 bg-white">
            <div class="col-12 p-3">
                <form method="POST" action="/admin/media" id="contact-form" enctype="multipart/form-data">
                    @csrf
                    <label class="mt-3">Featured Image</label>
                    <input type="file" id="myFile" name="image" required />
                    <button type="submit" class="button-main align-self-start">Add</button>
                </form>
                <?php $images = \App\Models\Images::all() ?>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-12 col-lg-2">
                            <div class="mb-4" style="">
                                <img src="/img/{{ $image->image }}" class="w-100" style="box-shadow: 0px 0px 1px 1px #153248;height: 236px;object-fit: cover;" loading="lazy" />
                                <p class="py-1 text-center white" style="box-shadow: 0px 0px 1px 1px #153248;background: #153248;">/img/{{ $image->image }}</p>
                            </div>
                        </div>
                    @endforeach
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
