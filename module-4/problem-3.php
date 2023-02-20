<?php
//   Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.

function arrayModify($arrayInput)           
{
    $newArray = $arrayInput;
    array_pop($newArray);
    array_shift($newArray);
    return $newArray;
}

$arrayInput = array(1,2,3,4,5,6);
print_r(arrayModify($arrayInput));
