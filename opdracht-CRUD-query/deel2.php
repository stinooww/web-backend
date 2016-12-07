<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30-11-2016
 * Time: 11:14
 */

$bericht = "";
$gekozenBrouwer = "";
try{
$bericht= "succesvole verbinding met db";


    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'stijn');
    $query= 'SELECT brouwernr, brnaam

    from brouwers where 1';

    $statement = $db->prepare($query);
    $statement->execute();

    $bieren = array();

    		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
    		{
    			$bieren[]	=	$row;
    		}
    if (isset($_GET['brouwernr'])) {

   			$bierString	=	'SELECT bieren.naam
   															FROM bieren 
   															WHERE bieren.brouwernr = :brouwernr';

   			$bierState = $db->prepare( $bierString );

   			$bierState->bindParam( ':brouwernr', $_GET[ 'brouwernr' ] );

   			$gekozenBrouwer = $_GET['brouwernr'];
   		}
   		else {
   			$bierString	=	'SELECT bieren.naam
   															FROM bieren';

   			$bierState = $db->prepare( $bierString );
   		}

   		$bierState->execute();


   		//Plaats kolomnamen van bieren in bierenKolomNamen array
   		$bierNamen = array();
   		$bierNamen[] = "#";

   		for ($columnNumber = 0; $columnNumber  < $bierState->columnCount( ); ++$columnNumber)
   		{
   			$bierNamen[] = $bierState->getColumnMeta( $columnNumber )['name'];
   		}

   		//Plaats biernamen in bieren array
   		$bieren	=	array();

   		while( $row = $bierState->fetch( PDO::FETCH_ASSOC ) )
   		{
   			$bieren[ ]	=	$row[ 'naam' ];
   		}

   	}

    		catch (PDOException $exception){
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
<?php echo $bericht ?>
<form action="deel2.php" method="get">

    <select name="brouwernr">
    			<?php foreach ($bieren as $key => $brouwer): ?>
    				<option value="<?= $brouwer['brouwernr'] ?>"
						<?= ( $gekozenBrouwer === $brouwer['brouwernr'] ) ? 'selected' : '' ?> >
						<?php echo $brouwer['brnaam'] ?></option>
    			<?php endforeach ?>
    		</select>
    <input type="submit" name="submit" value="Geef mij alle bieren van deze brouwerij">
</form>

<table>
	<thead>
		<tr>
			<?php foreach ($bierNamen as $kolomNaam): ?>
				<td><?php echo $kolomNaam ?></td>
			<?php endforeach ?>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($bieren as $key => $naam): ?>
			<tr>
				<td><?php echo ($key + 1) ?></td>
				<td><?php echo $naam ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
</body>
</html>
