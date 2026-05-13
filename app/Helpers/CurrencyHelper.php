<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function symbol()
    {
        // You can expand this logic to fetch from the authenticated user's settings
        $currency = 'USD'; //auth()->user()->currency ?? 'GBP';

        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'INR' => '₹',
            'JPY' => '¥',
            // Add more as needed
        ];

        return $symbols[$currency] ?? '$';
    }
}
