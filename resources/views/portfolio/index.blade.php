<x-admin-master>
    @section('title', 'Portfolio Items')
    <div class="p-3">
        <div class="row g-0">
            <div class="col-12 d-flex bg-accent-light p-3 w-100">
                <p class="white mb-0">All Portfolio Items</p>
                <p class="ms-auto mb-0"><a class="white main-button px-2 py-1" href="/admin/portfolio/create">New Portfolio Item</a></p>
            </div>
        </div>
        <div class="row g-0 bg-white">
            <div class="col-12 p-3">
                <table class="w-100">
                    <thead>
                    <tr>
                        <th>Portfolio Name</th>
                        <th>Portfolio URL</th>
                        <th>Enabled</th>
                        <th>Last Modified</th>
                        <th>Portfolio Tools</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $portfolio->title }}</td>
                            <td class="w-50">{{ $portfolio->slug }}</td>
                            @if($portfolio->enabled == 1)
                                <td>Published</td>
                            @else
                                <td>Draft</td>
                            @endif
                            <td>{{ $portfolio->updated_at }}</td>
                            <td style="width: 100px;">
                                <a class="text-dark" href="{{ route('portfolio.edit', $portfolio->id)}}">Edit</a>
                                @if($portfolio->slug == '/')
                                    <a target="_blank" class="text-dark" href="/">View</a>
                                @else
                                    <a target="_blank" class="text-dark" href="/{{ $portfolio->slug }}">View</a>
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