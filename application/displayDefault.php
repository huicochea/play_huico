<?php
require ("creaxml.php");	
require('libs/Smarty.class.php');
require ('functions/getAlbumList.php');

?>



<?php if($_POST['valor']!=1) {?>
<form name="pregunta"  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	Actualizar lista de canciones?
	<input type="submit" name="si" value="SI">
	<input type="submit" name="no" value="NO">
	<input type="hidden" name="valor" value="1"> 
</form>
<?php }
else{
 ?>


<?php 

	$refres_list = actualizar_lista($_POST['si']=='SI');//Se va a actualizar la lista de caciones, el tiempo que tarde este proceso depoendera de la cantidad de carpetas y canciones que se encuentren en la carpeta /musica
	if($refres_list){//Refrescar lista de canciones
		crear(); //Creamos el archivo  xml
		//echo "Se actualizo la lista de canciones";
		$smarty = new Smarty;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->cache_lifetime = 220;
		$arrayAlbums = getAllAlbums();
		$smarty->assign("arrayAlbums", $arrayAlbums);
		$smarty->display('displayDefault.tpl');
	}
	else{//No se actualiza la lista de canciones, el acceso al sistema es mucho mas rapido pero puede que algunas canciones que se borraron de la carpeta /musica sigan apareciendo en el sistema
		//echo "No se actualizo la lista de canciones";
		$smarty = new Smarty;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->cache_lifetime = 220;
		$arrayAlbums = getAllAlbums();
		$smarty->assign("arrayAlbums", $arrayAlbums);
		$smarty->display('displayDefault.tpl');
	}
}
?>
