<x-admin-master>
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">Navigation</p>
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
                <div class="row">
                    <ul>
                        @foreach($NavItems as $nav_item)
                            <li>{{ $nav_item->name }} - {{ $nav_item->url }}</li>
                        @endforeach
                    </ul>
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
