<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-10-2016
 * Time: 12:19
 */


// veel te omslachtig, kan beter
$getallen = array(1,2,3,4,5);
$tijd = $getallen[0]*$getallen[1];
$tijd *= $getallen[2];
$tijd *= $getallen[3];
$tijd *= $getallen[4];

// werkt niet?
$tijdelijk ="";
for($i=0; $i<5;$i++){
    $tijdelijk *= $getallen[$i];
}

$oneven;
foreach ($getallen  as $waarde){
    if($waarde %2 !=0){
        $oneven[] = $waarde;
    }
}


$array2 = array(5, 4, 3, 2, 1);
$arraylengte = count($array2);
$som = array();
for($j=0; $j<$arraylengte;$j++){
    $som[] = $getallen[$j]+ $array2[$j];

}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>

	<h1>Arrays deel2</h1>
<!--<p>--><?php // echo $tijdelijk?><!--</p>-->
   <p>Het product van array 1 is=<?php  echo $tijd?></p>

  <p>De oneven getallen  in deze array zijn = <?php  print_r($oneven) ?></p>
    <p>De som van beidde arrays = <?php  print_r($som) ?></p>

</body>
</html>
