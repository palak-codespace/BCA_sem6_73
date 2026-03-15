<?php
$a = 10;
$b = 25;
$c = 18;

if($a >= $b && $a >= $c)
{
    echo "Greatest number is $a";
}
elseif($b >= $a && $b >= $c)
{
    echo "Greatest number is $b";
}
else
{
    echo "Greatest number is $c";
}
?>