@extends('layouts.logged')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight">New Review Request</h1></div>
    </div>


	<div class="row">
		<div class="col-12 col-lg-8">
			@include('partials.alerts')
		</div>
    </div>


	@if(!$setting)
		<div class="row">
			<div class="col my-2">
				<div class="alert alert-info d-flex align-items-center" role="alert">
					<div>
						<a class="button btn-dark btn-sm btn" href="{{ route('settings.index') }}">Complete your one time setup here before send any Review request</a>
					</div>
				</div>
			</div>
		</div>
	@endif

    <div class="row">
        <div class="col-12 col-lg-8 pt-3">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<button class="nav-link active" id="nav-email-tab" data-bs-toggle="tab" data-bs-target="#nav-email" type="button" role="tab" aria-controls="nav-email" aria-selected="true"><strong>Email</strong></button>
					<button class="nav-link" id="nav-sms-tab" data-bs-toggle="tab" data-bs-target="#nav-sms" type="button" role="tab" aria-controls="nav-sms" aria-selected="false"><strong>WhatsApp</strong></button>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
						<form action="{{ route('review-requests.store') }}" class="py-3" method="POST">
							@csrf
							<input type="hidden" name="channel" value="email" />

							<div class="mb-3">
								<label for="name">Name</label>
								<input id="name" type="text" name="name" class="form-control" required value="{{ $client? $client->name : old('name') }}">
							</div>

							<div class="mb-3 d-flex flex-column">
								<label for="email">Email <span class="text-danger">*</span> </label>
								<input id="email" type="email" name="email" class="form-control" value="{{ $client? $client->email : old('email') }}">
							</div>

							<button type="submit" class="btn btn-primary" <?= ((!$setting) ? 'disabled' : '') ?>>Send Email Request</button>

						</form>
				</div>
				<div class="tab-pane fade" id="nav-sms" role="tabpanel" aria-labelledby="nav-sms-tab">
					@if(!$isSubscribed)
						<span class="text-sm px-2 py-3 text-indigo-600 block">Pro Feature: <a class="fw-bold" href="{{ url('/billing') }}">Upgrade to unlock</a></span>
					@endif
					<form action="{{ route('review-requests.store-whatsapp') }}" class="py-3 {{ !$isSubscribed ? 'opacity-50 grayscale' : '' }}" method="POST">
							@csrf
							<input type="hidden" name="channel" value="whatsapp" />

							<div class="mb-3">
								<label for="sms_name">Name</label>
								<input id="sms_name" type="text" name="name" class="form-control" required value="{{ $client? $client->name : old('name') }}">
							</div>

							<div class="mb-3  d-flex flex-column">
								<label for="phone">Phone <span class="text-danger">*</span> </label>
								<input id="phone" type="text" name="phone" data-country-code="<?= (($setting)? $setting->country_code : '') ?>" class="form-control" value="{{ $client? $client->phone : old('phone') }}">
							</div>


							<button type="submit" class="btn btn-primary" <?= ((!$setting) ? 'disabled' : '') ?>>Send WhatsApp Request</button>

						</form>
				</div>

			</div>
        </div>
    </div>
</div>
@endsection
