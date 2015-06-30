<?php

require('libs/Smarty.class.php');
require ('functions/getAlbumList.php');

$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

if ($_GET['albumID'] != "") {
	$albumID = $_GET['albumID']; 
}
$arrayAlbums = getAlbumsByID($albumID);
//print_r($arrayAlbums);die;

$albumTitle = $arrayAlbums[0]['title'];
$albumCover = $arrayAlbums[0]['cover'];


$array_all_tracks = array();
foreach ($arrayAlbums as $piste) {
	$array_all_tracks[]= array('title' => (string) $piste['trackTitle'], 'mp3' => (string) $piste['trackFile']);
	$unique_track = array('title' => (string) $piste['trackTitle'], 'mp3' => (string) $piste['trackFile']);
	$unique_track = json_encode($unique_track);
	$array_json_tracks[]= $unique_track;
}

$js_load_all_playlist = json_encode($array_all_tracks);
$smarty->assign("arrayAlbums", $arrayAlbums);
$smarty->assign("array_json_tracks", $array_json_tracks);
$smarty->assign("albumTitle", $albumTitle);
$smarty->assign("albumCover", $albumCover);
$smarty->assign("albumID",$albumID);
$smarty->assign("trackLengh",$trackLengh);
$smarty->assign("trackFile",$trackFile);
$smarty->assign("identificador",$identificador);
$smarty->assign("js_load_all_playlist",$js_load_all_playlist);

$smarty->display('displayPlaylist.tpl');
?>
