<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 7-12-2016
 * Time: 22:10
 */

session_start();

function __autoload( $classname )
{
	require_once( $classname . '.php' );
}
$bericht = "";
try{
    $connection = new PDO('mysql:host=localhost;dbname=phpoefening029', 'root', 'stijn');

}catch (PDOException $pdoex){
    $bericht= "er ging iets fout ". $pdoex;
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
<form action="registratie-process.php" method="post">

    <input type="text" name="email" id="email">
    <label for="email"> e-mail</label>
    <input type="text" name="pwd" id="pwd" >
    <label for="pwd">paswoord</label>
    <input type="button" name="genereer" value="genereer een paswoord">
    <input type="button" name="registreer" value="registreer">
</form>
</body>
</html>
