<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13-10-2016
 * Time: 15:35
 */

function berekenSom($getal1,$getal2){
    $som =$getal1+$getal2;

    return $som;
}

function vermenigvuldig($getal1,$getal2){

    $product = $getal1*$getal2;
    return $product;
}

function isEven($getal1){
    $bool= false;
    if( $getal1 %2==0){
        $bool=true;
    }
    return $bool;
}

function uitbreiding(){

}
?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Opdracht functies</h1>

<?php echo berekenSom(1,2);  ?>

<?php echo vermenigvuldig(2,3); ?>
    <?php echo isEven(3); ?>
</body>
</html>

