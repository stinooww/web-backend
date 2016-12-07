<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 6-12-2016
 * Time: 15:23
 */

$bericht="";
$bevestiging=false;
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
    $kolomNaam[]="";

    if ( isset( $_POST['delete'] ) )
    		{
                $bevestiging=true;
               // $ja = ;
            if(isset($_POST['ja'])){
                $newQuery	=	'DELETE FROM brouwers
                									WHERE brouwernr = :brouwernr';

                			$delState = $db->prepare( $newQuery );

                            $delState->bindParam( ':brouwernr', $_POST['delete'] );

                			$isDeleted 	=	$delState->execute();

                			if ( $isDeleted )
                			{
                                $bericht = "Deze record is succesvol verwijderd.";

                			}
                			else
                			{

                				$bericht=	"De datarij kon niet verwijderd worden. Probeer opnieuw. Reden: " . $delState->errorInfo()[2];
                			}


            }
    		}
    $brouwerNaam =  null;
    $brouwerNr =  null;
    $editBevestiging =  false;
    $Brouwer = null;
//$edit = ;
    if(isset($_POST['edit'])){
        foreach ($brouwers as $key => $brouwer){
            if($brouwer["brouwernr"]== $_POST['edit']){
                $editBevestiging =  true;
                $brouwerNaam = $brouwer["brnaam"];
                $brouwerNummer = $_POST['edit'];
                $Brouwer = $brouwer;
            }
        }
        if ($brouwerNaam == null && $brouwerNr == null) {
            $bericht = "Deze brouwerij werd niet gevonden.";
        			}
    }



    //$conformEdit = $_POST["bevestiging"];
    if(isset($_POST["bevestiging"])){
        $updatequery	=	'UPDATE brouwers	SET brnaam 		= :brnaam,
        		  adres			=	:adres,	postcode 	=	:postcode,
        			gemeente 	=	:gemeente,	omzet			=	:omzet
        	  WHERE brouwernr	= :brouwernr';

        $updateStatement = $db->prepare( $updatequery );

        			$updateStatement->bindParam(":brnaam", 		$_POST["brnaam"]);
        			$updateStatement->bindParam(":adres", 		$_POST["adres"]);
        			$updateStatement->bindParam(":postcode", 	$_POST["postcode"]);
        			$updateStatement->bindParam(":gemeente", 	$_POST["gemeente"]);
        			$updateStatement->bindParam(":omzet", 		$_POST["omzet"]);
        			$updateStatement->bindParam(":brouwernr", $_POST["brouwernr"]);

        			$brouwerUpdated = $updateStatement->execute();

        			if ($brouwerUpdated) {
        				$bericht = "Aanpassing succesvol doorgevoerd.";
        			}
        			else {
        				$bericht = "Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden. <a href='mailto:systeembeheerder@hotmail.com>Systeembeheerder</a>";
        			}

        		}





}catch(PDOException $ex){
    $bevestiging=false;
    $editConfig=false;
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
    <style>

    table{
       padding: 2%;
        border: solid black 2px;
    }
    td{
        border: solid black 2px;
    }
    .even
   			{
   				background-color:lightgrey;
   			}

   			.delete-button
   			{
   				background-color	:	transparent;
   				border				:	none;
   				padding				:	0;
   				cursor				:	pointer;
   			}
    </style>
</head>
<body>
<p><?php echo $bericht ?></p>
<h1>    delete een brouwer</h1>
<?php if($bevestiging): ?>
<div>   <h3>    bent u zker dat u deze wilt verwijderen</h3>

    <form action=" update.php " method="post">
       <button id="ja" name="ja" type="submit" value="<?php echo $deleteId ?>"> Ja!</button>
        <button name="nee" type="button">    Néééééé!</button>
    </form>
</div>
<?php endif ?>
<?php if($editBevestiging): ?>
<div>


    <form action="update.php" method="post">
        <ul>
   					<?php foreach ($Brouwer as $fieldname => $value): ?>

   						<?php if ( $fieldname != "brouwernr" ): ?>
   							<li>
   								<label for="<?= $fieldname ?>"><?= $fieldname ?></label>
   								<input type="text" id="<?= $fieldname ?>" name="<?= $fieldname ?>" value="<?= $value ?>">
   							</li>
   						<?php endif ?>

   					<?php endforeach ?>
   				</ul>
   				<input type="hidden" value="<?= $brouwerNr ?>" name="brouwernr">
   				<input type="submit" name="bevestiging" value="Query Verzenden">
   			</form>
</div>
<?php endif ?>


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <thead>
        			<tr>
                        <th>#</th>
        				<?php foreach ($kolomNaam as $row): ?>
        					<th><?php echo $row ?></th>
        				<?php endforeach ?>

        			</tr>
        		</thead>
    <tbody>
<?php foreach($brouwers as $key => $value):  ?>
  <tr>
      <?php foreach ($value as $iets): ?>
    							<td><?php echo $iets ?></td>
      <?php endforeach ?>
      <td><button id="delete"  type="submit" name="delete" value="<?php echo $value['brouwernr'] ?>"><img src="icon-delete.png" alt="delete"> </button></td>
      <td>
      							<button class="button" type="submit" name="edit" value="<?php echo $value[ 'brouwernr' ] ?>">
      								<img src="icon-edit.png" alt="edit icon">
      							</button>
      						</td> </tr>
<?php endforeach ?>
    </tbody>


    </table>



</form>

</body>
</html>
