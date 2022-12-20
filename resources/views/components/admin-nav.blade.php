<div class="py-3 bg-accent d-flex" style="height: 100px;">
    <div class="d-flex align-items-center">
        @if(Session::has('message'))
        <p class="text-white mb-0 p-3" style="background: #CBA052;">{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="ms-auto d-flex">
        <form class="mb-0 d-flex align-items-center" method="POST" action="{{ route('logout') }}">
            @csrf
            <input href="/" class="white main-button p-0 me-3 fs-5 px-4 py-1" value="Logout" type="submit">
        </form>
    </div>
</div>