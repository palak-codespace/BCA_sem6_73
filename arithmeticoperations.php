<?php

$a = 10;
$b = 5;
$choice = "add";

switch($choice)
{
    case "add":
        echo "Addition = " . ($a + $b);
        break;

    case "sub":
        echo "Subtraction = " . ($a - $b);
        break;

    case "mul":
        echo "Multiplication = " . ($a * $b);
        break;

    case "div":
        echo "Division = " . ($a / $b);
        break;

    default:
        echo "Invalid choice";
}

?>