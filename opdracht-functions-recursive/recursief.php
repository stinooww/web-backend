<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 21:00
 */



function bank($bedrag){
           $jaar = 1;
           for ($jaar;$jaar<=10;++$jaar){
               $nieuwbedrag = $bedrag *pow(1.08,$jaar);
               echo 'na '.$jaar.' jaar heeft Hans '.$nieuwbedrag.'euro <br>';
           }
       }

$startbedrag = 100000;
$rentevoet= 8;
$looptijd = 10;





?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Recursief case hansza</h1>
<?php bank(100000); ?>

</body>
</html>

