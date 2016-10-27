<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27-10-2016
 * Time: 11:43
 */


	session_start();

	if ( isset($_POST["submit"]) )
	{
		$_SESSION["registratie"]["straat"] = $_POST["straat"];
		$_SESSION["registratie"]["nummer"] = $_POST["nummer"];
		$_SESSION["registratie"]["gemeente"] = $_POST["gemeente"];
		$_SESSION["registratie"]["postcode"] = $_POST["postcode"];
	}

	var_dump($_SESSION);

	$registratieArray = $_SESSION["registratie"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions: Overzicht</title>
</head>
<body>
	<h1>Overzichtspagina</h1>

	<ul>
		<li>e-mail: <?= $registratieArray["e-mail"] ?> | <a href="registratie.php?focus=e-mail">wijzig</a></li>
		<li>nickname: <?= $registratieArray["nickname"] ?> | <a href="registratie.php?focus=nickname">wijzig</a></li>
		<li>straat: <?= $registratieArray["straat"] ?> | <a href="adres.php?focus=straat">wijzig</a></li>
		<li>nummer: <?= $registratieArray["nummer"] ?> | <a href="adres.php?focus=nummer">wijzig</a></li>
		<li>gemeente: <?= $registratieArray["gemeente"] ?> | <a href="adres.php?focus=gemeente">wijzig</a></li>
		<li>postcode: <?= $registratieArray["postcode"] ?> | <a href="adres.php?focus=postcode">wijzig</a></li>
	</ul>


</body>
</html>