<?php

namespace App;

class Helpers
{

    static function get_d_F_date($date)
    {
        $day = $date->format("d");
        $month = intval($date->format("m"));
        $months = [
            "",
            "январь",
            "февраль",
            "март",
            "апрель",
            "май",
            "июнь",
            "июль",
            "август",
            "сентябрь",
            "октябрь",
            "ноябрь",
            "декабрь"
        ];
        return "$day $months[$month]";
    }

}