@extends('layouts.public')

@section("title", "Smart Review Automation Features | How ReviewBoost Works")
@section("meta_description", "From automated email requests to custom review landing pages, discover the tools ReviewBoost uses to help you dominate local search and build trust.")

@section('content')


<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
	<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-10 col-12">
			<div class="text-center d-flex flex-column gap-5">
				<div class="d-flex flex-column gap-3 mx-lg-8">
				<h1 class="mb-0 display-4">Smart tools to grow your 5-star reputation.</h1>
				<p class="mb-0 lead">Stop chasing customers for feedback. ReviewBoost automates the heavy lifting with bulk WhatsApp requests and easy CSV management, so you can focus on running your business while your rating climbs.</p>
				</div>
				<div class="d-flex flex-row gap-4 justify-content-center">
					<a href="{{ route('register') }}" class="btn btn-success">
						<span>Start for Free</span>
					</a>
					<a href="{{ route('pricing') }}" class="btn btn-outline-primary">
						<span>View pricing</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

@include('template-parts.feature-home')

@include('template-parts.general-cta')


@endsection
