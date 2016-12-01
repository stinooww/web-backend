<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-11-2016
 * Time: 11:59
 */

$bericht="";
try {
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'stijn'); // Connectie maken
   $bericht = "succes";

    $query = "SELECT *
   			  FROM brouwers";

           $statement = $db->prepare($query);
           $statement->execute();

    $brouwers = array();

     		while ($row = $statement->fetch( PDO::FETCH_ASSOC )) {
     			$brouwers[] = $row;
     		}
       $kolomNaam = array();
   		$kolomNaam[] = "bier ";

   		foreach ($brouwers[0] as $key => $value) {
   			$kolomNaam[] = $key;
   		}
$query ="DELETE * from brouwers where brouwernr= :brouwernr";
    $statement = $db->prepare($query);
               $statement->execute();

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
<p><?php echo $bericht ?></p>
<h1>    delete een brouwer</h1>
</body>
</html>
