@extends('layouts.logged')

@section('content')
<div class="container">
   <div class="row">
        <div class="col mb-3"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Edit Client</h1></div>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', $client->name) }}">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $client->email) }}">
        </div>

        <div class="mb-3 d-flex flex-column">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Client</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
