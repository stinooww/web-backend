<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29-11-2016
 * Time: 09:32
 */


$bericht="";
try {
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'stijn'); // Connectie maken


        $query = "SELECT b.biernr,	b.naam, 
												b.brouwernr, 
												b.soortnr, 
												b.alcohol,
												br.naam,
												br.adres,
												br.gemeente,
												br.omzet,
									FROM bieren as b
									INNER JOIN brouwers as br
									ON b.brouwernr = br.brouwernr
									WHERE b.naam LIKE ='du%' AND br.brnaam LIKE '%a%'";

        $statement = $db->prepare($query);
        $statement->execute();
//        $fetchRow = array();

    $bieren = array();

  		while ($row = $statement->fetch( PDO::FETCH_ASSOC )) {
  			$bieren[] = $row;
  		}
    $kolomNaam = array();
		$kolomNaam[] = "bier ";

		foreach ($bieren[0] as $key => $value) {
			$kolomNaam[] = $key;
		}
echo $bericht = "succes";

}catch(PDOException $ex){
   echo $bericht= "fout door :". $ex->getMessage();
}



//?>
<!--html:5-->

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

<h1>CRUD query: deel 1</h1>
<p><?php echo $bericht ?></p>
<table>
<thead> <tr>  <?php foreach ($kolomNaam as $key): ?>
 					<th><?php echo $key ?></th>
 				<?php endforeach ?>
</tr></thead>
    <tbody>
    			<?php foreach ($bieren as $key => $bier): ?>
    				<tr>
    					<td><?php echo ($key + 1) ?></td>
    					<?php foreach ($bier as $value): ?>
    						<td><?php echo $value ?></td>
    					<?php endforeach ?>
    				</tr>
    			<?php endforeach ?>
    		</tbody>




</table>
</body>
</html>