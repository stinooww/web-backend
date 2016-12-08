<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-11-2016
 * Time: 11:38
 */

if (isset($_POST["message"])) {
		$bericht = $_POST["message"];
	}
	else {
		$bericht = "";
	}

try {
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'stijn'); // Connectie maken
    echo $bericht = "succes";
    $query =  "INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
    		  VALUES (:brnaam, :adres, :postcode, :gemeente, :omzet)";


$statement = $db->prepare( $query );
    $statement->bindParam(":brnaam",$_POST["brouwernaam"]);
 			$statement->bindParam(":adres", $_POST["adres"]);
 			$statement->bindParam(":postcode",$_POST["postcode"]);
 			$statement->bindParam(":gemeente",$_POST["gemeente"]);
 			$statement->bindParam(":omzet",$_POST["omzet"]);

$brouwers=$statement->execute();


    if ($brouwers === true) {
   				$pk = $db->lastInsertId();
   				$bericht = "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $pk;
   			}
   			else {
   				$bericht = "Er ging iets mis met het toevoegen. Probeer opnieuw.";
   			}

    }catch(PDOException $ex){
     $bericht= "fout door :". $ex->getMessage();
    }


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
<h1>Voeg een brouwer toe</h1>
	<p><?php echo $bericht ?></p>

<form method="post" action="index.php">
    <label for="brnaam">Brouwernaam</label>
<input name="brnaam" type="text" id="brnaam">
    <br>
    <label for="adres">Brouwersadres</label>
    <input type="text" name="adres" id="adres">
  <br>
    <label for="postcode">Postcode</label>
    <input type="text" name="postcode" id="postcode">
   <br>
    <label for="gemeente">Gemeente</label>
    <input type="text" name ="gemeente" id="gemeente">
    <br>
    <label for="omzet">Omzet</label>
    <input type="text" name="omzet" id="omzet">

    <br>
    <input type="submit" name="submit">

</form>
</body>
</html>
