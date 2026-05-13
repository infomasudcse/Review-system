<footer class="pt-7 pb-8">
	<div class="container">
	<!-- Footer 4 column -->
	<div class="row">
		<div class="col-12">
			<div class="row" id="ft-links">
				<div class="col-lg-4 col-12 mb-5">
					<div class="position-relative">
						<div class="mb-3 pb-2 d-flex justify-content-between border-bottom border-bottom-lg-0">
							<a href="/" class="text-inverse nav-logo"><img src="{{ asset('assets/images/review-boost-logo.png') }}" alt="reviewboost star"></a>
						</div>
						<div class="d-lg-block">
							<p class="list-unstyled mb-0 py-3 py-lg-0 pe-4">
								{{ config('appsettings.description') }}
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-12 mb-5">
				<div>
					<div class="mb-3 pb-2 d-flex justify-content-between border-bottom border-bottom-lg-0 position-relative">
						<h4>Quick Links</h4>
					</div>
					<div class="d-lg-block" id="collapseAccounts">
						<ul class="list-unstyled mb-0 py-3 py-lg-0">
							<li class="mb-2">
								<a href="{{ route('home') }}" class="text-decoration-none text-reset">Home</a>
							</li>
							<li class="mb-2">
								<a href="{{ route('features') }}" class="text-decoration-none text-reset">Features</a>
							</li>
							<li class="mb-2">
								<a href="{{ route('pricing') }}" class="text-decoration-none text-reset">Pricing</a>
							</li>
							<li class="mb-2">
								<a href="{{ route('contact') }}" class="text-decoration-none text-reset">Contact</a>
							</li>

						</ul>
					</div>
				</div>
				</div>
				<div class="col-lg-4 col-12 mb-5">
				<div class="mb-3 pb-2 d-flex justify-content-between border-bottom border-bottom-lg-0 position-relative">
					<h4>Help Links</h4>
				</div>
				<div class="d-lg-block" id="collapseResources">
					<ul class="list-unstyled mb-0 py-3 py-lg-0">
						<li class="mb-2">
							<a href="{{ url('/google-review-link-generator') }}" class="text-decoration-none text-reset">Google Review Link Free</a>
						</li>
						<li class="mb-2">
							<a href="{{ route('google-review-qrcode') }}" class="text-decoration-none text-reset">Google Review Qrcode Free</a>
						</li>
						<li class="mb-2">
							<a href="{{ route('faq') }}" class="text-decoration-none text-reset">FAQ</a>
						</li>

						<li class="mb-2">
							<a href="{{ route('terms') }}" class="text-decoration-none text-reset">Terms of Service</a>
						</li>
						<li class="mb-2">
							<a href="{{ route('privacy-policy') }}" class="text-decoration-none text-reset">Privacy Policy</a>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="container mt-1 mt-md-7 pt-lg-7 pb-4">
	<div class="row justify-content-center align-items-center">
		<div class="col-12 col-md-10">
			<div class="mb-5 mb-md-3 text-md-center d-flex align-items-center justify-content-md-center">
				<div class="ms-3 d-flex gap-2">

						<a href="https://www.facebook.com/GetReviewBoost/" class="btn btn-facebook btn-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
							</svg>
						</a>

				</div>
			</div>
		</div>
		<div class="col-12 col-md-10">
			<div class="small mb-3 mb-lg-0 text-md-center">
				<p> &copy; {{ date('Y') }} {{ config('appsettings.name') }}. All rights reserved.</p>

				<span class="text-primary">Made with ❤️ for your Business</span>
				| by
				<span class="text-primary"><a href="https://www.anisha.uk">Anisha</a></span>
			</div>
		</div>

	</div>
	</div>
</footer>
<div class="btn-scroll-top active-progress">
	<svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
	<path d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 139.989, 139.989; stroke-dashoffset: 129.553;"></path>
	</svg>
</div>