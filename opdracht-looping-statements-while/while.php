<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 11-10-2016
 * Time: 13:57
 */

$x= 0;
while($x<101){
    echo $x." ,";
    $x++;


}

?>

<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>While lus</h1>
<p>
    <?php

    $ax= 1;
    while($ax<101 ){

        if($ax >40 && $ax<80 && $ax %3 == 0 ){
            echo $ax." ,";
        }

        $ax++;


    }
    ?>


</p>

</body>
</html>




