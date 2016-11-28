<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 28-11-2016
 * Time: 14:57
 */

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