<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 12:17
 */


$dieren = array('kat','hond','krokodil','muis','aap','leeuw','flamingo','beer','vleermuis','fred');

$anderediere[] = "kat";
$anderediere[] = "hond";
$anderediere[] = "fred";
$anderediere[] = "olifant";
$anderediere[] = "muis";
$anderediere[] = "kat";
$anderediere[] = "bever";
$anderediere[] = "paard";
$anderediere[] = "eekhoorn";

$voertuigen = array(
    'landvoertuigen' => array("auto", "brommer", "fiets"),
    'watervoertuigen'  => array("boot", "duikboot", "schip"),
    'luchtvoertuigen' => array("B52", "luchtballon","helikopter")



);

?>


<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>Arrays deel1</h1>
    <?php  print_r($anderediere) ?>

    <p><?php  print_r($dieren) ?></p>

    <p><?php  var_dump($voertuigen)?></p>
</body>
</html>
