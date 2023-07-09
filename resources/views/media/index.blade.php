<x-admin-master>
    @section('title', 'Media Library')
    <div class="p-3 ps-0">
        <div class="row g-0">
            <div class="col-12 d-flex p-3 w-100 border-top-radius" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
                <p class="white mb-0">Images</p>
            </div>
        </div>
        <div class="row g-0 border-bottom-radius" style="background: #D9D9D6;">
            <div class="col-12 p-3">
                <form method="POST" action="/admin/media" id="contact-form" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="myFile" name="image" required />
                    <button type="submit" class="button-main align-self-start">Add</button>
                </form>
                <?php $images = \App\Models\Images::orderBy('updated_at', 'desc')->paginate(12); ?>
                <div class="row">
                    @foreach($images as $image)
                        <div class="col-12 col-lg-2">
                            <div class="mb-4" style="border: 3px solid black;border-radius: 10px;">
                                <img src="/img/{{ $image->image }}" class="w-100" style="height: 236px;object-fit: cover;" loading="lazy" />
                                <p class="py-1 text-center white mb-0" style=";background: #000;">/img/{{ $image->image }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-auto me-auto ps-3">
                {{ $images->links() }}
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
