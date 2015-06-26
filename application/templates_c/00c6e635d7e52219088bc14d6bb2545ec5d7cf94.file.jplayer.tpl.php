<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 14:50:47
         compiled from ".\templates\jplayer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:311885589b897f0fc21-57989830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00c6e635d7e52219088bc14d6bb2545ec5d7cf94' => 
    array (
      0 => '.\\templates\\jplayer.tpl',
      1 => 1367840374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '311885589b897f0fc21-57989830',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589b897f14af2_38758952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589b897f14af2_38758952')) {function content_5589b897f14af2_38758952($_smarty_tpl) {?>
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>

		<div id="jp_container_1" class="jp-audio">
			<div class="jp-type-playlist">
				<div class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-previous" tabindex="1">&nbsp;</a></li>
						<li><a href="javascript:;" class="jp-play" tabindex="1">&nbsp;</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">&nbsp;</a></li>
						<li><a href="javascript:;" class="jp-next" tabindex="1">&nbsp;</a></li>
						<li><a onclick="javascript:afficher_cacher('jp-playlist');" class="jp-toggle-playlist" tabindex="1" title="display playlist">&nbsp;</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-time-holder">
						<div class="jp-current-time"></div>
						<div class="jp-duration"></div>
					</div>
				</div>
				<div class="jp-playlist" id="jp-playlist">
					<ul>
						<li></li>
					</ul>
				</div>
				<div class="jp-no-solution">
					<span>Update Required</span>
					To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
				</div>
			</div>
		</div><?php }} ?>