<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8-10-2016
 * Time: 15:11
 */


$kolommen = 10;
$rijen = 10;





?>



<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>De bekende for-lus deel1</h1>

<table border='1' cellpadding="10px">

    <?php


for($a=0;$a<$kolommen;$a++){
        echo "<tr>";
    for($b=0;$b<$rijen;$b++){
        echo "<td> kolom</td>";
    }

    echo "</tr>";
}
    ?>
</table>
</body>
</html>
