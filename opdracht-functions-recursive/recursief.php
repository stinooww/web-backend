<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 21:00
 */

$startkapitaal = 100000;
$rente = 8;
$looptijd = 10;

function berekenRente ($startkapitaal,$rente,$looptijd){

     static $teller=1;
   static  $resultaat= array();

    if($teller<$looptijd){

        $bedragRente = floor($startkapitaal*($rente/100));
        $nieuwBedrag = $bedragRente +$startkapitaal;
        $resultaat[$teller] =   "Het bedrag na ".$teller." jaar is:". $nieuwBedrag."  en uw ontvangen rente daarop bedraagt:". $bedragRente;

        ++$teller;

	return berekenRente ($startkapitaal,$rente,$looptijd);
     		}
     		else
     		{
     			return $resultaat;
     		}



}


$hans= berekenRente ($startkapitaal,$rente,$looptijd);

?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Recursief case hansza</h1>

<!--    // waarom werkt dit niet?-->
<?php //berekenRente($startkapitaal,$rente,$looptijd); ?>


<!---->
<!--    fout in mijn code maar vind die niet-->
<?php foreach($hans as $value): ?>
   				<p><?php echo $value ?></p>
   			<?php endforeach ?>
</body>
</html>

