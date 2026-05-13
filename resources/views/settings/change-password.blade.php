@extends('layouts.logged')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col-12 col-lg-8 mb-3"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Change Login Password</h1></div>
    </div>

    <div class="row">
		<div class="col-12 col-lg-8">
			@include('partials.alerts')
		</div>
    </div>

 	<div class="row">
        <div class="col-12 col-lg-8">
			<form action="{{ route('settings.change-password') }}" method="POST">
				@csrf

				<div class="mb-3">
					<label for="current_password">Current Password</label>
					<input type="password" id="current_password" name="current_password" class="form-control" value="">
				</div>

				<div class="mb-3">
					<label for="password">New Password</label>
					<input type="password" id="password" name="password" class="form-control" value="">
				</div>

				<div class="mb-3">
					<label for="password_confirmation">Confirm Password</label>
					<input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="">
				</div>

				<button type="submit" class="btn btn-primary btn-lg mb-5">Update</button>
			</form>
		</div>
	</div>
</div>


@endsection
