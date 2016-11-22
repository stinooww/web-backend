<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27-10-2016
 * Time: 11:48
 */


	$password = "123";
	$username = "stijn";
	$message = "";

	if ( isset($_POST["submit"]) ) {
		if ( $_POST["username"] == $username && $_POST["password"] == $password ) {
			$message = "Welkom.";
		}
		else {
			$message = "gebruikersnaam of passwoord is fout. Probeer opnieuw";
		}
	}
//?>
<!--// beter om formulie niet meer te late zine als je bent ingelogd , via variabel $islogedin-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Oplossing post</title>
	<style>
		form ul {
			margin-left: -40px;
		}

		form ul li {
			list-style: none;
		}

		form label {
			display: block;
		}
		form input {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>

	<form action="post.php" method="post">
			<ul>
				<li>
					<label for="username">Username:</label>
					<input type="text" name="username">
				</li>
				<li>
					<label for="password">Password:</label>
					<input type="password" name="password">
				</li>
			</ul>
			<input type="submit" name="submit" value="Query verzenden">
		</form>

		<p><?= $message ?></p>

</body>
</html>