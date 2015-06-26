<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 14:50:47
         compiled from ".\templates\displayDefault.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168705589b897a8bc69-97213838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d0dcf427c150e44cead9626dc0a0d562ce42f6d' => 
    array (
      0 => '.\\templates\\displayDefault.tpl',
      1 => 1367840374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168705589b897a8bc69-97213838',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589b897dfc3a0_12669424',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589b897dfc3a0_12669424')) {function content_5589b897dfc3a0_12669424($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>'foo'), 0);?>


<div id="content">
<div id="result">
<?php echo $_smarty_tpl->getSubTemplate ("displayAlbums.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>