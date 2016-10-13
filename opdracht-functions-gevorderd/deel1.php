<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12-10-2016
 * Time: 17:40
 */

$md5HashKey1 ='d1fa402db91a7a93c4f414b8278ce073';
$argument1=	"2";
$argument2=	"8";
$argument3=	"a";

//oefening moette maken met behulp van oplossing
function func1_normaal ($argument1){
    $md5HashKey2 ='d1fa402db91a7a93c4f414b8278ce073';
    $lengte = strlen($md5HashKey2);
    $aantal = substr_count($md5HashKey2,$argument1);


    $procent =($aantal/$lengte)*100;
    return $procent;


}

function func2_global ($argument2){
global $md5HashKey1;
    $lengte = strlen($md5HashKey1);
    $aantal = substr_count($md5HashKey1,$argument2);
    $procent =($aantal/$lengte)*100;
      return $procent;
}

function func3_static ($argument3){
    static $md5HashKey3 ='d1fa402db91a7a93c4f414b8278ce073';
    $lengte = strlen($md5HashKey3);
     $aantal = substr_count($md5HashKey3,$argument3);
     $procent =($aantal/$lengte)*100;
       return $procent;


}
?>

<!DOCTYPE html>
<html >
<meta charset="utf-8">
<head></head>
<body>

	<h1>Function gevorderd</h1>

<?php // ;   ?>
<!--    --><?php //func2_global ($md5HashKey1) ;   ?>
<!--    --><?php //;   ?>
    <p>Het karakter "<?php echo $argument1?>" komt
        <?php echo func1_normaal()?>% voor in de string "     <?php echo $md5HashKey ?>"</p>

   		<p>Het karakter "<?php echo $argument2?>" komt
            <?php echo func2_global ($md5HashKey1) ; ?>% voor in de string "<?php echo $md5HashKey ?>"</p>

   		<p>Het karakter "<?php echo $argument3?>" komt <?php echo func3_static()  ?>% voor in de string "<?php echo $md5HashKey ?>"</p>

</body>
</html>