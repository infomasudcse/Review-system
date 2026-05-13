@extends('layouts.logged')

@section('content')
    <div class="row">
        <div class="col"><h1 class="font-semibold text-xl text-gray-800 leading-tight mb-5">You Plan</h1></div>
    </div>

	@include('partials.alerts')

	<div class="max-w-4xl mx-auto py-10">
    @if(auth()->user()->subscribed('pro-plan'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-green-700 font-bold">
                        You are currently on the Pro Plan!
                    </p>
                    <p class="text-green-600">
                        You have full access to Bulk Imports and WhatsApp Requests.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-medium text-gray-900">Manage Subscription</h3>
            <p class="mt-1 text-sm text-gray-500">Update your payment method or cancel your plan.</p>
            <div class="mt-5">
                <a href="{{ route('billing.portal') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-900">
                    Open Billing Portal
                </a>
            </div>
        </div>

    @else
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900">Upgrade your account</h1>
            <p class="mt-4 text-xl text-gray-600">Choose the plan that's right for your business.</p>
        </div>

        @include('partials.pricing-card')
    @endif
</div>


@endsection
