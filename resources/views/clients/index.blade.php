@extends('layouts.logged')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6"><h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">Clients</h1></div>
        <div class="col col-md-6 text-end text-md-end"><button id="showUploadForm" class="btn btn-outline-secondary mb-3 mr-2">Upload csv</button> <a href="{{ route('clients.create') }}" class="btn btn-outline-primary mb-3">Add New</a></div>
    </div>

    <div class="row">
		<div class="col">
			@include('partials.alerts')

			@if(!auth()->user()->subscribed('pro-plan'))
				<div class="alert alert-info d-flex align-items-center">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
					</svg>
					<p class="text-sm text-blue-700">
						<strong>Usage:</strong> {{ auth()->user()->clients()->count() }} / 20 Free Clients
					</p>
					<div class="px-3"><a class="btn btn-sm btn-info alert-link px-3" href="{{ route('billing') }}">Upgrade</a></div>
				</div>
			@endif

		</div>
    </div>

	<div id="uploadFormWrapper" class="upload-wrapper">

		<div class="row">
			@if(auth()->user()->subscribed('pro-plan'))
			<div class="col-12">
				<div class="mb-4">
					<p class="text-sm text-gray-600 mb-2">Don't have a file? Download a template:</p>

					<a href="{{ route('clients.template', 'csv') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-file-csv"></i> Download CSV Template
					</a>

					<a href="{{ route('clients.template', 'excel') }}" class="btn btn-secondary btn-sm">
						<i class="fa fa-file-excel"></i> Download Excel Template
					</a>
				</div>
			</div>
			<div class="col-12">
				<form action="{{ route('clients.storeFromFile') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<div class="input-group">
						<input type="file"
							class="form-control"
							name="csv_file"
							accept=".csv, .xlsx"
							required>

						<button class="btn btn-outline-secondary" type="submit">
							Upload
						</button>
					</div>
					<p class="mt-2 text-xs text-gray-500">
						<strong>Accepted formats:</strong> CSV, Excel (.xlsx). <br>
						<span class="text-red-500">PDF, JPG, or PNG files will not be accepted.</span>
					</p>

				</form>
			</div>
			@else
			<div class="col-12">
				<div class="alert-slim alert alert-secondary">
					Bulk importing is a Pro feature. <a href="{{ route('billing') }}" class="btn btn-outline-success">Upgrade</a>
				</div>
			</div>
			@endif
		</div>

	</div>
	<div class="table-responsive-sm table-responsive" id="client-table">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th class="d-none d-md-table-cell">Email/Phone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($clients as $key => $client)
					<tr>
						<td>{{ $clients->firstItem() + $key }}</td>
						<td>{{ $client->name }}</td>
						<td class="d-none d-md-table-cell">{{ $client->email }} <br/>{{ $client->phone }}</td>
						<td>
							<a href="{{ route('review-requests.create', ['client_id' => $client->id]) }}"
								class="btn btn-success btn-sm btn-md btn-lg mt-1">
									Request Review
								</a>
							<a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-md btn-outline-secondary mt-1">View</a>


						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="mt-4 mb-4">
		{{ $clients->links() }}
	</div>

@endsection
