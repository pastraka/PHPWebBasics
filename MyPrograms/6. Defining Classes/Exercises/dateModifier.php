<?php

class DateModifier
{
    public function calculateDateDiff(string $dateFrom, string $dateTo): string
    {
        $date1 = date_create(str_replace(' ', '-', $dateFrom));
        $date2 = date_create(str_replace(' ', '-', $dateTo));
        return date_diff($date1, $date2)->format('%a');
    }
}

$dateFrom = readline();
$dateTo = readline();

$diff = new DateModifier();
echo $diff->calculateDateDiff($dateFrom, $dateTo);