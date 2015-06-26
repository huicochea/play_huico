<?php /* Smarty version Smarty-3.1.12, created on 2015-06-25 14:49:19
         compiled from ".\templates\displayPlaylist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314275589b8ad40c644-10092585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3a1f711d6a8210000636977308e6ef5c41ececd' => 
    array (
      0 => '.\\templates\\displayPlaylist.tpl',
      1 => 1435261748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314275589b8ad40c644-10092585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589b8ad49ed59_38216908',
  'variables' => 
  array (
    'albumCover' => 0,
    'albumTitle' => 0,
    'js_load_all_playlist' => 0,
    'arrayAlbums' => 0,
    'i' => 0,
    'array_json_tracks' => 0,
    'albumID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589b8ad49ed59_38216908')) {function content_5589b8ad49ed59_38216908($_smarty_tpl) {?>

<div class="playlist-content">
	<div class="playlist-header">
		<div class="playlist-cover">
			<a href="#" onclick="javascript:afficher_cacher('popin_cover');"><img src="<?php echo $_smarty_tpl->tpl_vars['albumCover']->value;?>
"></a>
		</div>
		<div class="playlist-info">
			<p class="playlist-title"><?php echo $_smarty_tpl->tpl_vars['albumTitle']->value;?>
</p>
			<p class="playlist-author">Autor: Desconocido</p>
			<script>var js_load = <?php echo $_smarty_tpl->tpl_vars['js_load_all_playlist']->value;?>
;</script>
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
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
		<table width="100%" id="datos">
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['name'] = 'sec1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['arrayAlbums']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']['total']);
?>
				<tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"><td width="90%"><script>var js_load_track_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
 = <?php echo $_smarty_tpl->tpl_vars['array_json_tracks']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']];?>
;</script>
				<div class="playlist-tracks-grey1"><img align="center" src="images/icon_track.png"> <a href="javascript:load_track(js_load_track_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)"> <?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['trackTitle'];?>
 </a> </td><td class="playlist-tracks-grey1"><?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['trackFileSize'];?>

				</td>
				<td><a href="javascript:add_track(js_load_track_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)" onclick="javascript:afficher_cacher('jp-playlist');" >
					<img border="0" src="images/close_popin.png" title="Eliminar"></a></td><!-- Eliminar cancion-->
				<td><a href="javascript:add_track(js_load_track_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)" onclick="javascript:afficher_cacher('jp-playlist');" >
					<img border="0" src="images/add.png" title="Agregar a lista de reproduccion"></a>
				</td>
				<td><a href="javascript:load_track(js_load_track_<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
)"><img border="0" src="images/play.png" title="Reproducir"></a>
				</div>
				<!--<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
--></td></tr>
		<?php endfor; endif; ?>
		</table>
			</div>
	</div><!-- Termina scroll -->		
</div><!-- Termina playlist-traks-->

<div id="popin_cover" class="popin_cover" style="visibility: hidden;"> 
	<div  class="popin_cover_close linkAlbum" ><a href="displayPlaylist.php?albumID=<?php echo $_smarty_tpl->tpl_vars['albumID']->value;?>
"><img src="images/close_popin.png"></a></div>
	<div class="playlist-title">Cambiar imagen del album</div>
	<div class="playlist-author">Selecciona una nueva imagen para este album. Selecciona una imagen cuadrada, esto es para que se visualice mejor.</div><br /><br />
	<iframe class="iframeCover_content" src="popinLoadImageCover.php?albumID=<?php echo $_smarty_tpl->tpl_vars['albumID']->value;?>
"></iframe>

</div>

<div id="popinDownloadAlbum" class="popinDownloadAlbum" style="visibility: hidden;"> 
	<div  class="popinpopinDownloadAlbum_close linkAlbum" ><a href="displayPlaylist.php?albumID=<?php echo $_smarty_tpl->tpl_vars['albumID']->value;?>
"><img src="images/close_popin.png"></a></div>
	<div class="playlist-title">Descargar lista de canciones</div>
	<div class="playlist-author">Preciona el boton para descargar la lista de canciones en formato .zip.</div><br /><br />
	<iframe class="iframeCover_content" src="popinDownloadAlbum.php?albumID=<?php echo $_smarty_tpl->tpl_vars['albumID']->value;?>
"></iframe>

</div><?php }} ?>