<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24-11-2016
 * Time: 12:50
 */


function __autoload($className){
    include 'classes/'.$className.'-class.php';
}
$body 	= (isset( $_GET['page'] ) ? $_GET['page'] : 'index') . '-body.html';


$webPage	=	new HTMLbuilder('header.html', $body, 'footer.html');

?>