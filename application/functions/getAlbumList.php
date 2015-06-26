<?php


function getAllAlbums() {
	$xml = openXMLAlbumsFile();
	$albumsXMLfiles = new SimpleXMLElement($xml);
	$i = 0;

	foreach ($albumsXMLfiles->album as $currentAlbum) {
	   $arrayAlbums[$i]['id'] = $currentAlbum->albumID;
	   $arrayAlbums[$i]['title'] = $currentAlbum->albumTitle;
		$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
		$arrayAlbums[$i]['tracksCount'] = $currentAlbum->albumTracksCount;

	   if ($currentAlbum->albumCover == "") {
			$arrayAlbums[$i]['cover'] = "images/album-defaut.png"; 
	   }
	   else {
			$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
		}	   
		
	   $i++;
	}
	return $arrayAlbums;
}
 
function getAlbumsByID($albumID) {
	$xml = openXMLAlbumsFile();
	$albumsXMLfiles = new SimpleXMLElement($xml);
	$i = 0;

	foreach ($albumsXMLfiles->album as $currentAlbum) {
	   if ($currentAlbum->albumID == $albumID) {
			$arrayAlbums[$i]['title'] = $currentAlbum->albumTitle;
			$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
			$arrayAlbums[$i]['folder'] = $currentAlbum->albumFolder;
			if ($currentAlbum->albumCover == "") {
				$arrayAlbums[$i]['cover'] = "images/album-defaut.png"; 
			}
			else {
				$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
			}	   
			foreach ($currentAlbum->albumTracks->track as $currentTrack) {
				$arrayAlbums[$i]['trackID'] = $currentTrack->trackID;
				$arrayAlbums[$i]['trackFile'] = $currentTrack->trackFile;
				$arrayAlbums[$i]['trackTitle'] = $currentTrack->trackTitle;
				$arrayAlbums[$i]['trackFileSize'] = $currentTrack->trackFileSize;
				$i++;
			}
	   $i++;			
	   }

	}
	return $arrayAlbums;
}

function getAlbumsFolderByID($albumID) {
	$xml = openXMLAlbumsFile();
	$albumsXMLfiles = new SimpleXMLElement($xml);
	
	foreach ($albumsXMLfiles->album as $currentAlbum) {
	   if ($currentAlbum->albumID == $albumID) {
			$albumFolder = $currentAlbum->albumFolder;
			return $albumFolder;
	   }
	}
}

function getAlbumsByKeyword($searchedKeyword) {
	
	$xml = openXMLAlbumsFile();
	$albumsXMLfiles = new SimpleXMLElement($xml);
	$i = 0;

	foreach ($albumsXMLfiles->album as $currentAlbum) {
	
		$matchKeyword = strripos($currentAlbum->albumTitle,$searchedKeyword);
		
		if ($matchKeyword !== false) {
		   $arrayAlbums[$i]['id'] = $currentAlbum->albumID;
		   $arrayAlbums[$i]['title'] = $currentAlbum->albumTitle;
			$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
			$arrayAlbums[$i]['tracksCount'] = $currentAlbum->albumTracksCount;

		   if ($currentAlbum->albumCover == "") {
				$arrayAlbums[$i]['cover'] = "images/album-defaut.png"; 
		   }
		   else {
				$arrayAlbums[$i]['cover'] = $currentAlbum->albumCover;
			}	   
			
		   $i++;
		}
	}
	return $arrayAlbums;	
}

function openXMLAlbumsFile() {
	$path = "xml/playlistAllAlbums.xml";
	$file = file_get_contents($path);
	return ($file);

}

function getZipFromPlaylist($albumID) {
	$zipFileName = "";

	// We get the folder containing the music files
	$arrayAlbums = getAlbumsByID($albumID);
	$albumTitle = $arrayAlbums[0]['title'];
	$albumCover = $arrayAlbums[0]['cover'];
	$albumPath = $arrayAlbums[0]['folder'];
	$selectZipFiles = $albumPath."*";

	// We create zip file in "tmp" folder
	$zip = new ZipArchive;
	$albumTitle = str_replace(" ","",$albumTitle);

	$zipFileName = "download/".$albumTitle.".zip";
	//echo "File exist".$zipFileName;die;
	if (file_exists($zipFileName)) {
		return $zipFileName;
	}
	else {
		$zip->open($zipFileName, ZipArchive::CREATE);
		foreach (glob($selectZipFiles) as $file) {
			$zip->addFile($file);
			//if ($file != 'target_folder/important.txt') unlink($file);
		}
		$zip->close();
	}
	return $zipFileName;

}

?>
