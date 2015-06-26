<?php /*%%SmartyHeaderCode:75090048350a659ae6c3b24-00934210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e81d56bf0032762ad4f7b5c628bed280662beb61' => 
    array (
      0 => './templates/displayDefault.tpl',
      1 => 1353080659,
      2 => 'file',
    ),
    'dcf64f36a8afd5f887bb61bf9b6a5f77c9e60d5f' => 
    array (
      0 => './configs/test.conf',
      1 => 1353071700,
      2 => 'file',
    ),
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1353074173,
      2 => 'file',
    ),
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1353072168,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75090048350a659ae6c3b24-00934210',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50a6607488c5b5_50318696',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a6607488c5b5_50318696')) {function content_50a6607488c5b5_50318696($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="icon" type="image/png" href="images/favicon.ico" />
<title>iBento | music</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.8.2.js"></script>
<script src="js/scriptAlbums.js"></script>
</head>
<body>
<div id="header">
	<div id="fondHeader">
		<div id="logo"><a href="#" id="MenuButton"><img border="0" src="images/logo.png"></a></div>
		<div id="search"><a href="#" id="search"><img border="0" src="images/search-test.png"></a></div>
		<div id="player"><a href="#" id="player"><img border="0" src="images/player-test.png"></a></div>
	</div>
</div>

<div id="content">
	<div id="menu-left">
	 	<div class="menu-left-content">
		
		
		<form method="post" action="displayAlbums.php">
        <input name="albumID" type="hidden" value="001"><button>Voir les albums</button>
		</form>	

		<form method="post" action="displayPlaylist.php">
			<input name="albumID" type="hidden" value="001"><button>Mon album 1</button>
		</form>	
				<div class="titre-menu">MY LIBRARY</div>
				<div class="item-menu">All albums</div>
				<div class="item-menu">Favorites</div>
				<div class="item-menu">Most listened</div>
		</div>
	 	<div class="menu-left-content">
				<div class="titre-menu">MY PLAYLISTS</div>
				<div class="item-menu">Party with friend</div>
				<div class="item-menu">Cool night</div>
				<div class="item-menu">Classic</div>
		</div>
	</div>

<div id="result"></div>

	
<div id="footer">
  <p>footer</p>  
  </div>
</div>
</body>
</html>

<?php }} ?>