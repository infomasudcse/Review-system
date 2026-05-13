@extends('layouts.logged')

@section('content')
<div class="container">
	 <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight">Create Client</h1></div>
    </div>
    <div class="row">
    @if(session('error'))
        <div class="col"><div class="alert alert-danger">{{ session('error') }}</div></div>
    @endif
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <form action="{{ route('clients.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                </div>

                <button type="submit" class="btn btn-primary">Save Client</button>
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
