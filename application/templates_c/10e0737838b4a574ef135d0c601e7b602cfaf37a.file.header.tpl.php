<?php /* Smarty version Smarty-3.1.12, created on 2015-06-30 13:29:32
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212875589b897ef9c65-15262041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1435688963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212875589b897ef9c65-15262041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589b897f02933_66283051',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589b897f02933_66283051')) {function content_5589b897f02933_66283051($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="icon" type="image/png" href="images/favicon.ico" />
<title>PLAY HUICO</title>
<!-- <script src="js/jquery-1.8.2.js"></script> -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/scriptAlbums.js"></script>
<script src="js/scriptPlayer.js"></script>
<script src="js/funciones.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/jplayer.css" rel="stylesheet" type="text/css" />
<link rel="apple-touch-icon" href="images/icon_iphone.png" />
</head>
<body>
<div id="header">
	<div id="fondHeader">
		<div id="player"><?php echo $_smarty_tpl->getSubTemplate ("jplayer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
		<div id="logo">
			<center><div class="linkAlbum" ><a href="displayAlbums.php" onclick="javascript:cacher('jp-playlist');">
				<img border="0" src="images/logo.png"></a>			</center></div></div>
		<div id="search">
			<div id="search-form">
				<form method="post" action="displaySearchResults.php">
				<input class="search-textfield" type="text" name="keywordsSearched" id="keywordsSearched" placeholder="BUSCAR FOLDER"/>
				<button class="search-button">&nbsp;</button></div>
			</div>
			</form>		
		</div>
		
	</div>
</div>
<?php }} ?>