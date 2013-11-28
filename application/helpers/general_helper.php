<?php

function ago($time)
{
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $difference     = $now - $time;
    $tense         = "ago";

    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if($difference != 1) {
        $periods[$j].= "s";
    }

    return "$difference $periods[$j] ago ";
}



function clean_input($input) {
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   /* strip out javascript */
        '@<[\/\!]*?[^<>]*?>@si',            /* strip out HTML tags */
        '@<style[^>]*?>.*?</style>@siU',    /* strip style tags properly */
        '@<![\s\S]*?--[ \t\n\r]*>@'         /* strip multi-line comments */
    );

    return preg_replace($search, '', $input);
}