@section('title', 'Dashboard')
<x-admin-master>
    <div class="p-3 ps-0 mb-0">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5">Views</p>
                    <p class="fs-3">12567</p>
                    <i class="fas fa-arrow-up" style="color: #00660c;"></i>
                    <p class="fs-6 white">3.45% Since last month</p>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5">Visitors</p>
                    <p class="fs-3">6329</p>
                    <i class="fas fa-arrow-down" style="color: #750000;"></i>
                    <p class="fs-6 white">1.55% Since last month</p>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5">Sessions</p>
                    <p class="fs-3">3467</p>
                    <i class="fas fa-arrow-up" style="color: #00660c;"></i>
                    <p class="fs-6 white">8.12% Since last month</p>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="d-flex p-3 d-flex flex-column white" style="background: linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);border-radius:10px;">
                    <p class="fs-5">Bounce Rate</p>
                    <p class="fs-3">25.28%</p>
                    <i class="fas fa-arrow-down" style="color: #750000;"></i>
                    <p class="fs-6 white">8.28% Since last month</p>
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
