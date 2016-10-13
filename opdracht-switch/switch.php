<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 12:09
 */

$weekdag = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $getal = $_POST["getalL"];

    switch ($getal) {

        case 1:
            $dag= "maandag";
            break;
        case 2 :
            $dag= "dinsdag";
            break;
        case 3 :
            $dag= "woensdag";
            break;
        case 4 :
            $dag= "donderdag";
            break;
        case 5 :
            $dag= "vrijdag";
            break;
        case 6 :
            $dag= "zaterdag";
            break;
        case 7 :
            $dag= "zondag";
            break;
        default:
            $dag= "weekdag";

    }
    $weekdag = strtolower($dag);
}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>

<h1> conditional switch</h1>

<form action="switch.php" method="post">
geef een getal:<br>
  <input type="text" name="getalL" >

  <input type="submit" value="Submit">
</form>
<p><?php    echo $weekdag  ?></p>
</body>
</html>

