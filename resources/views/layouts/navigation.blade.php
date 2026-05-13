<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
	@if(auth()->user()->settings)
		{{ auth()->user()->settings->business_name }}
	@else
		{{ auth()->user()->name }}
	@endif
	</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
    <div class="w w-md-100 me-5 pe-5 m-md-0 p-md-0">

		@if(auth()->user()->subscribed('pro-plan'))
		<span class="p-3 mx-2 text-success">
            <strong>Pro plan</strong>
        </span>
		@else
		<a href="{{ route('billing') }}" class="p-3 mx-2 text-info">
            <strong>Upgrade</strong>
        </a>

		@endif
	</div>
    <div class="navbar-nav d-none d-md-flex">
        <div class="nav-item text-nowrap">
            <div class="nav-link px-3" href="#">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">

                        {{ __(' Log Out ') }}
                        <span class="ml-2" data-feather="log-out"></span>
                    </x-nav-link>
                </form>
            </div>
        </div>
    </div>
</header>