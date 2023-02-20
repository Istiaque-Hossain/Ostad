<?php
//   Write a PHP function to find the second largest number in an array of numbers.

$arr = array(70, 4, 8, 10, 14, 9, 7, 6, 5, 3, 2);

function findSecondMax($a, $b)
{
    return ($a) <=> ($b); //spaceship operator
}

usort($arr, "findSecondMax");
$arrlength = count($arr);

echo "Second Highest Element is - " . $arr[$arrlength - 2];
