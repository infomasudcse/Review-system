<?php

namespace App\Services;

use App\Models\User;

class FeatureService
{
    protected $user;

    public function __construct(?User $user = null)
    {
        $this->user = $user ?? auth()->user();
    }

    public function enabled(string $key): mixed
    {
        $plan = $this->user->plan ?? 'free';
        return config("features.features.$key.$plan") ?? false;
    }

    public function label(string $key): string
    {
        return config("features.features.$key.label") ?? ucfirst(str_replace('_', ' ', $key));
    }

    public function all(): array
    {
        return config("features.features", []);
    }

    public function planFeatures(string $plan): array
    {
        return collect($this->all())->mapWithKeys(function ($value, $key) use ($plan) {
            return [$key => $value[$plan] ?? false];
        })->toArray();
    }
}
