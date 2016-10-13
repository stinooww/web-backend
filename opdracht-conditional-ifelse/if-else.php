<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 10:54
 */


$jaartal=2017;

if($jaartal % 4==0 || $jaartal %400==0 && $jaartal %100 !== 0 ){

    $zin =' is een schrikkeljaar.';
}else{
    $zin = ' is geen schrikkeljaar.';
}

?>




<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>opdracht If else</h1>


<p> Het jaar <?php    echo $jaartal." ". $zin  ?> </p>
</body>
</html>
