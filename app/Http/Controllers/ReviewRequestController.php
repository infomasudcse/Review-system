<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ReviewRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Setting;
use App\Services\Brevo\BrevoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ReviewRequestController extends Controller
{
    public function index()
    {
        $setting = Setting::where('user_id', Auth::user()->id)->first();

		if (!$setting) {
			return redirect()->route('settings.index')
				->with('error', 'Review request wil be available after business settings update.');
		}

		$hasPhone = null;
		$client = null;
    	$isSubscribed = Auth::user()->subscribed('pro-plan');

        return view('review-requests.index', compact('setting', 'client', 'hasPhone', 'isSubscribed'));

    }

    public function create($client_id)
    {
        $client = Client::where('user_id', Auth::user()->id)->findOrFail($client_id);
		$setting = Setting::where('user_id', Auth::user()->id)->first();

		$hasPhone = !empty($client->phone);
    	$isSubscribed = Auth::user()->subscribed('pro-plan');

		return view('review-requests.index', compact('setting', 'client', 'hasPhone', 'isSubscribed'));
    }

    public function store(Request $request, BrevoService $brevo): RedirectResponse
    {

		$validated = $request->validate([
            'channel' => ['required', Rule::in(['email'])],
			'email' => 'required|email|max:255',
			'name' => 'required|string|max:100'
		],[
			'email.required' => 'Please enter an email address',
			'name.required' => 'Please enter a name',
		]);

		$merchant = auth()->user();
		$client_qty = $merchant->clients()->count();
		if (!$merchant->subscribed('pro-plan') && $client_qty >= 20) {
			$message = 'You have reached the limit of 20 clients on the Free plan. Upgrade to Pro Plan for unlimited clients';
			return redirect()->route('billing')
				->with('error', $message);
		}

		$client = Client::updateOrCreate(['user_id' => Auth::id(), 'name' => $validated['name'], 'email' => $validated['email']]);


		$message_body = $merchant->settings->default_email_template;
		$token = Str::random(10);
		$shortLink = route('review-requests.redirect', ['token' => $token]);

		$data = [
			'customer_name' => $client->name,
			'business_name' => $merchant->settings->business_name,
			'message_body'  => $message_body,
			'review_link'   => $shortLink
		];
        $email_body = $this->parseEmailTemplate($data);

        $reviewRequest = ReviewRequest::create([
            'user_id' => Auth::id(),
            'client_id' => $client->id,
            'channel' => $validated['channel'],
			'tokenId' => $token,
            'status' => 'pending',
            'body' => $message_body,
        ]);

		$response = $brevo->sendReviewEmail($client, $merchant->settings->business_name, $merchant->settings->email, $email_body);
		if ($response && isset($response['messageId'])) {


			$reviewRequest->update([
				'status' => 'sent',
				'provider_id' => $response['messageId']
			]);

			return redirect()->back()->with('success', 'Review request sent to ' . $client->name);
		}

		return redirect()->back()->with('success', 'Review request saved as pending for ' . $client->name);

    }

	public function storeWhatsapp(Request $request, BrevoService $brevo): RedirectResponse
    {
        if (!$request->user()->subscribed('pro-plan')) {

			return redirect()->route('billing')
				->with('status', 'WhatsApp message is a Pro feature. Please upgrade to continue!');
		}

		if ($request->has('full_phone')) {
			$request->merge(['phone' => $request->full_phone]);
		}

		$validated = $request->validate([
            'channel' => ['required', Rule::in(['whatsapp'])],
			'phone' => 'required|max:100',
			'name' => 'required|string|max:100'
		],[
			'phone.required' => 'Please enter phone number',
			'name.required' => 'Please enter a name',
		]);


		$client = Client::updateOrCreate(['user_id' => Auth::id(), 'name' => $validated['name'], 'phone' => $validated['phone']]);

		$merchant = auth()->user();
		$template = $merchant->settings->default_whatsapp_template;
		$token = Str::random(10);
		$shortLink = route('review-requests.redirect', ['token' => $token]);

		$data = [
			'customer_name' => $client->name,
			'business_name' => $merchant->settings->business_name,
			'review_link' => $shortLink
		];
        $message_body = $this->parseTemplate($template, $data);

        $reviewRequest = ReviewRequest::create([
            'user_id' => Auth::id(),
            'client_id' => $client->id,
            'channel' => $validated['channel'],
			'tokenId' => $token,
            'status' => 'pending',
            'body' => $message_body,
        ]);

		$cleanPhone = preg_replace('/[^0-9]/', '', $validated['phone']);


		$waUrl = "https://wa.me/{$cleanPhone}?text=" . urlencode($message_body);

		return redirect()->away($waUrl);

		// TODO:
		// Change WhatsAppBrevo

		//$response = $brevo->sendReviewEmail($client, $merchant->settings->business_name, $merchant->settings->email, $message_body);
		//if ($response && isset($response['messageId'])) {

			// Update your review_requests table
			//$reviewRequest->update([
			//	'status' => 'sent',
			//	'provider_id' => $response['messageId'] // Store this for tracking!
			//]);

		//	return redirect()->back()->with('success', 'Review request sent to ' . $client->name);
		//}

    }

    public function show(ReviewRequest $reviewRequest)
    {
        abort_if($reviewRequest->user_id !== Auth::id(), 403);

        return view('review-requests.show', compact('reviewRequest'));
    }

    public function destroy(ReviewRequest $reviewRequest)
    {
        abort_if($reviewRequest->user_id !== Auth::id(), 403);

        $reviewRequest->delete();

        return redirect()->route('review-requests.index')
            ->with('success', 'Review request deleted.');
    }

    private function parseTemplate($template, array $data)
	{
		// Define your placeholders and their replacements
		$placeholders = [
			'{CUSTOMER_NAME}' => $data['customer_name'] ?? 'Customer',
			'{BUSINESS_NAME}' => $data['business_name'] ?? 'Our Business',
			'{REVIEW_LINK}'   => $data['review_link'] ?? '#',
		];

		return str_replace(
			array_keys($placeholders),
			array_values($placeholders),
			$template
		);
	}

	private function parseEmailTemplate(array $data) {
		$template = '<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
						<tr>
							<td align="center">
								<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

									<tr>
										<td class="body" width="100%" cellpadding="0" cellspacing="0">
											<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
												<tr>
													<td class="content-cell">
														<h1>Dear '.$data["customer_name"].',</h1>
														<p>'.$data["message_body"].'</p>
														<p><strong><a href="'.$data["review_link"].'">Leave us a review</a></strong></p>
														<p>It only takes a minute and helps '.$data["business_name"].' to continue providing the best service.</p>
														<p>If you would like to get in touch, you can contact '.$data["business_name"].' directly.</p>
														<p>Thank you</p>
														<p>'.$data["business_name"].'</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>

									<tr>
										<td>
											<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
												<tr>
													<td class="content-cell" align="center" style="padding: 35px;">
														<p style="color: #aeaeae; font-size: 12px; text-align: center;">
															© '. date('Y') .' getreviewboost.com. All rights reserved.
														</p>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>';



		/*$template = '<table width="100%" cellpadding="0" cellspacing="0">
						<p>Dear '.$data["customer_name"].',</p>
						<p>'.$data["message_body"].'</p>
						<p><strong><a href="'.$data["review_link"].'">Leave us a review</a></strong></p>
						<p>It helps '.$data["business_name"].' to continue providing the best service.</p>
						<p>If you would like to get in touch, you can contact '.$data["business_name"].' directly.</p>
						<p style="font-size: 11px;margin-top:20px;">
							Thank you, <br/>
							'.$data["business_name"].'
						</p>
					</table>';*/

		return $template;
	}

	public function redirect($token)
	{
		$reviewRequest = ReviewRequest::with('client.user')
			->where('tokenId', $token)
			->firstOrFail();

		$alreadyComplained = \App\Models\Complaint::where('tokenId', $token)->exists();

		$reviewRequest->update([
			'status' => 'clicked',
			'clicked_at' => now(),
		]);
		//$googleUrl = $reviewRequest->client->user->settings->google_review_link;
		//return redirect()->away($googleUrl);
		return view('review-landing.review-landing', [
			'reviewRequest' => $reviewRequest,
			'client' => $reviewRequest->client,
			'businessName' => $reviewRequest->client->user->settings->business_name,
			'alreadyComplained' => $alreadyComplained
		]);
	}

	public function qrreview($slug)
	{

		$merchant_settings = Setting::where('slug', $slug)->firstOrFail();
		if(!$merchant_settings) {
			return;
		}

		$client = Client::Create(['user_id' => $merchant_settings->user_id, 'name' => 'Anonymous']);

		$reviewRequest = ReviewRequest::create([
            'user_id' => $merchant_settings->user_id,
            'client_id' => $client->id,
            'channel' => 'qrcode',
			'tokenId' => '',
            'status' => 'scanned',
            'body' => '',
        ]);

		return view('review-landing.review-landing', [
			'reviewRequest' => $reviewRequest,
			'client' => $client,
			'businessName' => $merchant_settings->business_name,
			'alreadyComplained' => '',

		]);

	}

	public function redirectToGoogle($id)
	{
		// Find the record (from Email or QR)
		$request = ReviewRequest::findOrFail($id);

		// Log the intent immediately
		$request->update(['google_clicked_at' => now()]);

		// Get the merchant's link
		$googleUrl = $request->user->settings->google_review_link;

		// Send them away
		return redirect()->away($googleUrl);
	}


}
