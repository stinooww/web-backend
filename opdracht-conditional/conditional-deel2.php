<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 10:36
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $getal = $_POST["getalL"];

    switch ($getal) {

        case 1:
            $dag = strtoupper("maandag");
            break;
        case 2 :
            $dag = strtoupper("dinsdag");
            break;
        case 3 :
            $dag = strtoupper("woensdag");
            break;
        case 4 :
            $dag = strtoupper("donderdag");
            break;
        case 5 :
            $dag = strtoupper("vrijdag");
            break;
        case 6 :
            $dag = strtoupper("zaterdag");
            break;
        case 7 :
            $dag = strtoupper("zondag");
            break;
        default:
            $dag = strtoupper("weekdag");

    }

    //$weekdag=str_replace( 'A', 'a' , $dag );
    $laatsteA  = strrpos( $dag, 'A' );
       $weekdag =substr_replace( $dag, 'a', $laatsteA, 1 );
    echo $weekdag;
}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>



<form action="conditional-deel2.php" method="post">
geef een getal:<br>
  <input type="text" name="getalL" >

  <input type="submit" value="Submit">
</form>
<p><?php    echo $getal  ?></p>
</body>
</html>
