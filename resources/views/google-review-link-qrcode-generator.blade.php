@extends('layouts.public')


@section("title", "Google Review Qrcode Free - Get Your Google Review Qrcode Instantly")
@section("meta_description", "Google review Qrcode generator. Paste the link and get Qrcode. Start collecting more Google reviews from your customers. Free and easy to use.")


@section('content')
	<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-10 col-12">
				<div class="text-center d-flex flex-column gap-5">
						<h1 class="mb-0 display-4">Free Google Review Qrcode Generator</h1>
				</div>
			</div>
			<div class="col-xl-10 col-lg-10 col-12">
				<div class="text-center d-flex flex-column gap-5">
					<p class="mb-0 lead">Use our free Google Review Qrcode Generator for your customers to leave a review. Simply paste your business review link and get Qrcode.</p>
				</div>
			</div>
		</div>
	</section>

<section style="background-color:#f7f7f7;">
	<div class="container py-lg-8" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-12">
					<form action="{{ url('/google-review-qrcode-generator')}}" class="" method="post">
						@csrf

						<label>Business Name</label>
						<input name="business_name" type="text" class="form-control my-3" required/>
						<label>Your Google review link</label>
						<input id="review-link" name="review_link" class="form-control my-3" type="text" placeholder="Paste your review link here..." required/>
						<p class="pb-2"><em>Do not have your business review link? </em> <a href="{{ url('/google-review-link-generator') }}">Get your Free Google business review link</a></p>
						<button class="btn btn-dark" type="Submit">Show QrCode</button>
					</form>

					<div class="d-flex flex-column py-3">
						<p class="mb-3">Want a smart Qrcode which also helps to Protect your rating from negative review? Try our review automation platform.</p>
						<div class="d-flex flex-row gap-4 justify-content-start">
							<a href="{{ route('register') }}" class="btn btn-success">
								<span>Start for Free</span>
							</a>
							<a href="{{ route('features') }}" class="btn btn-outline-primary">
								<span>Features</span>
							</a>
						</div>
					</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-12 mt-3">
				<div class="text-center d-flex flex-column py-3">
					<div class="card p-3">
						@if($qrCode && $businessName)
						<div class="text-center p-1 p-md-3 bg-white" style="max-width: 400px; margin: auto;">
							<h1 class="h2 fw-bold">{{ $businessName }}</h1>

							<div class="my-4">
								{!! $qrCode !!}
							</div>

							<p class="fw-bold">Scan to leave us a review.</p>

						</div>

						@else
							<div class="text-center p-5 bg-white" style="max-width: 400px; margin: auto;">
								Qrcode
							</div>

						@endif

					</div>
				</div>
				<div class="text-center d-flex flex-column py-3">
						<p class="mb-3">Need a Qrcode which popups Google review widnow? Try our platform.</p>
						<div class="d-flex flex-row gap-4 justify-content-center">
							<a href="{{ route('register') }}" class="btn btn-success">
								<span>Start for Free</span>
							</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</section>


@include('template-parts.why-choose-us')

@include('template-parts.general-cta')

@endsection
