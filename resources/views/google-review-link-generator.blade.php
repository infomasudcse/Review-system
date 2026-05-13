@extends('layouts.public')


@section("title", "Google Review Link Generator Free - Get Your Google Review Link Instantly")
@section("meta_description", "Generate your Google review link instantly. Search your business, copy the direct review link, and start collecting more Google reviews from your customers. Free and easy to use.")


@section('content')
	<section class="container py-lg-8 py-5" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row justify-content-center">
			<div class="col-xl-8 col-lg-10 col-12">
				<div class="text-center d-flex flex-column gap-5">
						<h1 class="mb-0 display-4">Free Google Review Link Generator</h1>
				</div>
			</div>
			<div class="col-xl-10 col-lg-10 col-12">
				<div class="text-center d-flex flex-column gap-5">
						<p class="mb-0 lead">Use our free Google Review Link Generator to quickly create a direct link for your customers to leave a review. Simply search for your business, select it from the Google suggestions.Then copy your review link powered by <a href="{{ url('/')}}">ReviewBoost</a>.</p>
				</div>
			</div>
		</div>
	</section>

<section style="background-color:#f7f7f7;">
	<div class="container py-lg-8" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 500ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-10 col-12">
					<div class="">
						<input id="search-input" class="form-control my-3" type="text" placeholder="Start typing a business name...">

						<div id="result-display" class="result-box px-2">
							<p>Google Review Link:</p>
							<div class="input-group mb-3">
								<input type="text" id="reviewLink" class="form-control id-value" placeholder="..." aria-label="Review Link" aria-describedby="button-addon2" readonly>
								<button class="btn btn-outline-primary" type="button" onclick="copyReviewLink()" id="button-addon2"><span data-feather="copy"></span> Copy Link </button>
							</div>
							<small id="copyMessage" class="text-success d-none">Link copied to clipboard!</small>
						</div>
						<div id="show_help" class="py-2 px-2 d-none">
							<a class="display-5 link-success" href="{{ route('google-review-qrcode') }}">
									<i class="bi bi-qr-code text-success fs-3"></i>
								Get your Free Google review Qrcode</a>
						</div>
					</div>
			</div>

			<div class="col-xl-10 col-lg-10 col-12 mt-3">
				<div class="text-center d-flex flex-column py-3">
					<p class="mb-3 lead">Want to request reviews from customers by WhatsApp and email? Protect your rating from negative review? Try our review automation platform.</p>
					<div class="d-flex flex-row gap-4 justify-content-center">
						<a href="{{ route('register') }}" class="btn btn-success">
							<span>Start for Free</span>
						</a>
						<a href="{{ route('features') }}" class="btn btn-outline-primary">
							<span>Features</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@include('template-parts.why-choose-us')


@include('template-parts.general-cta')

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABRDQyrXD0bVku2ZJs6Iqave-i7BfXR0M&libraries=places"></script>
<script>
    function init() {
        const input = document.getElementById("search-input");

        // We limit fields to ONLY 'place_id' and 'name' (name is for the UI)
        const options = {
            fields: ["place_id", "name"],
            types: ["establishment"] // Optional: limits results to businesses/places
        };

        const autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener("place_changed", () => {
            const place = autocomplete.getPlace();

            if (place.place_id) {
                const display = document.getElementById("result-display");
                const idSpan = document.getElementById("reviewLink");
                const idHelp = document.getElementById("show_help");

                idSpan.value = 'https://search.google.com/local/writereview?placeid='+place.place_id;
                display.style.display = "block";
				idHelp.classList.remove('d-none');

                console.log("Selected Place ID:", place.place_id);
            }
        });
    }

    google.maps.event.addDomListener(window, 'load', init);


	function copyReviewLink() {
		// 1. Get the text from the input
		const copyText = document.getElementById("reviewLink");

		// 2. Use the modern Navigator Clipboard API
		navigator.clipboard.writeText(copyText.value).then(() => {

			// 3. Optional: Visual feedback (Show "Copied!" message)
			const msg = document.getElementById("copyMessage");
			msg.classList.remove('d-none');

			// Hide it again after 2 seconds
			setTimeout(() => {
				msg.classList.add('d-none');
			}, 2000);

		}).catch(err => {
			console.error('Failed to copy: ', err);
		});
	}


</script>


@endsection
