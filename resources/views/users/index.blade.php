<x-admin-master>
    <div class="p-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row g-0">
                    <div class="col-12 d-flex bg-accent-light p-3">
                        <p class="white mb-0">Admin Users</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-12 p-3 bg-white">
                        <table class="w-100">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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