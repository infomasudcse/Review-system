<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewRequest;
use Illuminate\Support\Facades\Log;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class WebhookController extends Controller
{
    public function handleBrevo(Request $request)
    {
        // 1. Get the data from Brevo
        $event = $request->input('event'); // e.g., 'delivered', 'opened', 'request', 'click'
        $messageId = $request->input('message-id');

        // 2. Log it for debugging (Important during setup!)
        Log::info("Brevo Webhook Received: {$event} for ID: {$messageId}");

        // 3. Find the record in your database
        $reviewRequest = ReviewRequest::where('provider_id', $messageId)->first();

        if (!$reviewRequest) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        // 4. Update the status based on the event
        switch ($event) {
            case 'opened':
                $reviewRequest->update(['status' => 'opened']);
                break;
            case 'click':
                $reviewRequest->update(['status' => 'clicked_in_email']);
                break;
            case 'delivered':
                $reviewRequest->update(['status' => 'delivered']);
                break;
        }

        return response()->json(['message' => 'Success'], 200);
    }



	public function handleStripe(Request $request)
	{
		$payload = $request->getContent();
		$sigHeader = $request->header('Stripe-Signature');
		$endpointSecret = env('STRIPE_WEBHOOK_SECRET');

		try {
			// Verify the request is actually from Stripe
			$event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
		} catch (SignatureVerificationException $e) {
			return response()->json(['error' => 'Invalid signature'], 400);
		}

		// Handle the specific event
		switch ($event->type) {
			case 'checkout.session.completed':
				$session = $event->data->object;

				// Find your user (assuming you passed user_id in 'metadata' during checkout)
				$userId = $session->metadata->user_id;
				$user = User::find($userId);

				if ($user) {
					// Update your user to 'active' or 'paid'
					$user->update([
						'status' => 'active',
						'stripe_id' => $session->customer, // Save their Stripe ID for later
					]);

					\Log::info("Payment successful for User: " . $user->email);
				}
				break;

			case 'customer.subscription.deleted':
				// Handle cancellation logic here
				break;
		}

		return response()->json(['status' => 'success']);
	}
}