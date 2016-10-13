<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 11:57
 */
$getal = 77;

if($getal <11){
    $antwoord = " getal ligt tussen 0-10";
}
elseif( $getal <21 && $getal >10){
    $antwoord = " getal ligt tussen 10-20";
}
elseif( $getal <31 && $getal >20){
    $antwoord = " getal ligt tussen 20-30";
}
elseif( $getal <41 && $getal >30){
    $antwoord = " getal ligt tussen 30-40";
}
elseif( $getal <51 && $getal >40){
    $antwoord = " getal ligt tussen 40-50";
}
elseif( $getal <61 && $getal >50){
    $antwoord = " getal ligt tussen 50-60";
}
elseif( $getal <71 && $getal >60){
    $antwoord = " getal ligt tussen 60-70";
}
elseif( $getal <81 && $getal >70){
    $antwoord = " getal ligt tussen 70-80";
}
elseif( $getal <91 && $getal >80){
    $antwoord = " getal ligt tussen 80-90";
}
else{
    $antwoord = " getal ligt tussen 90-100";
}


$droownta  = strrev($antwoord);
?>



<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>If else if</h1>
<p> getal: <?php  echo $getal ?> </p>
<p><?php  echo $antwoord ?></p>

<p> <?php  echo $droownta ?></p>
</body>
</html>
