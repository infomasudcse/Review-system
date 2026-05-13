@extends('layouts.public')

@section('meta_robots', 'noindex, follow')

@section("title", "Privacy Policy | How ReviewBoost Protects Your Data")
@section("meta_description", "Your privacy is our priority. Learn how ReviewBoost securely handles your data, customer emails, and payment information.")


@section('content')

<section class="container py-lg-8 py-5" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 300ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center mb-3">
		<div class="col col-lg-8 mb-4">
			<div class="text-center d-flex flex-column gap-5">
				<div class="d-flex flex-column gap-3 mx-lg-8">
					<h2 class="mt-2 mb-4 text-uppercase">Privacy policy</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="row align-items-center justify-content-center">

		<div class="col col-lg-8 ps-lg-5">
			<div class="d-flex mb-4">
				<div>
					<p class="">We do not sell your data. We only use your customers' phone numbers to facilitate the review requests you trigger.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">1. Data We Collect</h5>
					<p class="text-muted">We collect your account information (name, email) and the customer data you upload (names/phone numbers) for the sole purpose of providing our service.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">2. How We Use Data</h5>
					<p class="text-muted">Data is used to generate WhatsApp links and manage your subscription. We do not sell or rent your customer lists to third parties.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">3. Third-Party Service Providers</h5>
					<p class="text-muted">We use Stripe for payment processing (so you don't store credit cards) and WhatsApp for message delivery. These providers have their own privacy policies.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">4. Data Security</h5>
					<p class="text-muted">We use industry-standard encryption to protect your data. You may delete your imported customer data at any time.</p>
				</div>
			</div>
		</div>
	</div>

</section>


@endsection
