@extends('layouts.logged')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6"><h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Complaints - History</h1></div>
    </div>

    <div class="row">
		<div class="col-12">
			@include('partials.alerts')
		</div>
		<div class="col-12">
			<div class="my-3 d-flex">
				<a href="{{ route('complaints.index') }}" class="me-2 btn btn-outline-warning {{ request()->routeIs('complaints.index') ? 'active' : '' }}">
					<span data-feather="help-circle"></span> Unresolved
				</a>

				@if($complaints->count() > 0)
					<a href="{{ route('complaints.clear-all') }}"
						class="btn btn-outline-danger"
						onclick="return confirm('Permanently delete all resolved history?')">
							<span data-feather="trash-2"></span> Clear All History
						</a>
				@endif

			</div>
		</div>
    </div>

	<div class="table-responsive-sm table-responsive" id="complaint-table">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Client</th>
					<th>Message</th>
					<th>Resolved at</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($complaints as $key => $comp)

					<tr>
						<td>{{ $complaints->firstItem() + $key }}</td>
						<td><a href="{{ route('clients.show', $comp->client) }}">{{ $comp->client->name }}</a></td>
						<td> {{ $comp->message }}</td>
						<td> {{ $comp->resolved_at->diffForHumans() }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="mt-4 mb-4">
		{{ $complaints->links() }}
	</div>

@endsection
