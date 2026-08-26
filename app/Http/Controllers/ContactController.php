<?php

namespace App\Http\Controllers;
use App\Services\Brevo\BrevoService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Rules\Turnstile;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request, BrevoService $brevo): RedirectResponse
    {
		if ($request->filled('website_url_dedicated')) {
			return response()->json(['message' => 'Bot detected'], 422);
		}

    // 2. Standard Validation
    $data = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string|min:10',
		'cf-turnstile-response' => ['required', new Turnstile],
    ]);

    // 3. Send the Email via Brevo
	$from_name = $data['fname']. ' ' .$data['lname'];
	$response = $brevo->sendContactEmail($from_name, $data['email'], $data['message']);
	if ($response && isset($response['messageId'])) {

		return redirect()->back()->with('success', 'Message sent successfully. We will back to you soon.');
	}

		return redirect()->back()->with('error', 'Could not send message. Please try again later.');

    }


}