@extends('layouts.logged')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight">My QR Code</h1></div>
    </div>


	<div class="row">
		<div class="col-12 col-lg-8">
			@include('partials.alerts')
		</div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 pt-3">
			<div class="text-center p-5 border rounded bg-white" style="max-width: 400px; margin: auto;">
				<h1 class="h2 fw-bold">{{ $businessName }}</h1>
				<p class="text-muted">How did we do today?</p>

				<div class="my-4">
					{!! $qrCode !!}
				</div>

				<p class="fw-bold">Scan to share your experience</p>

			</div>
        </div>

		<div class="col-12 col-lg-8 pt-3">
			<div class="text-center">
				<button onclick="window.print()" class="btn btn-primary no-print">Print Qrcode</button>
			</div>
        </div>
    </div>
</div>
@endsection
