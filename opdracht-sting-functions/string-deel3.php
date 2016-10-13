<?php
/**
 * Created by PhpStorm.
 * User: stijn h
 * Date: 6-10-2016
 * Time: 20:58
 */

$lettertje  = "e";
$cijfertje  =3;
$langsteWoord = 'zandzeepsodemineralenwatersteenstralen' ;
$woord_repl= str_replace($lettertje,$cijfertje,$langsteWoord);

?>



<!DOCTYPE html>
<html>
<head></head>
<body>

<h1>opdracht deel 3</h1>


<p> <?php echo $woord_repl ?></p>





</body>
</html>