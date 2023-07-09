<div class="py-3 d-flex" style="height: 100px; background: #040D1B;">
    <div class="d-flex align-items-center">
        @if(Session::has('message'))
        <p class="text-white mb-0 p-3" style="background: #CBA052;">{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="ms-auto d-flex">
        <div class="d-flex flex-column">
            <p class="mb-0">Hey, <strong>{{ Auth::user()->name }}</strong></p>
            <form class="mb-0" method="POST" action="{{ route('logout') }}">
                @csrf
                <input href="/" class="white" value="Logout" type="submit">
            </form>
        </div>
        <img src="/storage/users-avatar/{{ Auth::user()->avatar }}" class="mx-auto" style="height:100px;width: 100px;object-fit:contain;border-radius:50%;background:linear-gradient(144.39deg, #ffffff -278.56%, #6d6d6d -78.47%, #11101d 91.61%);">
    </div>
</div>