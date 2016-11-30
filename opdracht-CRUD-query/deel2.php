<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-11-2016
 * Time: 11:14
 */

$bericht = "";
try{
$bericht= "succesvole verbinding met db";


    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'stijn');
    $query= 'SELECT brouwer.nummer, brouwer.naam
    from BIEREN as b INNER JOIN brouwers as br
    									ON b.brouwernr = br.brouwernr';

    $statement = $db->prepare($query);
    $statement->execute();

    $bieren = array();

    		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
    		{
    			$bieren[]	=	$row;
    		}

}catch (PDOException $exception){
    $bericht= "er ging iets fout". $exception;
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

<form action="get">
<input>

    <submit type="submit">Geef mij alle bieren van deze brouwerij</submit>
</form>

</body>
</html>
