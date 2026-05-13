@extends('layouts.logged')

@section('content')
<div class="container">
    <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h1></div>
    </div>

	@if(!$setting)
		<div class="row">
			<div class="col my-3">
				<div class="alert alert-info d-flex align-items-center" role="alert">
					<div>
						<a class="button btn-dark btn-sm btn" href="{{ route('settings.index') }}">Complete your one time setup here</a>
					</div>
				</div>
			</div>
		</div>
	@endif

    <div class="row mt-4">
        <div class="col-6 col-md-4">
            <div class="card text-info-emphasis bg-light mb-3 bg-opacity-10">
                <div class="card-body">
                    <h5 class="card-title">Total Sent</h5>
                    <p class="card-text fs-1">{{ $total_sent }}</p>
                    <span data-feather="mouse-pointer"></span>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card text-primary bg-light mb-3 bg-opacity-10">
                <div class="card-body">
                    <h5 class="card-title">Total Clicks</h5>
                    <p class="card-text fs-1">{{ $total_clicks }}</p>
                    <span data-feather="mouse-pointer"></span>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4">
            <div class="card text-success bg-light mb-3 bg-opacity-10">
                <div class="card-body">
                    <h5 class="card-title">Conversion</h5>
                    <p class="card-text fs-1">{{ $conversion_rate }}%</p>
                    <span data-feather="trending-up"></span>
                </div>
            </div>
        </div>

		<div class="col-6 col-md-12">
            <div class="row">
				<div class="col">
					<a class="d-flex flex-column align-items-center float-end btn button btn-success btn-lg" href="{{ route('review-requests.index') }}"> <span data-feather="star"></span> <span>Review Requests</span></a>
				</div>
			</div>
        </div>
    </div>



	<div class="row mt-4">
		<div class="table-responsive-sm table-responsive" id="client-table">
			<table class="table min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th>Client</th>
						<th  class="d-none d-md-table-cell">Source</th>
						<th >Requested At</th>
						<th class="d-none d-md-table-cell">Landed on Page</th>
						<th>Clicked Google</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					@foreach($requests as $request)
					<tr>
						<td>{{ $request->client->name }}</td>
						<td  class="d-none d-md-table-cell">{{ ucfirst($request->channel) }}</td>
						<td>{{ $request->created_at->diffForHumans() }}</td>
						<td  class="d-none d-md-table-cell">{{ $request->clicked_at ? $request->clicked_at->diffForHumans() : '-' }}</td>
						<td>{{ ($request->google_clicked_at ? $request->google_clicked_at->diffForHumans() : '-') }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="mt-4 mb-4">
			{{ $requests->links() }}
		</div>
	</div>

    @if (auth()->user()->plan === 'free')
        <div class="alert alert-warning mt-4">
            Please Subscribe for standard features you might need.
            <a href="{{ route('billing') }}" class="btn btn-sm btn-info mx-3">Upgrade</a>
        </div>
    @endif


</div>
@endsection
