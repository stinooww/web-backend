<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 16:03
 */



$dieren = array("aap","tijger","poes","bibi","konijn");
$aantal = array_count_values($dieren);

function zoekDier($teZoekenDier){
    $dieren = array("aap","tijger","poes","bibi","konijn");
sort($dieren);
    if(array_search($teZoekenDier,$dieren)){
        echo " gevonden!";
    }else{
        echo "niet gevonden";
    }
}

$zoogdieren=array("hond","mamoet","beer");
function toevoegen ($array1,$array2){
    $dierenLijst[]= array_merge($array1,$array2);
    print_r( $dierenLijst);
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
<?php toevoegen($zoogdieren,$dieren) ?>
</body>
</html>

