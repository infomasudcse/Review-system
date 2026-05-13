<?php
namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Turnstile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // We send the secret key and the user's token to Cloudflare
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.cloudflare.secret'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        if (!$response->json('success')) {
            $fail('Please complete the security check to prove you are human.');
        }
    }
}