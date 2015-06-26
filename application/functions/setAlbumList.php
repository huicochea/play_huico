<?php


function setAlbumCover($albumID, $uploadedCover) {
	$path = "xml/playlistAllAlbums.xml";

	$albumsXMLfiles = simplexml_load_file($path);
	$i = 0;
	foreach ($albumsXMLfiles->album as $currentAlbum) {
	   if ($currentAlbum->albumID == $albumID) {
			$currentAlbum->albumCover =  $uploadedCover;
	   $i++;			
	   }
	}
	$albumsXMLfiles->asXML($path);
	return $arrayAlbums;
}

?>
