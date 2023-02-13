<?php
// 1. Write a Reusable  PHP Function that can check Even & Odd Number And Return Decision
// .............. SOLUTION ................

function oddEvenChecker(int $input): string
{
    return $result = $input % 2 == 0 ? 'Even' : 'Odd';
}
// $input = 8;

echo oddEvenChecker(5) . PHP_EOL;


// 2. 1+2+3...…….100  Write a loop to calculate the summation of the series
// .............. SOLUTION ................

function seriesSummation($input)
{
    if ($input == 0) {
        return;
    }
    static $sum = 0;
    $sum += $input--;
    seriesSummation($input);
    return $sum;
}

echo seriesSummation(100);
