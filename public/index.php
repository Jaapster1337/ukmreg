<?php
	define('DS', DIRECTORY_SEPARATOR);
	//echo DS;
	define('ROOT', dirname(dirname(__FILE__)));
	//echo ROOT;
	//Ternary oparator
	$url = (isset($_GET['url'])) ? $url = $_GET['url']: header("location: ./users/homepage");
	//echo $url;
	//include("c:/wamp/www/2012-2013/AM1A/Blok4/Webshop/library/shoppingcart.class.php");
	
	require_once(ROOT.DS.'library'.DS.'bootstrap.php');	
	
?>