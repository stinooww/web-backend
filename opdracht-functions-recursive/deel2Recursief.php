<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13-10-2016
 * Time: 13:41
 */


$startkapitaal = 100000;
$rente = 8;
$tijd = 10;

function berekenRente (){

//     static $teller=1;
//   static  $resultaat= array();

//    if($teller<$tijd){
//
//        $bedragRente = floor($startkapitaal*($rente/100));
//        $nieuwBedrag = $bedragRente +$startkapitaal;
//        $resultaat[$teller] =   "Het bedrag na ".$teller." jaar is:". $nieuwBedrag."  en uw ontvangen rente daarop bedraagt:". $bedragRente;
//
//        ++$teller;
//
//	return berekenRente ($startkapitaal,$rente,$looptijd);
//     		}
//     		else
//     		{
//     			return $resultaat;
//     		}



}
$hans = berekenRente( array( 'kapitaal' => $startkapitaal,
											'renteInProcent' => $rente,
											'tijd' => $tijd,
											'teller'	=> 1,
											'historiek'	=>	array() ) );



?>



<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Recursief deel2</h1>


</body>
</html>


