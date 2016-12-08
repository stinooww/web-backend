<?php 
	
	if (isset($_GET["message"])) {
		$bericht = $_GET["message"];
	}
	else {
		$bericht = "";
	}

	try 
	{
		
		$db = new PDO("mysql:host=localhost;dbname=bieren", "root", "stijn");

		$query = "SELECT * 
											FROM brouwers";

		$statement = $db->prepare($query);

		$statement->execute();

		$brouwers = array();

		while ($row = $statement->fetch( PDO::FETCH_ASSOC )) {
			$brouwers[] = $row;
		}

		$kolomNamen = array();
		$kolomNamen[] = "#";

		foreach ($brouwers[0] as $key => $value) {
			$kolomNamen[] = $key;
		}

		$kolomNamen[] = "";


		if (isset($_POST["delete"])) {
			
			$delQuery = "DELETE FROM brouwers
												WHERE brouwernr = :brouwernr";

			$deleteStatement = $db->prepare($delQuery);

			$deleteStatement->bindParam(":brouwernr", $_POST["delete"]);

			$brouwerDel = $deleteStatement->execute();

			if ($brouwerDel) {
				$bericht = "De datarij werd goed verwijderd.";

				header("location:opdracht-CRUD-order-by-deel2.php?message=$bericht");
			}
			else {
				$bericht = "De datarij kon niet verwijderd worden. Probeer opnieuw.";
			}
		}
	} 
	catch (Exception $e) 
	{
		$bericht = "Er ging iets mis: " . $e->getMessage();
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Oplossing CRUD delete</title>
	<style>
		table {
			border-collapse: collapse;
		}

		tr:nth-child(odd) {
			background-color: #f1f1f1;
		}

		th, td {
			border: 1px solid #D3D3D3;
			padding: 3px;
		}

		.button-delete {
			background-color: transparent;
			border: none;
			padding: 0;
			cursor: pointer;
		}

	</style>
</head>
<body>
	<h1>Overzicht van brouwers</h1>
	<p><?php echo $bericht ?></p>

	<form action="delete-deel1.php" method="POST">
		<table>
	 		<thead>
	 			<tr>
	 				<?php foreach ($kolomNamen as $key): ?>
	 					<th><?php echo $key ?></th>
	 				<?php endforeach ?>
	 			</tr>
	 		</thead>

	 		<tbody>
	 			<?php foreach ($brouwers as $key => $brouwer): ?>
	 				<tr>
	 					<td><?php echo ($key + 1) ?></td>
	 					<?php foreach ($brouwer as $value): ?>
	 						<td><?php echo $value ?></td>
	 					<?php endforeach ?>
	 					<td>
							<button class="button-delete" type="submit" name="delete" value="<?php echo $brouwer[ 'brouwernr' ] ?>">
								<img src="icon-delete.png" alt="delete icon">
							</button>
						</td>
	 				</tr>
	 			<?php endforeach ?>
	 		</tbody>
	 	</table>
	</form>
</body>
</html>