<?php
require ("creaxml.php");	
require('libs/Smarty.class.php');
require ('functions/getAlbumList.php');


$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$arrayAlbums = getAllAlbums();
$smarty->assign("arrayAlbums", $arrayAlbums);

$smarty->display('displayDefault.tpl');


?>
