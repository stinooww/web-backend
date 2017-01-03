<?php
/**
 * Created by PhpStorm.
 * User: benhe
 * Date: 22/12/2016
 * Time: 14:36
 */



require_once 'phpmailer/PHPMailerAutoload.php';
//create an instance of PHPMailer
$mail = new PHPMailer();

$mail->From = $_POST['inputEmail'];
$mail->FromName = $_POST['inputName'];
$mail->AddAddress('something@test.com'); //recipient
$mail->Subject = $_POST['inputSubject'];
$mail->Body = "Name: " . $_POST['inputName'] . "\r\n\r\nMessage: " . stripslashes($_POST['inputMessage']);

if (isset($_POST['ref'])) {
    $mail->Body .= "\r\n\r\nRef: " . $_POST['ref'];
}

if (!$mail->send()) {
    $data = array('success' => false, 'message' => 'Het bericht kon niet worden verstuurd. Mail Error: ' . $mail->ErrorInfo);
    echo json_encode($data);
    exit;
}

$data = array('success' => true, 'message' => 'Hartelijk bedankt! We sturen u zo spoedig mogelijk terug.');
echo json_encode($data);


?>