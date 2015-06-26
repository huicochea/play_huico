<?php

require('libs/Smarty.class.php');
require ('functions/getAlbumList.php');

$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;


$keywordsSearched = $_POST['keywordsSearched']; 
if ($keywordsSearched != "") {
	$smarty->assign("keywordsSearched",$keywordsSearched);
	$arrayAlbums = getAlbumsByKeyword($keywordsSearched);
	if (!empty($arrayAlbums)) {
		$smarty->assign("arrayAlbums", $arrayAlbums);
		$smarty->display('displaySearchResults.tpl');
	}
	else {
		$smarty->display('displaySearchNoResults.tpl');
	}
}
else {
	$arrayAlbums = getAllAlbums();
	$smarty->assign("arrayAlbums", $arrayAlbums);
	$smarty->display('displayAlbums.tpl');
}
?>
