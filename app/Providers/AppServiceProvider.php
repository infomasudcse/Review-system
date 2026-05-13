<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Invoice;
use App\Policies\InvoicePolicy;
use App\Services\FeatureService;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Invoice::class => InvoicePolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FeatureService::class, function ($app) {
            return new FeatureService(auth()->user());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $companyName = 'My Company';

            if (Auth::check()) {
                $setting = Setting::where('user_id', Auth::id())->first();
                if ($setting && $setting->company_name) {
                    $companyName = $setting->company_name;
                }
            }

            $view->with('companyName', $companyName);
        });
    }
}
