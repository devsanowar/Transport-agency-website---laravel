<?php

if (!function_exists('read_time')) {
    function read_time($text, $wpm = 200)
    {
        $wordCount = str_word_count(strip_tags($text));

        $minutes = ceil($wordCount / $wpm);

        return $minutes . ' Min Read';
    }
}
