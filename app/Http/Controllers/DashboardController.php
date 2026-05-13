<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewRequest;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function __invoke()
    {

		$user = auth()->user();

		$setting = Setting::where('user_id', auth()->user()->id)->first();


		// 1. Get Top-Level Stats (Counts)
		// We use withCount to get the number of related records efficiently
		$total_sent = $user->reviewRequests()->count();
		$total_clicks = $user->reviewRequests()->where('status', 'clicked')->count();
		$conversion_rate = 0;
		if ($total_sent && $total_clicks) {
			$conversion_rate = ($total_clicks / $total_sent) * 100;
			$conversion_rate = number_format($conversion_rate, 1);

		}


		// 2. Get the Activity Feed (The Table)
		// We use 'with' to eager load the customer data in one go
		$requests = $user->reviewRequests()
			->with('client')
			->latest()
			->paginate(10); // Yes, use pagination!

		return view('dashboard', compact('total_sent', 'total_clicks', 'conversion_rate', 'requests', 'setting'));

    }

}
