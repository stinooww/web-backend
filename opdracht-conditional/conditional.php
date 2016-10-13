<?php
/**
 * Created by PhpStorm.
 * User: stijn
 * Date: 6-10-2016
 * Time: 21:38
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $getal = $_POST["getalL"];

    if($getal == 1){
        echo "maandag";
    }
    if($getal == 2){
           echo "dinsdag";
       }
    if($getal == 3){
           echo "woensdag";
       }
    if($getal == 4){
           echo "donderdag";
       }
    if($getal == 5){
           echo "vrijdag";
       }
    if($getal == 6){
           echo "zaterdag";
       }
    if($getal == 7){
           echo "zondag";
       }

}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>



<form action="conditional.php" method="post">
geef een getal:<br>
  <input type="text" name="getalL" >

  <input type="submit" value="Submit">
</form>
<p><?php    echo $getal  ?></p>
</body>
</html>
