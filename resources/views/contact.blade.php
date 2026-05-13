@extends('layouts.public')

@section("title", "Contact Us | Get Support for ReviewBoost")
@section("meta_description", "Have questions about automating your reviews? Reach out to the ReviewBoost team. We’re here to help your business shine online.")

@section('content')

<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-10 col-12">
			<div class="text-center d-flex flex-column gap-5">
				<div class="d-flex flex-column gap-3 mx-lg-8">
				<h1 class="mb-0 display-4">What help do you need?</h1>
				<p class="mb-0 lead">Find information on these pages.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container py-lg-8 py-5">
    <div class="row justify-content-center">


            <a href="/faq" class="card bg-light col-10 col-md-4 col-xl-3 m-3 p-6">

                <h3 class="font-bold text-gray-900 text-xl">FAQs</h3>
                <p class="text-gray-500 text-sm mt-2">Quick answers to common questions about ReviewBoost.</p>
            </a>

            <a href="/pricing" class="card bg-light col-10 col-md-4 col-xl-3 m-3 p-6">

                <h3 class="font-bold text-gray-900 text-xl">Pricing</h3>
                <p class="text-gray-500 text-sm mt-2">Information about our plans, billing, and trial period.</p>
            </a>

            <a href="/features" class="card bg-light col-10 col-md-4 col-xl-3 m-3 p-6">

                <h3 class="font-bold text-gray-900 text-xl">Features</h3>
                <p class="text-gray-500 text-sm mt-2">See everything ReviewBoost can do to help your business.</p>
            </a>

    </div>
</section>

<!--  Show Contact form -->



<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-12 col-lg-8">
			<p class="mb-5 px-3 py-3 lead border-info border-3 border-start">If you still need to contact us, fill out the form below.</p>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-12 col-lg-8">
			@include('partials.alerts')
		</div>
	</div>
	<div class="row justify-content-center">

        <div class="col-12 col-lg-8">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

				<div style="display:none;">
					<input type="text" name="website_url_dedicated" autocomplete="off">
				</div>

                <div class="mb-3">
                    <label for="fname">First Name <span class="text-danger">*</span></label>
                    <input type="text" id="fname" name="fname" class="form-control" required value="{{ old('fname') }}">
                </div>

				<div class="mb-3">
                    <label for="lname">Last Name <span class="text-danger">*</span></label>
                    <input type="text" id="lname" name="lname" class="form-control" required value="{{ old('lname') }}">
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

				<div class="mb-3">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                </div>

				<div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.key') }}"></div>
				@error('cf-turnstile-response')
					<p class="text-red-500 text-xs mt-1">{{ $message }}</p>
				@enderror

                <button type="submit" class="btn btn-dark">Send</button>
            </form>
        </div>
    </div>
</section>



@endsection
