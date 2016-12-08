<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-12-2016
 * Time: 09:35
 */

session_start();



    if(isset($_POST['genereer'])){
     $ww =  $_POST['pwd'];
$generatePassw =  generatePassword(10,true,true,true);
        $_SESSION['registratie']['e-mail'] = $_POST['e-mail'];
        		$_SESSION['registratie']['paswoord'] = $generatePassw;

        		header('location: registratie.php');

    }
function generatePassword(	$lengte,	$hoofdletters = true,
																		$kleineLetters = true,
																		$cijfers = false,
																		$specialeTekens = false )
	{

		$paswoord = "";
		$paswoordKarakters = array();

		$karaktersHoofdletters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$karaktersKleineLetters = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$karaktersCijfers = array(0,1,2,3,4,5,6,7,8,9);
		$karaktersSpecialeTekens = array('+','-','*','/','$','%','@','#','_');


		if ($hoofdletters) {
			for ($i=0; $i < count($karaktersHoofdletters); $i++) {
				$paswoordKarakters[] = $karaktersHoofdletters[$i];
			}
		}

		if ($kleineLetters) {
			for ($i=0; $i < count($karaktersKleineLetters); $i++) {
				$paswoordKarakters[] = $karaktersKleineLetters[$i];
			}
		}

		if ($cijfers) {
			for ($i=0; $i < count($karaktersCijfers); $i++) {
				$paswoordKarakters[] = $karaktersCijfers[$i];
			}
		}

		if ($specialeTekens) {
			for ($i=0; $i < count($karaktersSpecialeTekens); $i++) {
				$paswoordKarakters[] = $karaktersSpecialeTekens[$i];
			}
		}

		$aantalKarakters = 0;

		while ($aantalKarakters < $lengte) {

			$randomNummer = rand(0, (count($paswoordKarakters)-1) );

			$paswoord .= $paswoordKarakters[ $randomNummer ];

			$aantalKarakters++;
		}
		// var_dump($paswoordKarakters);
		// echo $paswoord;

		return $paswoord;
	}
//generatePassword(20, true, true, true);




?>