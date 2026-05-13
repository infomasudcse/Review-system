<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $remainingTrialDays = null;

            if (Auth::check() && Auth::user()->trial_ends_at) {
                $now = now();
                $trialEnds = Auth::user()->trial_ends_at;

                $remainingTrialDays = $now->lt($trialEnds)
                    ? $now->diffInDays($trialEnds)
                    : 0;
            }

            $view->with('remainingTrialDays', $remainingTrialDays);
        });
    }
}
