<?php

require('libs/Smarty.class.php');
require ('functions/getAlbumList.php');
require ('functions/generateAlbumXML.php');

$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;


// Global vars used in process
$files_music_found = 0;
$files_covers_found = 0;
$dir_found = 0;	
$folder_depth = 0;	
$generatedXML = "";
$trackID = 1;
$albumID = 1;
$rootPath = "../data/";
$xmlPath = "xml/";
$path = $rootPath;

// CLEAN FOLDER LOOKING FOR SPECIAL CHAR (like &)
cleanAlbumFolder($path);

// GENERATE XML FROM MUSIC LIBRARY
generateAlbumList($path);

// Listing albums to display results
$arrayAlbums = getAllAlbums();
$smarty->assign("arrayAlbums", $arrayAlbums);

$smarty->display('generateAlbumList.tpl');


?>
