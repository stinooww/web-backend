<?php
/**
 * Created by PhpStorm.
 * User: stijn h
 * Date: 6-10-2016
 * Time: 20:47
 */

$fruit =    "kokosnoot";
$fruit_len = strlen($fruit);
$zoek = "o";
$fruit_pos = strpos($fruit,$zoek);
?>



<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>opdracht deel 1</h1>
<?php echo $fruit_len ?>
<p> <?php echo $fruit_pos ?></p>



</body>
</html>