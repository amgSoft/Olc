<?php
/*
* This is config file which contain method for autoload classes
*/

define( "__ROOT__", $_SERVER[ 'DOCUMENT_ROOT' ] );

$result = false;
$fileUploud = false;
$errMessage = "";

function __autoload( $cName ){
    $lName = __ROOT__ . "classes/{$cName}.php";
    require_once $lName;
}