<?php

if (! function_exists('format_money')) {
    function format_money(float $number, int $decimals = 2): string
    {
        return number_format(bcdiv($number, 1, $decimals), 2);
    }
}

if (! function_exists('ip')) {
    function ip()
    {
        return explode(', ', request()->header('X-Forwarded-For'))[0];
    }
}