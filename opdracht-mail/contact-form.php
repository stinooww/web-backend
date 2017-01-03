<?php
/**
 * Created by PhpStorm.
 * User: benhe
 * Date: 19/12/2016
 * Time: 14:07
 */


//
if(isset($_POST['verzendButton'])) {


    if (isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputSubject']) && isset($_POST['inputMessage'])) {

        //check if any of the inputs are empty
        if (empty($_POST['inputName']) || empty($_POST['inputEmail']) || empty($_POST['inputSubject']) || empty($_POST['inputMessage'])) {
            $data = array('success' => false, 'message' => 'Vul uw gegevens volledig in aub.');
            echo json_encode($data);
            exit;
        }


    } else {

        $data = array('success' => false, 'message' => 'Vul uw gegevens volledig in aub.');
        echo json_encode($data);

    }
}

?>
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

<form action="contact.php" role="form" method="post">
    <input type="text" name="inputName">
    <input type="text" name="inputEmail" value="Geef uw email adres">

    <textarea name="inputSubject" id="textInput" cols="10" rows="4"></textarea>
    <input type="checkbox" name="checkBox">
    <label for="checkBox">Stuur een kopie naar mezelf</label>
    <input type="submit" value="verzend" name="verzendButton">

</form>

</body>
</html>
