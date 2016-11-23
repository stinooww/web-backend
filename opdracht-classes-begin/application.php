<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23-11-2016
 * Time: 23:23
 */



//__autoload(./classes/Percent.php);

function __autoload( $className ) {
	    include 'classes/' . $className . '.php';
	}

$getal = 150;
$getal1 = 100;
$percent = new Percent($getal,$getal1);





?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p> Hoeveel percent is <?php echo $getal ?> van  <?php echo $getal1 ?>   ?</p>
<table>
  <tr>
  <td> absoluut </td>
      <td> <?php   echo $percent->absolute?> </td>
  </tr>
    <tr>
    <td> relatief </td>
        <td> <?php   echo $percent->relative?>   </td>
    </tr>
    <tr>    <td>    geheel getal</td>
    <td>  <?php   echo $percent->hundred?>   </td></tr>
    <tr>    <td>   normaal getal</td>
       <td>  <?php   echo $percent->nominal?>   </td></tr>
</table>
</body>
</html>