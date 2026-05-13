<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GoogleReviewLink implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
		if (!str_contains($value, 'google.com') && !str_contains($value, 'g.page')) {
			$fail('The :attribute must be a valid Google Review link.');
		}
    }
}
