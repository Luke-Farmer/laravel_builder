@section('title', 'Dashboard')
<x-admin-master>
    <div class="p-3 ps-0 mb-0">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Views</p>
                    <p class="fs-3 fw-bold">12567</p>
                    <div class="d-flex">
                        <i class="fas fa-arrow-up me-2" style="color: #00660c;margin-top: 2px;"></i>
                        <small class="white mb-0 fw-bold">3.45% Since last month</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Visitors</p>
                    <p class="fs-3 fw-bold">6329</p>
                    <div class="d-flex">
                        <i class="fas fa-arrow-down me-2" style="color: #750000;margin-top: 2px;"></i>
                        <small class="white mb-0 fw-bold">1.55% Since last month</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Sessions</p>
                    <p class="fs-3 fw-bold">3467</p>
                    <div class="d-flex">
                        <i class="fas fa-arrow-up me-2" style="color: #00660c;margin-top: 2px;"></i>
                        <small class="white mb-0 fw-bold">8.12% Since last month</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5 fw-bold">Bounce Rate</p>
                    <p class="fs-3 fw-bold">25.28%</p>
                    <div class="d-flex">
                        <i class="fas fa-arrow-down me-2" style="color: #750000;margin-top: 2px;"></i>
                        <small class="white mb-0 fw-bold">8.28% Since last month</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-12 col-lg-9">
                <div class="p-3" style="background: #D9D9D6;border-radius:10px;">
                    <canvas id="line-chart"></canvas>
                    <script
                            src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
                    <script>
                        new Chart(document.getElementById("line-chart"), {
                            type : 'line',
                            data : {
                                labels : [ 'January', 'Febuary', 'March', 'April', 'May', 'June',
                                    'July', 'August', 'September', 'October', 'November', 'December' ],
                                datasets : [
                                    {
                                        data : [ 1860, 2050, 9321, 7516, 11107,
                                            15332, 9633, 6421, 4783, 5478 ],
                                        label : "Total Page Views",
                                        borderColor : "#3cba9f",
                                        fill : false
                                    }]
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
</div>-->
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
