<?php
//   4.Write a PHP function to check if a string contains only letters and whitespace.

$name = 'das. gg';

function check($name)
{
    if (ctype_alpha(str_replace(' ', '', $name)) === false) {
        echo 'Name must contain letters and spaces only';
    }
}

check($name);
