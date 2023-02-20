<?php
//   2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.

function concatenate($str1, $str2)
{
    echo 'Concatenation of two strings : ' . $str1 . $str2;
}

$str1 = 'os';
$str2 = 'tad';
concatenate($str1, $str2);
