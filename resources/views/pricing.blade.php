@extends('layouts.public')

@section("title", "Simple, Transparent Pricing | ReviewBoost Pro")
@section("meta_description", "Get your first 20 clients for free. Upgrade to ReviewBoost Pro for unlimited review requests and premium support. No hidden fees, just growth.")

@section('content')


<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-10 col-12">
			<div class="text-center d-flex flex-column gap-5">

				<div class="d-flex flex-column gap-3 mx-lg-8">
				<h1 class="mb-0 display-4">Start for free. Scale when you're ready.</h1>
				<p class="mb-0 lead">Simple, honest pricing with no hidden fees. Join as an Early Bird today and lock in our Pro features for life at a fraction of the cost.</p>
				</div>
				<div class="d-flex flex-row gap-4 justify-content-center">
					<a href="#pricing" class="btn btn-outline-primary">
						<span>Choose your plan</span>
						<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M11 16.175V5q0-.425.288-.712T12 4t.713.288T13 5v11.175l4.9-4.9q.3-.3.7-.288t.7.313q.275.3.287.7t-.287.7l-6.6 6.6q-.15.15-.325.213t-.375.062t-.375-.062t-.325-.213l-6.6-6.6q-.275-.275-.275-.687T4.7 11.3q.3-.3.713-.3t.712.3z"/></svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!--Plan to unlock start-->
<section id="pricing" class="container py-lg-8 py-5 price-wrapper" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center mb-5 mb-md-8">
		<div class="col-xl-6 col-lg-10 col-12">
		<div class="text-center d-flex flex-column gap-5">

			<div class="d-flex flex-column gap-3 mx-lg-8 mb-5">
				<h2 class="mb-0 display-6 text-uppercase">Start for free</h2>
				<p class="mb-0">{{ config('appsettings.name') }} helps you to get more customers</p>
			</div>
		</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-lg-8 col-12">
		<div class="row align-items-center g-md-0 gy-4">
			<div class="col-md-6 col-12" data-cue="slideInLeft" data-show="true" style="animation-name: slideInLeft; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
				<div class="card bg-light pricing rounded-end-md-0">
					<div class="card-body d-flex flex-column gap-4">
					<div>
						<h3>Free</h3>
						<p class="mb-0">Perfect for testing the waters.</p>
					</div>
					<h2 class="mb-0 d-flex align-items-center">
						<span>{{ currency_symbol() }}0</span>
						<span class="price-duration fs-6 text-body ms-2">/month</span>
					</h2>
					<hr class="my-0">
					<div>
						<h5 class="mb-3">What's included</h5>
						<ul class="list-unstyled flex-column d-flex gap-2">
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Negative Feedback Shielding (Limit to 20)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Google PlaceID Auto-Integration</span>
							</li>

							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Live Conversion Dashboard (Scans vs. Clicks)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Zero-Friction Landing Pages (No login required)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Automated 5-Star Links (Forced review popup)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Up tp 20 Clients</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Manual Client Entry</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
								</span>
								<span class="ms-2">Email Review Requests</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from IconaMoon by Dariush Habibpour - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="11.999" r="9"/><path d="m15 9l-6 6m0-6l6 6"/></g></svg>
								</span>
								<span class="ms-2">Smart QRcode Scan</span>
							</li>

							<li class="d-flex align-items-start">
								<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><!-- Icon from IconaMoon by Dariush Habibpour - https://creativecommons.org/licenses/by/4.0/ --><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><circle cx="12" cy="11.999" r="9"/><path d="m15 9l-6 6m0-6l6 6"/></g></svg>
								</span>
								<span class="ms-2">WhatsApp Request</span>
							</li>
						</ul>
					</div>
					<div class="d-grid">
						<a href="{{ route('register') }}" class="btn btn-outline-primary text-dark">Start with Free</a>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-12" data-cue="slideInRight" data-show="true" style="animation-name: slideInRight; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
				<div class="card bg-primary-card text-white pricing border-dark">
					<div class="card-body d-flex flex-column gap-4 text-white-stable">
					<div>
						<h3 class="text-white-stable">Pro</h3>
						<p class="mb-0 text-white-60">The ultimate growth engine for your business.</p>
					</div>
					<h2 class="d-flex align-items-center text-white-stable">
						<div class="price-text">
							<div class="price price-show d-flex align-items-center">
								<span>{{ currency_symbol() }}</span>
								<span>{{ config('plans.pro.price') }}</span>
								<span class="price-duration fs-6 ms-3">/month</span>
							</div>
						</div>
					</h2>
					<hr class="my-0">
					<div class="text-white-stable">
						<h5 class="mb-3 text-white-stable">What's included</h5>
						<ul class="list-unstyled flex-column d-flex gap-2">
							<li class="d-flex align-items-start">
								<span class="flex-shrink-0">
									<i class="bi bi-qr-code text-success fs-3"></i>
								</span>
								<span class="ms-2">UNLIMITED QR Code Scans & Tracking</span>
							</li>
							<li class="d-flex align-items-start">
								<span class="flex-shrink-0">
									<i class="bi bi-shield-fill-check text-warning fs-3"></i>
								</span>
								<span class="ms-2">Negative Feedback Shielding (Private Routing)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Google PlaceID Auto-Integration</span>
							</li>

							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Live Conversion Dashboard (Scans vs. Clicks)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Zero-Friction Landing Pages (No login required)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Automated 5-Star Links (Forced review popup)</span>
							</li>

							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Unlimited Clients</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Bulk Import(CSV/Excel)</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Email Review Requests</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">WhatsApp Integration</span>
							</li>
							<li class="d-flex align-items-start">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m10.6 13.8l-2.15-2.15q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7L9.9 15.9q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275zM12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
								</span>
								<span class="ms-2">Email Support</span>
							</li>

						</ul>
					</div>
					<div class="d-grid">
						<a href="{{ route('register') }}" class="btn btn-success">Get Early Bird Access</a>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>
<!--Plan to unlock end-->


@include('template-parts.general-cta')

@endsection
