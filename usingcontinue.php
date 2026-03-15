<?php

$num = 5;

for($i = 1; $i <= 10; $i++)
{
    if($i == $num)
    {
        continue;
    }

    echo $i . " ";
}

?>