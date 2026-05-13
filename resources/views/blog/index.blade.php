@extends('layouts.public')

@section("title", "Local SEO & Review Management Blog | ReviewBoost Insights")
@section("meta_description", "Expert tips on improving your Google Business Profile, handling negative reviews, and scaling your local business through customer feedback.")

@section('content')

<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-10 col-12">
			<div class="text-center d-flex flex-column gap-5">
				<div class="d-flex flex-column gap-3 mx-lg-8">
				<h1 class="mb-2 display-4">The ReviewBoost Blog</h1>
				<p class="mb-0 lead">We're preparing expert guides on how to skyrocket your local business reviews. </p>
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


@endsection
