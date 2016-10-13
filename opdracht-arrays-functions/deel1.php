<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 16:02
 */

  $dieren = array("aap","tijger","poes","bibi","konijn");
$aantal = count($dieren);

function zoekDier($teZoekenDier){
    $dieren = array("aap","tijger","poes","bibi","konijn");

    if(array_search($teZoekenDier,$dieren)){
        echo " gevonden!";
    }else{
        echo "niet gevonden";
    }
}
?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Function deel 1</h1>

<p> <?php  var_dump($aantal) ?>
</p>
<?php zoekDier("konijn")?>

</body>
</html>

