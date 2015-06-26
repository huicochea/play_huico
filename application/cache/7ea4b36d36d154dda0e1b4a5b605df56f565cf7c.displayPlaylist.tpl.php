<?php /*%%SmartyHeaderCode:89211683550a6573146ad34-12135921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ea4b36d36d154dda0e1b4a5b605df56f565cf7c' => 
    array (
      0 => './templates/displayPlaylist.tpl',
      1 => 1353084403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89211683550a6573146ad34-12135921',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50a66f144b40f4_54833679',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a66f144b40f4_54833679')) {function content_50a66f144b40f4_54833679($_smarty_tpl) {?>
<form method="post" action="displayAlbums.php">
    <input name="albumID" type="hidden" value="001"><button>Retour</button>
</form>	
<ul>
   <li class="linkAlbum"><a href="displayAlbums.php">Retour</a></li>
</ul>

ALBUM ID : 
<br />
<img src="images/album-test.png">
<?php }} ?>