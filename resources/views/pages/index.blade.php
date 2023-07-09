<x-admin-master>
    @section('title', 'Pages')
    <div class="p-3 ps-0" style="background: #040D1B;">
        <div class="row g-0">
            <div class="col-12 d-flex p-3 w-100 border-top-radius" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
                <p class="white mb-0">All Pages</p>
                <p class="ms-auto mb-0"><a class="white main-button px-2 py-1" href="/admin/page/create">New Page</a></p>
            </div>
        </div>
        <div class="row g-0 border-bottom-radius" style="background: #D9D9D6;">
            <div class="col-12 p-3">
                <table class="w-100">
                    <thead>
                    <tr>
                        <th>Page Name</th>
                        <th>Page URL</th>
                        <th>Enabled</th>
                        <th>Last Modified</th>
                        <th>Page Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->title }}</td>
                            <td class="w-50">{{ $page->slug }}</td>
                            @if($page->enabled == 1)
                            <td>Published</td>
                            @else
                            <td>Draft</td>
                            @endif
                            <td>{{ $page->updated_at }}</td>
                            <td style="width: 100px;">
                                <a class="text-dark" href="{{ route('pages.edit', $page->id)}}">Edit</a>
                                @if($page->slug == '/')
                                <a target="_blank" class="text-dark" href="/">View</a>
                                @else
                                <a target="_blank" class="text-dark" href="/{{ $page->slug }}">View</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

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