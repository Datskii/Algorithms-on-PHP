<?php
// тоже без цикла
$str = 'abccba';
$strrev = strrev($str);
if ($str == $strrev) {
    echo "ЭТО ПАЛЛИНДРОМ"."<br>";
} else {
    echo "ЭТО <b>НЕ</b> ПАЛЛИНДРОМ!!!"."<br>";
}

// результат с рекурсией

function Palindrome($str) {
    if ((strlen($str) == 1) || (strlen($str) == 0)) {
        echo "THIS IS PALINDROME";
    }
    else {
        if (substr($str,0,1) == substr($str,(strlen($str) - 1),1)) {
            return Palindrome(substr($str,1,strlen($str) -2));
        }
        else { echo " THIS IS <b>NOT</b> A PALINDROME"; }
    }
}

 echo Palindrome("defDEF");