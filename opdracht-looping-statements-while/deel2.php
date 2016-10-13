<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11-10-2016
 * Time: 14:17
 */

$boodschappenlijstje = array("eten", "bier", "verboden middelen" , "vodka");
$a =1;
?>

<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>printen array met while lus</h1>

<ul>
<?php
// vond nergens duidelijke uitleg hoe dit op te lossen
//http://php.net/manual/en/control-structures.while.php
$teller = 0;

while( isset( $boodschappenlijstje [ $teller ] ) ):  ?>
<li><?= $boodschappenlijstje [ $teller ] ?></li>
	<?php $teller++ ?>
<?php endwhile ?>


</ul>
</body>
</html>

