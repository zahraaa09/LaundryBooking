<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('kirimWA')) {

    function kirimWA($number, $message)
    {
        if (!$number) return;

        Http::withHeaders([
            'Authorization' => config('services.fonnte.token')
        ])->post('https://api.fonnte.com/send', [
            'target' => $number,
            'message' => $message,
        ]);
    }

}