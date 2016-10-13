<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 11:45
 */


$seconde = 221108521;

$minuten = round($seconde/ 60);
$uren = round($minuten /60);
$dagen = round($uren/24);
$maanden = round($dagen/31);
$jaren = round($maanden/12);

?>



<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>If else deel2</h1>
    <h2>Jaren, maanden, weken, dagen, uren, minuten en seconden</h2>
    <p> <?php $seconde?> seconde zijn zoveel:</p>
<?php   echo  $minuten. " minuten ".$uren. " uren ".$dagen. " dagen ".$maanden. " maanden ". $jaren." jaren" ?>
</body>
</html>
