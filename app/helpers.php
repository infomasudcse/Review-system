<?php

use App\Helpers\CurrencyHelper;

if (!function_exists('currency_symbol')) {
    function currency_symbol()
    {
        return CurrencyHelper::symbol();
    }
}
