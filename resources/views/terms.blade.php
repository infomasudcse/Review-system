@extends('layouts.public')

@section('meta_robots', 'noindex, follow')

@section("title", "Terms of Service | ReviewBoost User Agreement")
@section("meta_description", "Read the terms and conditions for using ReviewBoost. Understand our 20-client free limit, subscription policies, and usage guidelines.")


@section('content')

<section class="container py-lg-8 py-5" data-cue="fadeIn" data-show="true" style="animation-name: fadeIn; animation-duration: 300ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center mb-3">
		<div class="col col-lg-8 mb-4">
			<div class="text-center d-flex flex-column gap-5">
				<div class="d-flex flex-column gap-3 mx-lg-8">
					<h2 class="mt-2 mb-4 text-uppercase">Terms of Service</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="row align-items-center justify-content-center">

		<div class="col col-lg-8 ps-lg-5">
			<div class="d-flex mb-4">
				<div>
					<p class="">You are responsible for having permission to contact your customers. We provide the tool. you provide the consent.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">1. Subscription & Billing</h5>
					<p class="text-muted">Services are billed in advance on a monthly basis. All payment processing is handled securely via Stripe.</p>
				</div>
			</div>
			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">2. User Responsibility</h5>
					<p class="text-muted">You (the Merchant) are responsible for ensuring you have obtained proper consent from your customers before contacting them via WhatsApp.</p>
				</div>
			</div>
			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">3. Use of Service</h5>
					<p class="text-muted">{{ config('appsettings.name') }} is a tool to facilitate review requests. We are not responsible for any disputes between you and your customers or for any actions taken by Google or WhatsApp regarding your accounts.</p>
				</div>
			</div>
			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">4. Termination</h5>
					<p class="text-muted">You may cancel your subscription at any time via the billing portal. Upon cancellation, your access to Pro features will continue until the end of the current billing cycle.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<p class="display-6">Fair Use & Anti-Spam Policy</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">1. Purpose of Service</h5>
					<p class="text-muted">ReviewBoost is designed to help legitimate businesses collect authentic feedback from their real customers. Use of the service to send unsolicited bulk messages (Spam) is strictly prohibited.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">2. Free Tier Limitations</h5>
					<p class="text-muted">Our "Free Tier" allows for the management of up to 20 clients. This is intended for small businesses to trial the service. Any attempt to circumvent this limit by creating multiple accounts, or using temporary email addresses to reset limits, will result in an immediate permanent ban of your IP address and domain.</p>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">3. Prohibited Content</h5>
					<p class="text-muted">You agree not to use ReviewBoost to send content that is:</p>
					<ul>
						<li>Deceptive, fraudulent, or harassing.</li>
						<li>Promotes illegal activities, hate speech, or adult content.</li>
						<li>Contains viruses, malware, or harmful code.</li>
					</ul>
				</div>
			</div>

			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">4. Sending Limits & Account Suspension</h5>
					<p class="text-muted">To protect our delivery reputation (and the service for all users), we monitor sending patterns. If your account shows a high "Bounce Rate" (invalid emails) or a high "Complaint Rate" (users marking your emails as spam), we reserve the right to suspend your account immediately without a refund.</p>
				</div>
			</div>
			<div class="d-flex mb-4">
				<div>
					<h5 class="fw-bold">5. Compliance with Laws</h5>
					<p class="text-muted">You are solely responsible for ensuring that your review requests comply with local laws (such as GDPR, CAN-SPAM Act, or TCPA). You must have a pre-existing business relationship with any customer you contact through our platform.</p>
				</div>
			</div>


		</div>
	</div>

</section>

@endsection
