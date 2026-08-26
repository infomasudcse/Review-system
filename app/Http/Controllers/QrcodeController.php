<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;


class QrcodeController extends Controller
{
    public function index()
    {

		$user = Auth::user();

		if (!$user->settings) {
			return redirect()->route('settings.index')
				->with('error', 'Qrcode will be available after business settings Update.');
		}

		if (!$user->subscribed('pro-plan')) {
			$message = 'Upgrade to Pro Plan for smart QRcode Trackings.<br/> Get the <a class="alert-link" href=' . route('google-review-qrcode') .'>Free version here</a>';
			return redirect()->route('billing')
				->with('error', $message);
		}

		$qrUrl = route('review-requests.qrreview', ['slug' => $user->settings->slug]);
		$qrCode = QrCode::size(300)->generate($qrUrl);
		$businessName = $user->settings->business_name;

		return view('qrcode.index', compact('qrCode', 'qrUrl', 'businessName'));
    }

	public function showQrcodePage()
	{

		$qrCode = QrCode::size(300)->generate('https://www.getreviewboost.com');
		$businessName = 'Review Boost';

		return view('google-review-link-qrcode-generator', compact('qrCode', 'businessName'));
	}

	public function getQrcode(Request $request)
	{
		$request->validate([
            'review_link' => ['required', 'url', 'min: 10', 'max:255', 'regex:/(google\.com|placeid=)/i'],
			'business_name' => 'required|string|max:100|min:3'
        ],
		[
        	'review_link.regex' => 'Please provide a valid Google Review URL.'
    	]);

		$qrCode = QrCode::size(300)->generate($request->review_link);
		$businessName = $request->business_name;

		return view('google-review-link-qrcode-generator', compact('qrCode', 'businessName'));
	}


}