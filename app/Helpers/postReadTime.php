<?php

if (!function_exists('read_time')) {
    function read_time($text, $wpm = 200)
    {
        // HTML ট্যাগ মুছে ফেলুন
        $cleanText = strip_tags($text);

        // Unicode regex দিয়ে বাংলা + English শব্দ ধরুন
        preg_match_all('/[\p{L}\p{N}_]+/u', $cleanText, $matches);

        $wordCount = count($matches[0]);

        // অন্তত 1 মিনিট ধরে নেবো
        $minutes = max(1, ceil($wordCount / $wpm));

        return $minutes . ' Min Read';
    }
}
