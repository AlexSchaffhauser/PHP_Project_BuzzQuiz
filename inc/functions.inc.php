<?php

//session
session_start();

//composer
require_once 'vendor/autoload.php';

//twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

//meekro db
DB::$user = 'ipd19';
DB::$password = 'ipdipd';
DB::$dbName = 'ipd19';
DB::$encoding = "utf-8";

//functions
function isFieldEmpty( $field ){
	return ( !isset( $field ) || trim( $field ) == "" );
}

?>