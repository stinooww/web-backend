<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 14:21
 */

$text = file_get_contents("http://web-backend.local/cursus/opdrachten/opdracht-looping-statements-foreach/text-file.txt");
//1 voor 1 alle letters in een array steken
//array aanmaken
$letter_Array = array();
//lengte
$lengte_van_array = strlen($text);

for ($i= 0; $i< $lengte_van_array; ++$i )
	{
		//Splits de tekst op per karakter
		$letter_Array[]	=	substr( $text, $i, 1 );
	}

//print_r($letter_Array);
//z naar 	a
rsort($letter_Array);

//omkeren
$omkeren = array_reverse($letter_Array);

$lijst = array();

//foreach ( $letter_Array as  $letter){
//	++$lijst[$letter];
////$lijst[]= $letter_Array[$letter];
//}

foreach ( $omkeren as  $letter){
    if ( !isset( $lijst[$letter] ) ) {
        $lijst[$letter] = 1;
    } else {
        ++$lijst[$letter];
    }

}
//krijg foutmeldingen maar bergijp niet waarom
?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>For each deel1</h1>

<!--<p>--><?php	// var_dump($letter_Array) ?><!--</p>-->


<p><?php var_dump($lijst)  ?></p>
</body>
</html>

