@extends('layouts.public')


@section("title", "Google Review Link Generator - Get Your Google Review Link Instantly")
@section("meta_description", "Generate your Google review link instantly. Search your business, copy the direct review link, and start collecting more Google reviews from your customers. Free and easy to use.")


@section('content')
	<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-10 col-12">
				<div class="text-center d-flex flex-column gap-5">
					<div class="d-flex flex-column gap-3 mx-lg-8">
						<h1 class="mb-0 display-4">How To Get Google Review Link</h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row">
			<div class="col-xl-8 col-lg-10 col-12">
				<div class="gap-5">
					<p>Want to request reviews from customers by email or WhatsApp? Try our review automation platform.</p>

				</div>
			</div>


		</div>
	</section>


@include('template-parts.general-cta')


@endsection
