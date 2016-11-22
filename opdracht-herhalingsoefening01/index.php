<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-11-2016
 * Time: 13:11
 */

 $link = htmlspecialchars($_GET["link"])



?>



<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Herhalingsopdracht </h1>

<ul>
    <il><a href="opdracht-herhalingsopdracht-01.php?link=cursus"></a> Cursus </il>

<il><a href="opdracht-herhalingsopdracht-01.php?link=voorbeelden">Voorbeelden</a>   </il>

    <il><a href="opdracht-herhalingsopdracht-01.php?link=opdrachten">Opdrachten</a>   </il>


</ul>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">




</form>

</body>
</html>
