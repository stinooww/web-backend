<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13-10-2016
 * Time: 15:14
 */

$artikels=array(


    array("titel" =>'Aandeel Ablynx in vrije val na afhaken AbbVie',
    "datum" => '20/10/2016',
   "inhoud"=> 'Farmareus AbbVie ziet dan toch geen brood in het nieuwe reumamiddel dat biotechbedrijf Ablynx aan het ontwikkelen is. Ablynx start nu zelf de volgende onderzoeksfase op, en moet op zoek naar een nieuwe partner.',
   "afbeelding"=> 'ablynx-logo.png',
   "afbeeldingbeschrijving"=> 'Ablynx'),


    array("titel" =>'Bourgeois: "PS voert liever wapens uit naar Saoedi-Arabië dan appels en peren naar Canada',
    "datum" => '20/10/2016',
   "inhoud"=> 'België kan het Europees-Canadese vrijhandelsverdrag CETA niet goedkeuren zolang Wallonië dat tegenhoudt. Dat zegt Vlaams minister-president Geert Bourgeois. De N-VA\'er is niet mals voor de PS: "Die voert blijkbaar liever wapens uit naar Saoedi-Arabië dan appelen en peren naar Canada", zegt hij donderdag.',
   "afbeelding"=> 'media_xll_9193127.jpg',
   "afbeeldingbeschrijving"=> 'Geert Bourgeois'),

    array("titel" =>'Van onze reporters aan het front in Mosoel: strijd met vliegtuigbommen en tanks vanochtend gestart',
    "datum" => '20/10/2016',
   "inhoud"=> 'Een paar uur geleden bij het ochtendgloren hebben de Peshmerga-strijders de aanval op Mosoel hervat. Nadat vliegtuigen en drones eerst nog bommen hadden gedropt op het IS-bolwerk, vertrokken strijders naar het front. Onze reporters waren erbij en zagen hoe gepensioneerde Peshmerga-strijders vrijwillig mee naar het front trokken voor wat wellicht hun laatste oorlog zal worden.',
   "afbeelding"=> 'media_xll_9192685.jpg',
   "afbeeldingbeschrijving"=> 'afbeeldingBeschrijving')


);

$individueelArtikel		=	false;
	$nietBestaandArtikel	=	false;

	// Controleren of de get-variabele ID geset is om een individueel artikel op te halen
	if ( isset ( $_GET['id'] ) )
	{
		$id = $_GET['id'];

		// Controleren of de opgevraagde key (=id) bestaat in de array $artikels
		if ( array_key_exists( $id , $artikels ) )
		{
			$artikels 			= 	array( $artikels[$id] );
			$individueelArtikel	=	true;
		}
		else
		{
			$nietBestaandArtikel	=	true;
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php if (!$individueelArtikel): ?>
		<title>Oplossing get</title>
	<?php elseif ($nietBestaandArtikel):  ?>
		<title>Oplossing get: Artikel met id <?php echo $id ?> Bestaat niet ?></title>
	<?php else: ?>
		<title>Oplossing get: <?php echo $artikels[0]["titel"]  ?></title>
	<?php endif ?>
	<style>

		body {
			font-family: sans-serif;
		}

		article h2 {
			border-bottom: 1px solid grey;
		}

		.multiple {
			float: left;
			width: 300px;
			margin-left: 30px;
			padding: 10px;

			background-color: lightgray;
		}

		img {
			width: 100%;
		}

		.single {
			width: 600px
		}

	</style>
</head>
<body>
	<?php if (!$nietBestaandArtikel): ?>
		<div class="container">
			<?php foreach ($artikels as $id => $artikel): ?>
				<?php if ($individueelArtikel): ?>
					<a href="opdracht-get.php">Terug naar overzicht</a>
				<?php endif ?>
				<article class="<?php echo (!$individueelArtikel) ? 'multiple' : 'single' ?>">
					<h1><?php echo $artikel["titel"] ?></h1>
					<p><?php echo $artikel["datum"] ?></p>
					<img src="img/<?php echo $artikel['afbeelding'] ?>" alt="<?php echo $artikel['afbeeldingbeschrijving'] ?>">
					<p><?php echo (!$individueelArtikel) ? (substr($artikel["inhoud"], 0, 50) . "...") : $artikel["inhoud"] ?></p>
					<?php if (!$individueelArtikel): ?>
						<a href="opdracht-get.php?id=<?php echo $id ?>">Lees meer</a>
					<?php endif ?>
				</article>
			<?php endforeach ?>
		</div>
	<?php else: ?>
		<p>Het artikel met id <? echo $id ?> bestaat niet. Probeer een ander artikel.</p>
		<a href="opdracht-get.php">Terug</a>
	<?php endif ?>


</body>
</html>
