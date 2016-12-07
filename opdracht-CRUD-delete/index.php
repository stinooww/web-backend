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

    $query = "SELECT * FROM brouwers";

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
    $kolomNaam[] = " ";
    if ( isset( $_POST['delete'] ) )
    		{
                $newQuery	=	'DELETE FROM brouwers
    									WHERE brouwernr = :brouwernr ';

    			$delState = $db->prepare( $newQuery );

                $delState->bindParam( ':brouwernr', $_POST['delete'] );

    			$isDeleted 	=	$delState->execute();

    			if ( $isDeleted )
    			{
                    $bericht = "Deze record is succesvol verwijderd.";

    			}
    			else
    			{

    				$bericht=	'Deze record kon niet verwijderd worden. Reden: ' . $delState->errorInfo()[2];
    			}
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


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <thead>
        			<tr>
                        <th>#</th>
        				<?php foreach ($kolomNaam as $row): ?>
        					<th><?php echo $row ?></th>
        				<?php endforeach ?>
                        <th>    </th>
        			</tr>
        		</thead>
    <tbody>
<?php foreach($brouwers as $key => $value):  ?>
  <tr> <?php foreach ($value as $iets): ?>
    							<td><?= $iets ?></td>
      <?php endforeach ?>
      <td><button id="delete"  type="submit" name="delete" value="<?php echo $value['brouwernr'] ?>">
              <img src="icon-delete.png" alt="delete"> </button></td>
        </tr>
<?php endforeach ?>
    </tbody>


    </table>



</form>

</body>
</html>
