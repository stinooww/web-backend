<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27-10-2016
 * Time: 11:46
 */



	$textfile = file_get_contents("test.txt");	//neemt de inhoud van een bestand en plaatst dit in een string

	$accountArray = explode(",", $textfile);	//plaats inhoud van een string in een array, met "," als scheiding

	$ingelogd = false;
	$message = false;


	if ( isset($_POST["submit"]) ) {

		if ( $_POST["gebruikersnaam"] == $accountArray[0] && $_POST["paswoord"] == $accountArray[1] ) {
			setcookie("loginCookie",true, time()+360);
			header("Location: cookies.php");
		}
		else {
			$message = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
		}
	}
	if (isset($_COOKIE["loginCookie"])) {
		$ingelogd = true;
		$message = "U bent ingelogd";
	}


	if ( isset($_GET["delete-cookie"]) ) {
		setcookie("loginCookie", "", time()-3600);
		header("Location: cookies.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Oplossing Cookies</title>
	<style>
		li {
			list-style: none;
			margin-bottom: 10px;
		}

		label {
			display: block;
		}

		.fout {
			padding: 5px;

			color: #B94A48;
			background-color: #F2DEDE;
			border: 1px solid #EED3D7;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<h1>Inloggen</h1>

	<?php if ( $message ): ?>
		<p><?= $message ?></p>
	<?php endif ?>


	<?php if ( $ingelogd ): ?>

		<a href="cookies.php?delete-cookie=true">Uitloggen</a>

	<?php else: ?>

		<form action="cookies.php" method="post">
			<ul>
				<li>
					<label for="gebruikersnaam">gebruikersnaam</label>
					<input type="text" name="gebruikersnaam" id="gebruikersnaam">
				</li>
				<li>
					<label for="paswoord">paswoord</label>
					<input type="password" name="paswoord" id="paswoord">
				</li>
				<li>
					<input type="submit" name="submit" value="Query verzenden">
				</li>
			</ul>
		</form>

	<?php endif ?>



</body>
</html>