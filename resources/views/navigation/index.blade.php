<x-admin-master>
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">Navigation</p>
            </div>
        </div>
        <div class="row g-0 bg-white">
            <div class="col-12 p-3">
                <div class="row">
                    <ul>
                        @foreach($categories as $category)
                            <li>{{ $category->name }}</li>
                            <ul>
                                @foreach($nav as $nav_item)
                                    @if($nav_item->category_id == $category->id)
                                        <li>{{ $nav_item->name }} - {{ $nav_item->url }}</li>
                                    @endif
                                @endforeach
                            </ul>
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
