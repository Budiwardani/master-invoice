<?php

if (! function_exists('words')) {

    function words($value, $words = 4, $end = '.....')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}

function serializeDate($date)
{
    return date('d-M-Y H:i', strtotime($date));
}

function formatDate($date) {
    $dates=date_create($date);
    return date_format($dates,"d-M-Y");
}

function formatCompat($date) {
    return date("d-M-Y/H:i",strtotime($date));
}

function formatNumber($number) {
    return number_format($number);
}

?>
