<?php

$arr = array(15, 8, 25, 3, 19);

$max = $arr[0];
$min = $arr[0];

foreach($arr as $num)
{
    if($num > $max)
    {
        $max = $num;
    }

    if($num < $min)
    {
        $min = $num;
    }
}

echo "Greatest number = " . $max;
echo "<br>";
echo "Smallest number = " . $min;

?>