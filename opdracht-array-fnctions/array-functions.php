<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8-10-2016
 * Time: 12:40
 */

//deel 1
$dieren= array("hond","kat","dromedaris","haai","krab");
$aantal = count($dieren);
$zoek = "haai";

//if($zoekWoord= in_array($zoek,$dieren)){
//	echo "het dier " . $zoek. " zit in  deze array";
//};

//deel2
 sort($dieren);
foreach ($dieren as $key => $val) {
    $gesorteerdedieren[] = "dieren[" . $key . "] = " . $val . "\n";
}

$zoogdieren = array("leeuw","panter","vis") ;
$dierenLijst = array_merge($dieren,$zoogdieren);



?>
<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>Opdracht array functions- deel 1</h1>
	<p>array dieren: <?php    var_dump($dieren)?></p>
<p>aantal dieren:<?php  echo $aantal ?></p>

	<p>bevind er zich een <?php  echo $zoek ?> in de array? </p>
	<p><?php  if($zoekWoord= in_array($zoek,$dieren)){
		echo "ja, het dier " . $zoek. " zit in  deze array";
	};      ?></p>


	<h1>Opdracht array functions- deel 2</h1>
	<p>de array gesorteerd:<?php  print_r($gesorteerdedieren)   ?></p>
	<p>de array samengevoegd:<?php  print_r( $dierenLijst) ?></p>


</body>
</html>
