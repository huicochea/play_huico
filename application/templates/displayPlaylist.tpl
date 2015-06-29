

<div class="playlist-content">
	<div class="playlist-header">
		<div class="playlist-cover">
			<a href="#" onclick="javascript:afficher_cacher('popin_cover');"><img src="{$albumCover}"></a>
		</div>
		<div class="playlist-info">
			<p class="playlist-title">{$albumTitle}</p>
			<p class="playlist-author">Autor: Desconocido</p>
			<script>var js_load = {$js_load_all_playlist};</script>
			<a class="playlist-button-playall" href="javascript:load_playlist(js_load)" onclick="javascript:afficher('jp-playlist');">Play album</a>
			<!-- <a href="#"  class="playlist-button-download" onclick="javascript:afficher_cacher('popinDownloadAlbum');">Download</a>-->
			<div class="linkAlbum"><a href="displayAlbums.php" class="playlist-button-back">Back</a></div>			
		</div>
		
	</div>

<div class="playlist-tracks"><!--Lista de canciones -->

		<div class="playlist-tracks-title"><!--Buscador de canciones por carpeta -->
			<form> <p class="strong"> &nbsp;BUSCAR EN ESTE FOLDER: <input id='searchTerm' type='text' onkeyup='doSearch()' /> </p></form>			
		</div>

	<div class="scroll">
		{$i = 0}
		<table width="100%" id="datos">
		{section name=sec1 loop=$arrayAlbums}
				<tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"><td width="90%"><script>var js_load_track_{$i} = {$array_json_tracks[sec1]};</script>
				<div class="playlist-tracks-grey1"><img align="center" src="images/icon_track.png"> <a href="javascript:load_track(js_load_track_{$i})"> {$arrayAlbums[sec1].trackTitle} </a> </td>
					<td class="playlist-tracks-grey1">
						{$arrayAlbums[sec1].trackLengh}
						<!-- {$arrayAlbums[sec1].trackFileSize} -->
				</td>
				<td>
					<a href="#" onclick="elimina(this)" name="{$arrayAlbums[sec1].trackFile}">
					<img border="0" src="images/close_popin.png" title="Eliminar"></a>
				</td><!-- Eliminar cancion-->
				<td><a href="javascript:add_track(js_load_track_{$i})" onclick="javascript:afficher_cacher('jp-playlist');" >
					<img border="0" src="images/add.png" title="Agregar a lista de reproduccion"></a>
				</td>
				<td><a href="javascript:load_track(js_load_track_{$i})"><img border="0" src="images/play.png" title="Reproducir"></a>
				</div>
				<!--{$i++}--></td></tr>
		{/section}
		</table>
			</div>
	</div><!-- Termina scroll -->		
</div><!-- Termina playlist-traks-->

<div id="popin_cover" class="popin_cover" style="visibility: hidden;"> 
	<div  class="popin_cover_close linkAlbum" ><a href="displayPlaylist.php?albumID={$albumID}"><img src="images/close_popin.png"></a></div>
	<div class="playlist-title">Cambiar imagen del album</div>
	<div class="playlist-author">Selecciona una nueva imagen para este album. Selecciona una imagen cuadrada, esto es para que se visualice mejor.</div><br /><br />
	<iframe class="iframeCover_content" src="popinLoadImageCover.php?albumID={$albumID}"></iframe>

</div>

<div id="popinDownloadAlbum" class="popinDownloadAlbum" style="visibility: hidden;"> 
	<div  class="popinpopinDownloadAlbum_close linkAlbum" ><a href="displayPlaylist.php?albumID={$albumID}"><img src="images/close_popin.png"></a></div>
	<div class="playlist-title">Descargar lista de canciones</div>
	<div class="playlist-author">Preciona el boton para descargar la lista de canciones en formato .zip.</div><br /><br />
	<iframe class="iframeCover_content" src="popinDownloadAlbum.php?albumID={$albumID}"></iframe>

</div>