<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 20:08:41
         compiled from ".\templates\displaySearchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1160558a0319ae9136-49688052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b42f4732b076e1c29353e924b212d9bde8fb87a' => 
    array (
      0 => '.\\templates\\displaySearchResults.tpl',
      1 => 1367840374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1160558a0319ae9136-49688052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrayAlbums' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558a031a097597_46657999',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558a031a097597_46657999')) {function content_558a031a097597_46657999($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sec1']);
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
	<div class="bloc" name="bloc">
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID=<?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['id'];?>
"><img class="albumcover" src="<?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['cover'];?>
"></a></div>
			<div class="linkAlbum"><a href="displayPlaylist.php?albumID=<?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['arrayAlbums']->value[$_smarty_tpl->getVariable('smarty')->value['section']['sec1']['index']]['title'];?>
</a></div>
			<!--<div id="albumArtist">Pink Floyd | 11 tracks</button></div>	-->
	</div>
<?php endfor; endif; ?><?php }} ?>