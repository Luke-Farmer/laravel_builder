<x-admin-master>
    <div class="p-3">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="row g-0">
                    <div class="col-12 d-flex bg-dark-blue p-3">
                        <p class="white mb-0">Profile Settings</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-12 p-3 bg-white">
                        <label>Username: ({{ $user->name}})</label>
                        <input class="edit-page-input p-1" name="name" />

                        <label>Email Address: ({{ $user->email }})</label>
                        <input class="edit-page-input p-1" name="email" />

                        <label>Password:</label>
                        <input class="edit-page-input p-1" name="password" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-master>