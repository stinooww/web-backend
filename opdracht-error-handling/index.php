<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28-11-2016
 * Time: 14:57
 */
session_start();
$messageCode;
$message= array();
$createMessage = false;
$valid = false;
try {
    if (isset($_post["submit"])) {
        if(  !empty($_POST["code"])) {

if(strlen($_POST["code"]) == 8){

    $valid = true;
}else{
    throw new Exception ('VALIDATION-CODE-LENGTH');
}


        }else{
                throw new Exception( "SUBMIT-ERROR" );
            }
    }





}catch (Exception $ex){
    $messageCode = $ex;

switch ($messageCode){

    case  "SUBMIT-ERROR":  $message[ 'type' ] = "error";
        $message['text'] =  "Er werd met het formulier geknoeid";
        break;

    case "VALIDATION-CODE-LENGTH" : $message[ 'type' ] = "error";
        $message['text']= "De kortingscode heeft niet de juiste lengte";
        $createMessage= true;
        break;

}
if($createMessage == true){
    createMessage($message);
}
    logToFile( $message );
}


function logToFile( $message ){
    $user_ip = getUserIP();
    $date_now=date("h:i:s d-m-Y");


    $tekst = $date_now . " - ".$user_ip." - "."type:".$message."\n\r" ;
    return file_put_contents('log.txt',$tekst,FILE_APPEND | LOCK_EX);
}
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

function createMessage($message ){
    $_SESSION[ 'message' ]=$message;
}

function showMessage(){
    $message = false;
   if(isset($_SESSION[ 'message' ])){
       $message	=	$_SESSION[ 'message' ];
       unset( $_SESSION[ 'message' ] );
   }
   return $message;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if (!$valid): ?>
<h2>geef uw kortingscode op</h2>
<form  action="index.php" method="post">
    <label for="code">Kortingscode</label>
    <input type="text" name="code" id="code">
    <button type="submit">Verzenden</button>

</form>
<?php  else: ?>
<p> "Korting toegekend!"</p>
<?php  endif;?>
</body>
</html>