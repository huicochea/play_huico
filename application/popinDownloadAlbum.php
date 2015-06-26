<html>
<body>

<?php

$launchGenerate = $_GET['launchGenerate'];
$downloadFile = $_GET['downloadFile'];
$albumID = $_GET['albumID'];

if ($launchGenerate == "" && $downloadFile == "") {
		echo "<p style=\"font-family: Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;color:#666;\"><a href=\"popinDownloadAlbum.php?launchGenerate=1&albumID=".$albumID."\">CREATE ARCHIVE FOR THIS ALBUM</a><br /><em>(This may take a few minutes depending on playlist size)</em></p>";
}
else {
	if ($launchGenerate != "") {
		require ('functions/getAlbumList.php');
		require ('functions/setAlbumList.php');
		
		echo "<center><img src=\"images/loading.gif\"><br /><p style=\"font-family: Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;color:#666;\">generating zip file</p></center>";
		$zipFile = getZipFromPlaylist($albumID);
		$location = "Location: popinDownloadAlbum.php?downloadFile=".$zipFile."";
		header($location); 
	}

	if ($downloadFile != "") {
		echo "<a href=\"".$downloadFile."\"><p style=\"font-family: Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;color:#666;\">Download archive</p></a>";

	}
}




?>
</body>
</html>