<?php
// 1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)

function my_sort($a, $b)
{
    // if (strlen($a) == strlen($b)) return 0;
    // return (strlen($a) < strlen($b)) ? -1 : 1;

    return strlen($a) <=> strlen($b); //spaceship operator
}

$a = array('aaaaaa', 'aa', 'aaa', 'aaaa');
usort($a, "my_sort");

$arrlength = count($a);
for ($x = 0; $x < $arrlength; $x++) {
    echo $a[$x] . PHP_EOL;
    // echo "<br>";
}
