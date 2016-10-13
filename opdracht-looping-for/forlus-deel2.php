<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8-10-2016
 * Time: 15:27
 */
$kolommen = 10;
$rijen = 10;
$a=0;
$b=0;
?>
<!DOCTYPE html>
<html>
<head></head>
<style>
 th, td {
        border: 1px solid black;
    }
    #tafel{
        border: 1px solid black;
        padding: 30px;

    }
    td{
        padding: 10px;
    }
 .green{
     background-color: green;
 }
</style>
<body>

	<h1>De  for-lus deel2</h1>



<table id=tafel >

    <?php    for($a=0; $a<$kolommen;  $a++):  ?>
        <tr>
            <?php     for($b=0; $b<=$rijen; $b++):  ?>
    <td class="<?=  (($b*$a) %2 > 0) ? 'green' : '' ?>">
        <?= $b*$a ?>

    </td>

            <?php endfor ?>
    </tr>

    <?php endfor ?>

</table>
</body>
</html>
