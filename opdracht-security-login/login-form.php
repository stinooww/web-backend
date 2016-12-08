<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-12-2016
 * Time: 11:24
 */


session_start();
function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}


$notification = "";

$connection = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'stijn');



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="login-process.php" method="POST">
	<ul>
		<li>
			<label for="e-mail">e-mail</label>
			<input type="text" id="e-mail" name="e-mail">
		</li>

		<li>
			<label for="paswoord">paswoord</label>
			<input type="password" id="paswoord" name="paswoord">
		</li>
	</ul>

	<input type="submit" name="inloggen" value="Inloggen">
</form>

<p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a></p>


</body>
</html>
