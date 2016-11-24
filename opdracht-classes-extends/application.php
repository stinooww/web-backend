<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23-11-2016
 * Time: 23:55
 */

function __autoload( $className ) {
	    require_once ('classes/' . $className . '.php');
	}


$health1 = 100;

$dier1 = new Animal("Stijn","male", $health1);




$dier2 =  new Animal("ben ","female",$health1);
$dier3 =  new Animal("fred","transgender",$health1);

	?>
<html>
<head>  </head>
<body>

<p><?php echo $dier1->getName() ?> is van het geslacht   <?php echo  $dier1->getGender() ?>  en heeft momenteel  <?php echo $dier1->getHealth() ?>  levenspunten. (special move:  <?php echo $dier1->doSpecialMove() ?> ). </p>


<p><?php echo $dier2->getName() ?> is van het geslacht   <?php echo  $dier2->getGender() ?>  en heeft momenteel  <?php echo $dier2->getHealth() ?>  levenspunten. (special move:  <?php echo $dier1->doSpecialMove() ?> ). </p>

<p><?php echo $dier3->getName() ?> is van het geslacht   <?php echo  $dier3->getGender() ?>  en heeft momenteel  <?php echo $dier3->getHealth() ?>  levenspunten. (special move:  <?php echo $dier1->doSpecialMove() ?> ). </p>
</body>
</html>
