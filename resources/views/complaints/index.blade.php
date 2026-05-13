@extends('layouts.logged')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6"><h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Complaints - Unresolved</h1></div>
    </div>

    <div class="row">
		<div class="col-12">
			@include('partials.alerts')
		</div>
		<div class="col-12">
			<div class="my-3">
				<a href="{{ route('complaints.index') }}" class="me-2 btn btn-outline-warning {{ request()->routeIs('complaints.index') ? 'active' : '' }}">
					<span data-feather="help-circle"></span> Unresolved
				</a>
				<a href="{{ route('complaints.resolved') }}" class="btn btn-outline-success {{ request()->routeIs('complaints.resolved') ? 'active' : '' }}">
					<span data-feather="check"></span> Resolved History
				</a>
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
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($complaints as $key => $comp)

					<tr>
						<td>{{ $complaints->firstItem() + $key }}</td>
						<td><a href="{{ route('clients.show', $comp->client) }}">{{ $comp->client->name }}</a></td>
						<td> {{ $comp->message }}</td>
						<td>
							<form action="{{ route('complaints.destroy', $comp) }}" method="POST" class="d-inline">
								@csrf @method('DELETE')
								<button class="btn btn-outline-warning mb-1 btn-sm btn-md btn-lg" onclick="return confirm('Delete?')"> <span data-feather="check"> Resolved</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="mt-4 mb-4">
		{{ $complaints->links() }}
	</div>

@endsection
