@extends('layouts.logged')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col-12 col-lg-8 mb-3"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Settings</h1></div>
    </div>

	@if(!$setting)
		<div class="row">
			<div class="col-12 col-lg-8 my-2">
				<div class="alert alert-info d-flex align-items-center" role="alert">
					<div>
						<strong>Complete your setup Here</strong>
					</div>
				</div>
			</div>
		</div>
	@endif

    <div class="row">
		<div class="col-12 col-lg-8">
			@include('partials.alerts')
			@if(session('success'))
				<div class="alert alert-info d-flex align-items-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
					</svg>
					<div><a class="alert-link" href="{{ route('review-requests.index') }}">Request Review</a> or <a class="alert-link" href="{{ route('clients.index') }}">Add Clients</a></div>
				</div>
			@endif
		</div>
    </div>

 	<div class="row">
        <div class="col-12 col-lg-8">
			<form action="{{ route('settings.store') }}" method="POST">
				@csrf

				<input type="hidden" name="country_code" id="country_code" />
				<?php
					$default_email_message = "We strive to provide best service every single time. If you have a moment, would you mind leave us a review?";

					$default_whatsapp_message ='Hello {CUSTOMER_NAME}, thank you for visiting {BUSINESS_NAME}. Would you mind leaving us a review? {REVIEW_LINK}';
				?>

				<div class="mb-3">
					<label for="business_name">Business Name</label>
					<input type="text" id="business_name" name="business_name" class="form-control" value="{{  ($setting ? $setting->business_name : '') }}">
				</div>

				<div class="mb-3 d-flex flex-column">
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone" class="form-control" value="{{ ($setting ? $setting->phone : '') }}">
					<div class="text-sm text-gray-500" id="phone-warning">
					</div>
				</div>

				<div class="mb-3">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-control" value="{{ ($setting ? $setting->email : Auth::user()->email) }}">
				</div>

				<div class="mb-3">
					<label for="search-input">Generate your Google review link</label>
					<input type="text" id="search-input" name="google_business_name" class="form-control" placeholder="Start typing your business name..." value="{{ ($setting ? $setting->google_business_name : '') }}">
					<div class="my-2">
						<em style="color:grey;">Select your business name from dropdown list. Review link will be auto generated.</em>
					</div>
					<label for="search-input" class="fw-bold text-primary">Google Review Link</label>
					<input type="text" id="google_review_link" name="google_review_link" class="google_review_link form-control {{ (($setting && $setting->google_review_link) ? 'is-valid' : '') }}" value="{{ ($setting ? $setting->google_review_link : '') }}" readonly/>
					<em class="text-danger">Save this form once you have your link</em>


					@if($setting)
						@if($setting->google_review_link)
							<div class="card mt-2 mb-2 bg-light bg-gradient p-3" style="">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								</svg>
								Save the form first. Then test your goolge link if it works perfectly. The test button opens a new page.<br/>
								<a href="{{ $setting->google_review_link }}" class="btn btn-primary btn-sm test-button mt-1" target="_blank" >Test your google review link </a>
							</div>
						@endif
					@endif
				</div>

				<div class="mb-3">
					<label for="default_email_template">Email message template</label>
					<textarea name="default_email_template" id="default_email_template" rows="4" class="form-control">{{ ($setting ? $setting->default_email_template : $default_email_message ) }}</textarea>
				</div>

				<div class="mb-3">
					<label for="default_whatsapp_template">WhatsApp message template</label>

					<textarea name="default_whatsapp_template" rows="3" id="default_whatsapp_template" class="form-control" readonly>{{ ($setting ? $setting->default_whatsapp_template : $default_whatsapp_message ) }}</textarea>
					<div class="mt-2 mb-2 text-sm text-gray-500">
						<em>For WhatsApp, the message is standardized to ensure delivery. You can only customize your Business Name and the Review Link.</em>
					</div>
				</div>

				<button type="submit" class="btn btn-primary btn-lg mb-5">Save</button>
			</form>
		</div>
	</div>
</div>

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

                const idInput = document.getElementById("google_review_link");

                idInput.value = 'https://search.google.com/local/writereview?placeid='+place.place_id+'&source=g.page.share';
				idInput.classList.add('is-valid');


            }
        });
    }

    google.maps.event.addDomListener(window, 'load', init);
</script>

@endsection
