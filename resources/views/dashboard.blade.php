@section('title', 'Dashboard')
<x-admin-master>
    <div class="p-3 ps-0 mb-0">
        <div class="row g-3">
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Total Page Views</p>
                    @php
                        $totalViews = 0;
                        for($i = 0; $i < 12; $i++) {
                            $totalViews += $stats[$i]['screenPageViews'] ?? 0;
                        }
                    @endphp
                    <p class="fs-3 fw-bold">{{ $totalViews }}</p>
                    <div class="d-flex">
                        @php
                            $twoWeeks = 0;
                            for($i = 0; $i < 12; $i++) {
                                $twoWeeks += $stats[$i]['screenPageViews'] ?? 0;
                            }
                            $fourWeeks = 0;
                            for($i = 0; $i < 22; $i++) {
                                $fourWeeks += $oldStats[$i]['screenPageViews'] ?? 0;
                            }
                            $previousWeeks = $twoWeeks - $fourWeeks;
                            $change = $previousWeeks / $fourWeeks * 100;
                            if($change < 0) {
                                echo "<i class='fas fa-arrow-down me-2' style='color: #750000;margin-top: 2px;'></i>";
                            }
                            else {
                                echo "<i class='fas fa-arrow-up me-2' style='color: #00660c;margin-top: 2px;'></i>";
                            }
                        @endphp
                        <small class="white mb-0 fw-bold">{{ $change }}% In the last 2 weeks</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Total Visitors</p>
                    @php
                        $allVisitors = $usersTwoWeeks[0]['activeUsers'] + $usersTwoWeeks[1]['activeUsers'];
                    @endphp
                    <p class="fs-3 fw-bold">{{ $allVisitors }}</p>
                    <div class="d-flex">
                        @php
                            $totalWeeksTwo = $usersTwoWeeks[0]['activeUsers'] ?? 0 + $usersTwoWeeks[1]['activeUsers'] ?? 0;
                            $totalWeeksFour = $usersFourWeeks[0]['activeUsers'] ?? 0 + $usersFourWeeks[1]['activeUsers'] ?? 0;
                            $previousWeeks = $totalWeeksTwo - $totalWeeksFour;
                            if($totalWeeksFour < 1){
                                $change = 0;
                            } else {
                                $change = $previousWeeks / ($totalWeeksFour[0]['activeUsers']) * 100;
                            }
                            if($change < 0) {
                                echo "<i class='fas fa-arrow-down me-2' style='color: #750000;margin-top: 2px;'></i>";
                            }
                            else {
                                echo "<i class='fas fa-arrow-up me-2' style='color: #00660c;margin-top: 2px;'></i>";
                            }
                        @endphp
                        <small class="white mb-0 fw-bold">{{ $change }}% In the last 2 weeks</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">New Users</p>
                    <p class="fs-3 fw-bold">{!! $usersTwoWeeks[0]['activeUsers'] ?? 0 !!}</p>
                    <div class="d-flex">
                        @php
                            $previousWeeks = ($usersTwoWeeks[0]['activeUsers'] ?? 0) - ($usersFourWeeks[0]['activeUsers'] ?? 0);
                            $divideTest = $usersFourWeeks[0]['activeUsers'] ?? 0;
                            if($divideTest < 1){
                                $change = 0;
                            } else {
                                $change = $previousWeeks / ($usersFourWeeks[0]['activeUsers']) * 100;
                            }
                            if($change < 0) {
                                echo "<i class='fas fa-arrow-down me-2' style='color: #750000;margin-top: 2px;'></i>";
                            }
                            else {
                                echo "<i class='fas fa-arrow-up me-2' style='color: #00660c;margin-top: 2px;'></i>";
                            }
                        @endphp
                        <small class="white mb-0 fw-bold">{{ $change }}% In the last 2 weeks</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Returning Users</p>
                    <p class="fs-3 fw-bold">{!! $usersTwoWeeks[1]['activeUsers'] ?? 0 !!}</p>
                    <div class="d-flex">
                        @php
                            $previousWeeks = ($usersTwoWeeks[1]['activeUsers'] ?? 0) - ($usersFourWeeks[1]['activeUsers'] ?? 0);
                            $divideTest = $usersFourWeeks[1]['activeUsers'] ?? 0;
                            if($divideTest < 1){
                                $change = 0;
                            } else {
                                $change = $previousWeeks / ($usersFourWeeks[1]['activeUsers']) * 100;
                            }
                            if($change < 0) {
                                echo "<i class='fas fa-arrow-down me-2' style='color: #750000;margin-top: 2px;'></i>";
                            }
                            else {
                                echo "<i class='fas fa-arrow-up me-2' style='color: #00660c;margin-top: 2px;'></i>";
                            }
                        @endphp
                        <small class="white mb-0 fw-bold">{{ $change }}% In the last 2 weeks</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 pt-3">
            <div class="col-12 col-lg-9">
                <div class="p-3" style="background: #D9D9D6;border-radius:10px;">
                    <canvas id="line-chart"></canvas>
                    <script
                            src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
                    <script>
                        new Chart(document.getElementById("line-chart"), {
                            type : 'line',
                            data : {
                                labels : [ '{{ $dates[13] }}', '{{ $dates[12] }}', '{{ $dates[11] }}', '{{ $dates[10] }}', '{{ $dates[9] }}', '{{ $dates[8] }}', '{{ $dates[7] }}',
                                    '{{ $dates[6] }}', '{{ $dates[5] }}', '{{ $dates[4] }}', '{{ $dates[3] }}', '{{ $dates[2] }}', '{{ $dates[1] }}', '{{ $dates[0] }}' ],
                                datasets : [
                                    {
                                        data : [ {{ $graphData[12][0]['screenPageViews'] ?? 0 }}, {{ $graphData[11][0]['screenPageViews'] ?? 0 }}, {{ $graphData[10][0]['screenPageViews'] ?? 0 }},
                                            {{ $graphData[9][0]['screenPageViews'] ?? 0 }}, {{ $graphData[8][0]['screenPageViews'] ?? 0 }}, {{ $graphData[7][0]['screenPageViews'] ?? 0 }}, {{ $graphData[6][0]['screenPageViews'] ?? 0 }},
                                            {{ $graphData[5][0]['screenPageViews'] ?? 0 }}, {{ $graphData[4][0]['screenPageViews'] ?? 0 }}, {{ $graphData[3][0]['screenPageViews'] ?? 0 }}, {{ $graphData[2][0]['screenPageViews'] ?? 0 }},
                                            {{ $graphData[1][0]['screenPageViews'] ?? 0 }}, {{ $graphData[0][0]['screenPageViews'] ?? 0 }} ],
                                        label : "Total Page Views",
                                        borderColor : "#3cba9f",
                                        fill : false,
                                        tension: 0.25
                                    },
                                    {
                                        data : [ {{ $graphUsers[12][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[11][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[10][0]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[9][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[8][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[7][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[6][0]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[5][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[4][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[3][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[2][0]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[1][0]['activeUsers'] ?? 0 }}, {{ $graphUsers[0][0]['activeUsers'] ?? 0 }} ],
                                        label : "New Users",
                                        borderColor : "#793900f",
                                        fill : false,
                                        tension: 0.25
                                    },
                                    {
                                        data : [ {{ $graphUsers[12][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[11][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[10][1]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[9][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[8][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[7][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[6][1]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[5][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[4][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[3][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[2][1]['activeUsers'] ?? 0 }},
                                            {{ $graphUsers[1][1]['activeUsers'] ?? 0 }}, {{ $graphUsers[0][1]['activeUsers'] ?? 0 }} ],
                                        label : "Returning Users",
                                        borderColor : "#793900f",
                                        fill : false,
                                        tension: 0.25
                                    },
                                    {
                                        data : [ {{ $graphData[12][0]['activeUsers'] ?? 0 }}, {{ $graphData[11][0]['activeUsers'] ?? 0 }}, {{ $graphData[10][0]['activeUsers'] ?? 0 }},
                                            {{ $graphData[9][0]['activeUsers'] ?? 0 }}, {{ $graphData[8][0]['activeUsers'] ?? 0 }}, {{ $graphData[7][0]['activeUsers'] ?? 0 }}, {{ $graphData[6][0]['activeUsers'] ?? 0 }},
                                            {{ $graphData[5][0]['activeUsers'] ?? 0 }}, {{ $graphData[4][0]['activeUsers'] ?? 0 }}, {{ $graphData[3][0]['activeUsers'] ?? 0 }}, {{ $graphData[2][0]['activeUsers'] ?? 0 }},
                                            {{ $graphData[1][0]['activeUsers'] ?? 0 }}, {{ $graphData[0][0]['activeUsers'] ?? 0 }} ],
                                        label : "Total Visitors",
                                        borderColor : "#460069",
                                        fill : false,
                                        tension: 0.25
                                    }
                                ]
                            },
                            options : {
                                title : {
                                    display : true,
                                    text : 'Chart JS Line Chart Example'
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-top-radius p-3" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
                    <p class="white fs-5 mb-0 fw-bold">Oldest Reminders</p>
                </div>
                <div class="border-bottom-rounded" style="background: #D9D9D6;">
                    <?php $list = \App\Models\Todo::orderBy('created_at', 'desc')->take(5)->get(); ?>
                    @foreach($list as $item)
                        <li class="bg-white p-3" style="list-style: none;">
                            <strong>{{ $item->name }} - </strong>{{ $item->body }}
                            <div class="d-flex">
                                <form class="mb-0 w-100 mt-3" action="" method="POST">
                                    @csrf
                                    <input value="{{ $item->name }}" type="text" name="name" class="d-none"/>
                                    <input class="image-button" value="Delete" name="delete" type="submit" onclick="var result = confirm('Want to delete?');">
                                </form>
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!--<div class="p-3">
   <div class="row g-0">
        <div class="col-12 d-flex bg-accent-light p-3 w-100">
            <p class="white mb-0">To Do List</p>
        </div>
    </div>
    <div class="row g-0 bg-white">
        <div class="col-12 p-3">
            <div class="row">
                <form method="POST" action="/admin/dashboard" id="contact-form" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-2">Task Name</label>
                            <input type="text" class="edit-page-input p-1" name="name"/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-2">Task Description</label>
                            <textarea name="body" class="edit-page-input p-1"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" name="create" class="white main-button-light-bg py-1">Add</button>
                    </div>
                </form>
            </div>
            <?php $list = \App\Models\Todo::all() ?>
            @foreach($list as $item)
                <li class="bg-white mb-5" style="list-style: none;">
                    <strong>{{ $item->name }} - </strong>{{ $item->body }}
                    <div class="d-flex">
                        <form class="mb-0 w-100 mt-3" action="" method="POST">
                            @csrf
                            <input value="{{ $item->name }}" type="text" name="name" class="d-none"/>
                            <input class="white main-button-light-bg py-1" value="Delete" name="delete" type="submit" onclick="var result = confirm('Want to delete?');">
                        </form>
                    </div>
                </li>
            @endforeach
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
