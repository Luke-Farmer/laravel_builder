<div class="py-3 d-flex" style="height: 100px; background: #040D1B;">
    <div class="d-flex align-items-center">
        @if(Session::has('message'))
        <p class="text-white mb-0 p-3" style="background: #CBA052;">{{ Session::get('message') }}</p>
        @endif
    </div>
    <p class="my-auto fs-3 white fw-bold ps-3">@yield('title')</p>
    <div class="ms-auto d-flex px-3">
        <div class="d-flex flex-column me-3 justify-content-center align-items-end">
            <p class="mb-0 white"><strong>{{ Auth::user()->name }}</strong></p>
            <form class="mb-0" method="POST" action="{{ route('logout') }}">
                @csrf
                <input href="/" class="white" value="Logout" type="submit" style="background: none;border: none;font-size: 12px;padding: 0px;">
            </form>
        </div>
        <img src="/storage/users-avatar/{{ Auth::user()->avatar }}" class="m-auto" style="height:50px;width: 50px;object-fit:contain;border-radius:50%;background:linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
    </div>
</div>