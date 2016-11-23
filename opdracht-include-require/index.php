<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21-11-2016
 * Time: 13:20
 */

$artikels= array(
    array('titel'=>'Titel van artikel 1','text' =>'tekste van artikel 1','tags'=>'tags artikel 1'),
    array('titel'=>'Titel van artikel 2','text' =>'tekste van artikel 2','tags'=>'tags artikel 2'),
    array('titel'=>'Titel van artikel 3','text' =>'tekste van artikel 3','tags'=>'tags artikel 3')
);



if (isset($_GET [ 'artikel']))
    {
        $artikel = $artikels[$_GET['artikel']];
    }
    include 'view/header-partial.html';


    include  'view/body-partial.html';

include 'view/footer-partial.html';
?>







