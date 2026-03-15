<?php

$n = 5;
$num = 1;

for($i = 1; $i <= $n; $i++)
{
    for($j = 1; $j <= $i; $j++)
    {
        echo $num . " ";
        $num++;
    }
    echo "<br>";
}

?>