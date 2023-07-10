<x-admin-master>
    <div class="p-3" style="background: #D9D9D6;">
        <div class="row g-0">
            <div class="col-4 d-flex bg-dark-blue p-3">
                <p class="white mb-0">Home Page - Total Views - Last 14 Days</p>
            </div>
        </div>
        <div class="row g-0 mb-3">
            <div class="col-4 p-3 bg-white">
                <table class="w-100">
                    <thead>
                    <tr>
                        <th>Views</th>
                        <th>Visitors</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                            dd($analytics)
                                $totalViews = 0;
                                $totalVisitors = 0;
                                for($i = 0; $i < 12; $i++) {
                                    $totalViews += $analytics[0][$i]['pageViews'] ?? 0;
                                    $totalVisitors += $analytics[0][$i]['visitors'] ?? 0;
                                }
                            @endphp
                            <td>{{ $totalViews }}</td>
                            <td>{{ $totalVisitors }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row g-0">
            <div class="col-4 d-flex bg-dark-blue p-3">
                <p class="white mb-0">Home Page - Visitors & Page Views - Last 14 Days</p>
            </div>
        </div>
        <div class="row g-0">
            <div class="col-4 p-3 bg-white"3q>
                <table class="w-100">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>URL</th>
                        <th>Visitors</th>
                        <th>Views</th>
                    </tr>
                    </thead>
                    <tbody>
                        @for($i = 13; $i >= 0; $i--)
                            <tr>
                                <td>{{ $analytics[0][$i]['date'] ?? 'N/A'}}</td>
                                <td>{{ $analytics[0][$i]['pagePath'] ?? '/'}}</td>
                                <td>{{ $analytics[0][$i]['visitors'] ?? '0'}}</td>
                                <td>{{ $analytics[0][$i]['pageViews'] ?? '0'}}</td>
                            </tr>
                        @endfor
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
            height: 28px;
        }
    </style>
</x-admin-master>