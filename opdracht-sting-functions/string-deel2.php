<?php
/**
 * Created by PhpStorm.
 * User: stijn h
 * Date: 6-10-2016
 * Time: 20:48
 */

$fruit = "ananas";
$fruit_len = strlen($fruit);
$zoek = "a";
$fruit_pos = strripos($fruit,$zoek);
$fruit_hoofd =  strtoupper($fruit);
?>



<!DOCTYPE html>
<html>
<head></head>
<body>

<h1>opdracht deel 2</h1>


<p> <?php echo $fruit_pos ?></p>
<p> <?php echo $fruit_hoofd ?></p>




</body>
</html>