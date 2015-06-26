<?php

require ('functions/getAlbumList.php');
require ('functions/setAlbumList.php');

$albumID = $_GET['albumID'];

$erreur = "";
if ($_POST['albumID'] != "") {
	// comes from post when adding a cover image
	$albumID = $_POST['albumID']; 

	if ($_FILES['cover']['error'] > 0) $erreur = "Error mientras se cargaba la imagen, por favor intentalo de nuevo";
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	$extension_upload = strtolower(  substr(  strrchr($_FILES['cover']['name'], '.')  ,1)  );
	
	if ( in_array($extension_upload,$extensions_valides) ) {
		$pathToFolder = getAlbumsFolderByID($albumID);
		$imageName = "cover_full.".$extension_upload;
		$fullPath = $pathToFolder.$imageName;
		$imageNameThumb = "cover_small.".$extension_upload;
		$fullPathThumb = $pathToFolder.$imageNameThumb;		

		$resultat = move_uploaded_file($_FILES['cover']['tmp_name'],$fullPath);
        $thumb_available = 0;
		// CREATE THUMBNAIL FOR COVER
		if ($extension_upload == 'jpg' || $extension_upload == 'jpeg') {
			// Creating Thumbnail for jpeg files
			$ImageChoisie = imagecreatefromjpeg($fullPath);
			$TailleImageChoisie = getimagesize($fullPath);
			$NouvelleLargeur = 200; // width chosen = 200px
			$NouvelleHauteur = ( ($TailleImageChoisie[1] * (($NouvelleLargeur)/$TailleImageChoisie[0])) );
			$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");
			imagecopyresampled($NouvelleImage , $ImageChoisie  , 0,0, 0,0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
			imagejpeg($NouvelleImage , $fullPathThumb, 100);
			$thumb_available = 1;
		}
		if ($thumb_available == 1) {
			$updateXML = setAlbumCover($albumID, $fullPathThumb);
		}
		else {
			$updateXML = setAlbumCover($albumID, $fullPath);
		}
		
		if ($resultat) {
			echo "<p style=\"font-family: Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;color:#666;\">Actualizado!. Por favor preciona el boton regresar</div>";	 
		}
	}
	else {
		$erreur = "Por favor selecciona una imagen con el siguiente formato (jpg, png or gif)";
	}
	
}
else {
	?>
		<form enctype="multipart/form-data" method="post" action="popinLoadImageCover.php">
			<input name="albumID" type="hidden" id="albumID" value="<?php echo $albumID; ?>" />
			<input type="file" name="cover" id="cover" /><br /><br />
			<input type="submit" name="submit" value="ENVIAR" />
		</form>
	<?php

}

if ($erreur != "") {
		echo "<p class=\"errorText\"> ".$erreur."</p>";
}

?>