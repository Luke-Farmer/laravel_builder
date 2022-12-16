<x-admin-master>
    <div class="p-3">
        <form class="mb-0 w-100" action="{{ route('settings.update', 'all') }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Admin Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <label>Development Mode:</label>
                            <select name="enabled" class="edit-page-input p-1">
                                <option value="{{ $enabled }}">
                                    @if($enabled == 1)
                                        Enabled
                                    @else
                                        Disabled
                                    @endif
                                </option>
                                @if($enabled == 1)
                                    <option value="0">
                                        Disbaled
                                    </option>
                                @else
                                    <option value="1">
                                        Enabled
                                    </option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Site Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Business Name:</label>
                                    <input class="edit-page-input p-1" name="company_name" value="{{ $company }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Business Number:</label>
                                    <input class="edit-page-input p-1" name="business_number" value="{{ $businessNumber }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Website Name:</label>
                                    <input class="edit-page-input p-1" name="site_name" value="{{ $name }}">
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col-12 p-3 bg-white">
                                    <label>Company Email:</label>
                                    <input class="edit-page-input p-1" name="site_email" value="{{ $email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="row g-0">
                        <div class="col-12 d-flex bg-dark-blue p-3">
                            <p class="white mb-0">Misc Settings</p>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-12 p-3 bg-white">

                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="p-3 save-box bg-dark-blue">
                        <div class="d-flex">
                            <input href="{{ route('settings.update', 'all') }}" class="white main-button px-3 py-0 w-100" value="Save" type="submit">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-master>
<style>
    textarea {
        background: #D9D9D6;
        box-shadow: 0px 0px 10px 1px rgb(68 88 144 / 10%);
        font-size: 13px;
        border: 1px solid black;
    }
    .edit-page-input {
        font-size: 13px;
        background: #ececec!important;
    }
    * {
        font-family: "Fira Code", monospace;
    }
</style>