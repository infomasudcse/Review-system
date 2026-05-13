<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckSubscriptionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Allow during trial
        if ($user->trial_ends_at && now()->lt($user->trial_ends_at)) {
            return $next($request);
        }

        // If subscribed, allow
        if ($user->is_subscribed && $user->subscription_ends_at && now()->lt($user->subscription_ends_at)) {
            return $next($request);
        }

        // Trial and subscription both expired — redirect
        return redirect()->route('subscription.notice');
    }
}
