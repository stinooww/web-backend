<?php
/**
 * Created by PhpStorm.
 * User: stijn heynderickx
 * Date: 6-10-2016
 * Time: 20:30
 */
$voornaam = 'Stijn';
$achternaam = 'Heynderickx';
$volledigeNaam = $achternaam . ' ' . $voornaam;
$volledigeNaamLengte = strlen($volledigeNaam);
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>

<p>Oplossing string concatenate</p>
<p><?php echo $volledigeNaam ?></p>
		<p>Aantal karakters: <?php echo $volledigeNaamLengte ?></p>
	</body>
</html>