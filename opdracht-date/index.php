<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21-11-2016
 * Time: 11:51
 */


$date = date_create('1904-01-21-22-35-25');
$data = $date->format('Y-m-d H:i:s');

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voorbeeld date-functies</title>

</head>

<body class="web-backend-voorbeeld">

	<section class="body">

		<h1>date-functies</h1>

<p><?php $data  ?></p>

	</section>

</body>
</html>
