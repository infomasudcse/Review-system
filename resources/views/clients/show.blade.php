@extends('layouts.logged')

@section('content')
<div class="container">
     <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Client</h1></div>

    </div>

    <div class="mb-4 mt-5">
        <h5></h5>
        <p class="fs-4">
            <strong>{{ $client->name }}</strong><br>
            {{ $client->email }}<br>
            {{ $client->phone }}<br>
        </p>
    </div>

    <a href="{{ route('clients.index') }}" class="btn btn-secondary mb-1 btn-sm btn-md btn-lg">Back Client List</a>
	<a href="{{ route('clients.edit', $client) }}" class="btn btn-outline-info mb-1  btn-sm btn-md btn-lg">Edit</a>
	<form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
		@csrf @method('DELETE')
		<button class="btn btn-outline-danger mb-1  btn-sm btn-md btn-lg" onclick="return confirm('Delete?')">Delete</button>
	</form>
</div>
@endsection
