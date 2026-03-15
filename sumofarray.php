<?php

$arr = array(10, 20, 30, 40);
$sum = 0;

foreach($arr as $num)
{
    $sum = $sum + $num;
}

echo "Sum of array = " . $sum;

?>