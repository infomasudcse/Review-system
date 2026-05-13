<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReviewRequestController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\QrcodeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// SEO pages
Route::get('/google-review-link-generator', function () { return view('google-review-link-generator'); });
Route::get('/google-review-qrcode-generator', [QrcodeController::class,'showQrcodePage'])->name('google-review-qrcode');
Route::post('/google-review-qrcode-generator', [QrcodeController::class, 'getQrcode'])->name('google-review-qrcode-generator');

// Web pages
Route::get('/', function () { return view('home'); })->name('home');
Route::get('/features', function () { return view('features'); })->name('features');
Route::get('/pricing', function () { return view('pricing'); })->name('pricing');
Route::get('/terms', function () { return view('terms'); })->name('terms');
Route::get('/privacy-policy', function () { return view('privacy-policy'); })->name('privacy-policy');
Route::get('/faq', function () { return view('faq'); })->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:2,1')->name('contact.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/subscription/notice', function () { return view('subscription.notice'); })->name('subscription.notice');

Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/billing', [BillingController::class, 'index'])->name('billing');
    Route::post('/billing/upgrade', [BillingController::class, 'upgrade'])->name('billing.upgrade');
	Route::get('/billing/portal', [BillingController::class, 'portal'])->name('billing.portal');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::post('clients/storeFromFile', [ClientController::class, 'storeFromFile'])->name('clients.storeFromFile');
	Route::get('clients/download-template/{format}', [ClientController::class, 'downloadTemplate'])->name('clients.template');
    Route::resource('clients', ClientController::class);
    //Route::get('/review-requests/create/{client}', [ReviewRequestController::class, 'create'])->name('review-requests.create');
    //Route::get('/review-requests/create', [ReviewRequestController::class, 'create'])->name('review-requests.index');
    //Route::post('/review-requests/storeWhatsapp', [ReviewRequestController::class, 'storeWhatsapp'])->name('review-requests.store-whatsapp');
   // Route::resource('review-requests', ReviewRequestController::class)->except(['create']);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');

    Route::get('/settings/change-password', [SettingController::class, 'changePassword'])->name('settings.change-password-form');
    Route::post('/settings/change-password', [SettingController::class, 'updatePassword'])->name('settings.change-password');
    Route::get('/qrcode', [QrcodeController::class, 'index'])->name('qrcode');
	// 1. Custom Action (Most specific)
	Route::post('review-requests/store-whatsapp', [ReviewRequestController::class, 'storeWhatsapp'])
		->name('review-requests.store-whatsapp');

	// 2. Custom Create (Overrides the default resource create)
	Route::get('review-requests/create/{client_id}', [ReviewRequestController::class, 'create'])
		->name('review-requests.create');

	// 3. The rest of the standard actions
	Route::resource('review-requests', ReviewRequestController::class)->except(['create']);

	Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints.index');
	Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
	Route::get('/complaints/clear-all', [ComplaintController::class, 'clearAllResolved'])->name('complaints.clear-all');
	Route::get('/complaints/resolved', [ComplaintController::class, 'resolvedIndex'])->name('complaints.resolved');
});

Route::get('/r/{token}', [ReviewRequestController::class, 'redirect'])->name('review-requests.redirect');
Route::get('/b/{slug}', [ReviewRequestController::class, 'qrreview'])->name('review-requests.qrreview');
Route::get('/glog/{id}', [ReviewRequestController::class, 'redirectToGoogle'])->name('log.google');
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');


Route::get('/health-check', function () {
    try {
        // 1. Check Database
        DB::connection()->getPdo();

        // 2. Check Stripe API (Optional but good for ReviewBoost)
        $stripe = Http::get('https://api.stripe.com');

        return response()->json([
            'status' => 'up',
            'services' => [
                'database' => 'connected',
                'stripe_api' => $stripe->successful() ? 'reachable' : 'delayed',
                'server_time' => now()->toDateTimeString(),
            ]
        ], 200)->header('X-Robots-Tag', 'noindex, nofollow');;

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'down',
            'error' => $e->getMessage()
        ], 500);
    }
});

require __DIR__.'/auth.php';
