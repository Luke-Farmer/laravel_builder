<div class="py-3 d-flex" style="height: 100px; background: #040D1B;">
    <div class="d-flex align-items-center">
        @if(Session::has('message'))
        <p class="text-white mb-0 p-3" style="background: #CBA052;">{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="ms-auto d-flex">
        <p class="mb-0">Hey, <strong>{{ Auth::user()->name }}</strong></p>
        <form class="mb-0" method="POST" action="{{ route('logout') }}">
            @csrf
            <input href="/" class="white" value="Logout" type="submit">
        </form>
    </div>
</div>