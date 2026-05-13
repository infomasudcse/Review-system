<header>
	<nav class="navbar navbar-expand-lg navbar-light w-100">
		<div class="container px-3">
			<a class="navbar-brand nav-logo" href="/"><img src="{{ asset('assets/images/review-boost-logo.png') }}" alt=""></a>
			<button class="navbar-toggler offcanvas-nav-btn" type="button">
				<i class="bi bi-list"></i>
			</button>
			<div class="offcanvas offcanvas-start offcanvas-nav" style="width: 20rem">
				<div class="offcanvas-header">
					<a href="/" class="text-inverse nav-logo"><img src="{{ asset('assets/images/review-boost-logo.png') }}" alt=""></a>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body pt-0 align-items-center">
					<ul class="navbar-nav mx-auto align-items-lg-center">
						<li class="nav-item">
							<a class="nav-link" href="/" role="button">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('features') }}" role="button">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('pricing') }}" role="button">Pricing</a>
						</li>
						<li class="nav-item d-inline d-lg-none">
							<a href="{{ url('/google-review-link-generator') }}" class="nav-link" role="button">Google Review Link Free</a>
						</li>
						<li class="nav-item d-inline d-lg-none">
							<a href="{{ route('google-review-qrcode') }}" class="nav-link" role="button">Google Review Qrcode Free</a>
						</li>
					</ul>
					<div class="mt-3 mt-lg-0 d-flex align-items-center">
						<a href="{{ route('login') }}" class="btn btn-light mx-2">Login</a>
						<a href="{{ route('register') }}" class="btn btn-primary">Register</a>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>