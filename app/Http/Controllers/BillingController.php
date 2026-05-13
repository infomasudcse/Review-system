<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        return view('billing.index');
    }

    public function upgrade(Request $request)
    {
        // This generates a hosted Stripe Checkout page link
        return $request->user()
            ->newSubscription('pro-plan', config('services.stripe.pro_price_id'))
			->allowPromotionCodes()
            ->checkout([
                'success_url' => route('clients.index', ['checkout' => 'success']),
                'cancel_url' => route('billing'),
            ]);
    }

	public function portal(Request $request)
	{
		// Redirects the user to Stripe's hosted "Management" page
		return $request->user()->redirectToBillingPortal(route('billing'));
	}


}