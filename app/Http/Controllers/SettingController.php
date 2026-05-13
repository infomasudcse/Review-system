<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Rules\GoogleReviewLink;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Password;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      	$setting = Setting::where('user_id', auth()->user()->id)->first();

        // $setting = Setting::firstOrCreate(
        //     ['user_id' => $user->id],
        //     ['company_name' => '', 'address_line1' => '', 'phone' => '']
        // );

        return view('settings.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();
		if ($request->has('full_phone')) {
			$request->merge(['phone' => $request->full_phone]);
		}
		$input = trim($request->google_review_link);

		// 1. Check if it's just a Place ID (starts with ChI and has no spaces)
		if (str_starts_with($input, 'ChI') && !str_contains($input, ' ')) {
			// Convert ID to the high-conversion 5-star URL
			//$input = "https://search.google.com/local/writereview?placeid=" . $input;
			$input = "https://search.google.com/local/writereview?placeid=" . $input . "&source=g.page.share";
			$request->merge(['google_review_link' => $input]);
		}

        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'country_code' => 'nullable|string|max:10',
            'google_review_link' => ['required', 'url', 'min: 10', 'max:255', 'regex:/(google\.com|placeid=)/i'],
			'google_business_name' => 'required',
            'default_email_template' => 'required|string|max:500',
            'default_whatsapp_template' => 'required|string|max:555',
        ],
		 [
        	'google_review_link.regex' => 'Please provide a valid Google Review URL or a Google Place ID (starting with ChI).'
    	]);

        $setting = Setting::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );

		if (!$setting->slug) {
			$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $validated['business_name']), '-')) . '-' . Str::random(10);

			$setting->slug = $slug;
			$setting->save();
		}

		$success_message = 'Settings saved successfully.';

        return redirect()->back()->with('success', $success_message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }

	// public function generateGoogleReviewUrl($input) {


	// 	// If they pasted a link that already has a placeid in it, keep it.
	// 	if (str_contains($input, 'placeid=')) {
	// 		return $input;
	// 	}

	// 	// If they just gave you the Place ID (e.g., ChIJ...)
	// 	if (!filter_var($input, FILTER_VALIDATE_URL)) {
	// 		return "https://search.google.com/local/writereview?placeid=" . trim($input);
	// 	}

	// 	// Fallback: Just return what they put if it's a valid URL,
	// 	// but maybe log a warning for yourself.
	// 	return $input;
	// }

	public function changePassword()
	{
		return view('settings.change-password');
	}

	public function updatePassword(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			// This rule automatically checks the input against Auth::user()->password
			'current_password' => ['required', 'current_password'],
			'password' => ['required', 'confirmed', Password::min(8)],
		],[
			'current_password.current_password' => 'Wrong current password. If you forget your cuttent password try FORGET PASSWORD on login page.'
		]);

		// Update the password using the validated data
		$request->user()->update([
			'password' => Hash::make($validated['password']),
		]);

		return redirect()->back()->with('success', 'Password updated.');

	}
}
