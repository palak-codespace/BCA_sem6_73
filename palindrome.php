<?php

$str = "malayalam";

$rev = strrev($str);

if($str == $rev)
{
    echo "$str is a Palindrome";
}
else
{
    echo "$str is not a Palindrome";
}

?>