<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 16:03
 */

$cijfers=array(8, 7, 8, 7, 3, 2, 1, 2, 4);
$unique = array_unique($cijfers);

 sort($unique);

?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Function deel 3</h1>

<?php   var_dump($unique); ?>

</body>
</html>

