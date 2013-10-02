<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/templates/new_admin/img/js/jquery.js"></script>
<script type="text/javascript" src="/templates/new_admin/img/js/quxian.js"></script>
<script type="text/javascript" SRC="js/swfobject.js"></script>
</head>
<body>
	<div id="top">
		<div class="wrapper">
			
			<div id="title"><h1>平台管理</h1></div>
			
			<div id="topnav">
				<?php echo $_SESSION['admin_name']; ?></b>,<?php echo $this->_var['language']['welcome']; ?>
				<span>|</span> <a href='?sort=start'><?php echo $this->_var['language']['menu_main']; ?></a>
                <span>|</span> <a href='?sort=start&do=log_list'><?php echo $this->_var['language']['menu_log']; ?></a>
				<span>|</span> <a href='?sort=start&do=clear_cache'><?php echo $this->_var['language']['menu_clear']; ?></a>
				<span>|</span> <a href='?do=logout'><?php echo $this->_var['language']['menu_logout']; ?></a>
			</div>
			
			
			<nav id="menu">
				<ul class="sf-menu">
                <li><a HREF="?sort=start">首页</a></li>
					<li class="current"><a HREF="?sort=game_flat">管理平台</a></li>
					<li><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</nav>
			
			
			
		</div>
	</div>
	
</div>

	<div id="pagetitle">
		<div class="wrapper">
			<h1>平台管理 - 站点参数</h1>
		</div>
	</div>
	
  
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>&raquo;&nbsp;<?php echo $this->_var['language']['menu_config_1']; ?></div>
<div class='item'>
<form action="?sort=game_flat&action=config&do=config_update" method="post" enctype="multipart/form-data">
<table cellpadding="5">
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_name']; ?></td>
<td><input class="input" type="text" name="site_name" size="40" value="<?php echo htmlspecialchars($this->_var['config']['site_name']); ?>"/></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_icp']; ?></td>
<td><input class="input" type="text" name="site_icp" size="40" value="<?php echo htmlspecialchars($this->_var['config']['site_icp']); ?>"/></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_keywords']; ?></td>
<td><input class="input" type="text" name="site_keywords" size="40" value="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>"/></td>
</tr>


<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_description']; ?></td>
<td><textarea class="input" name="site_description" rows="4" cols="40"><?php echo htmlspecialchars($this->_var['config']['site_description']); ?></textarea></td>
</tr>

<!--
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_notice']; ?></td>
<td><textarea class="input" name="site_notice" rows="4" cols="40"><?php echo htmlspecialchars($this->_var['config']['site_notice']); ?></textarea></td>
</tr>
-->

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_state']; ?></td>
<td><input type="radio" name="site_state" <?php if ($this->_var['config']['site_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/> <?php echo $this->_var['language']['form_config_site_state_yes']; ?><input type="radio" name="site_state" <?php if ($this->_var['config']['site_state'] == 'no'): ?>checked<?php endif; ?> value="no"/> <?php echo $this->_var['language']['form_config_site_state_no']; ?></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_close_text']; ?></td>
<td><textarea class="input" name="site_close_text" rows="4" cols="40"><?php echo htmlspecialchars($this->_var['config']['site_close_text']); ?></textarea></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_ip']; ?></td>
<td><textarea class="input" name="site_ip" rows="4" cols="40"><?php echo htmlspecialchars($this->_var['config']['site_ip']); ?></textarea></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_site_badwords']; ?></td>
<td><textarea class="input" name="site_badwords" rows="4" cols="40"><?php echo htmlspecialchars($this->_var['config']['site_badwords']); ?></textarea></td>
</tr>

<tr>
<td  align="right" height="30"><?php echo $this->_var['language']['form_config_site_language']; ?></td>
<td>
<select name="site_language">
<?php $_from = $this->_var['language_dir']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'language_0_60682300_1356335957');if (count($_from)):
    foreach ($_from AS $this->_var['language_0_60682300_1356335957']):
?>
<option value="<?php echo $this->_var['language_0_60682300_1356335957']['folder']; ?>" <?php if ($this->_var['config']['site_language'] == $this->_var['language_0_60682300_1356335957']['folder']): ?>selected<?php endif; ?>><?php echo $this->_var['language_0_60682300_1356335957']['info']; ?></option>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</select>
</td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_online_time']; ?></td>
<td><input class="input" type="text" name="online_time" value="<?php echo $this->_var['config']['online_time']; ?>"/>&nbsp;(<?php echo $this->_var['language']['form_config_online_time_text']; ?>)</td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_member_state']; ?></td>
<td><input type="radio" name="member_state" <?php if ($this->_var['config']['member_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_member_state_yes']; ?>&nbsp;<input type="radio" name="member_state" <?php if ($this->_var['config']['member_state'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_member_state_no']; ?></td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_member_validation_state']; ?></td>
<td><input type="radio" name="member_validation_state" <?php if ($this->_var['config']['member_validation_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_member_validation_state_yes']; ?>&nbsp;<input type="radio" name="member_validation_state" <?php if ($this->_var['config']['member_validation_state'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_member_validation_state_no']; ?></td>
</tr>

<!--
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_rewrite_state']; ?></td>
<td><input type="radio" name="rewrite_state" <?php if ($this->_var['config']['rewrite_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/> <?php echo $this->_var['language']['form_config_rewrite_state_yes']; ?>&nbsp;<input type="radio" name="rewrite_state" <?php if ($this->_var['config']['rewrite_state'] == 'no'): ?>checked<?php endif; ?> value="no"/> <?php echo $this->_var['language']['form_config_rewrite_state_no']; ?></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_feedback_state']; ?></td>
<td><input type="radio" name="feedback_state" <?php if ($this->_var['config']['feedback_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_feedback_state_yes']; ?>&nbsp;<input type="radio" name="feedback_state" <?php if ($this->_var['config']['feedback_state'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_feedback_state_no']; ?></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_comment_state']; ?></td>
<td><input type="radio" name="comment_state" <?php if ($this->_var['config']['comment_state'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_comment_state_yes']; ?>&nbsp;<input type="radio" name="comment_state" <?php if ($this->_var['config']['comment_state'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_comment_state_no']; ?></td>
</tr>
<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_feedback_size']; ?></td><td><input class="input" type="text" name="feedback_size" value="<?php echo $this->_var['config']['feedback_size']; ?>" size="5"/></td></tr>
<tr><td height="1" bgcolor="#eeeeee" colspan="2"></td></tr>

<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_index_comment_size']; ?></td><td><input class="input" type="text" name="index_comment_size" value="<?php echo $this->_var['config']['index_comment_size']; ?>" size="5"/></td></tr>
<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_index_comment_content_size']; ?></td><td><input class="input" type="text" name="index_comment_content_size" value="<?php echo $this->_var['config']['index_comment_content_size']; ?>" size="5"/></td></tr>


<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_content_hot_size']; ?></td><td><input class="input" type="text" name="content_hot_size" value="<?php echo $this->_var['config']['content_hot_size']; ?>" size="5"/></td></tr>
<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_content_hot_title_size']; ?></td><td><input class="input" type="text" name="content_hot_title_size" value="<?php echo $this->_var['config']['content_hot_title_size']; ?>" size="5"/></td></tr>

<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_content_best_size']; ?></td><td><input class="input" type="text" name="content_best_size" value="<?php echo $this->_var['config']['content_best_size']; ?>" size="5"/></td></tr>
<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_content_best_title_size']; ?></td><td><input class="input" type="text" name="content_best_title_size" value="<?php echo $this->_var['config']['content_best_title_size']; ?>" size="5"/></td></tr>



<tr><td align="right" height="30"><?php echo $this->_var['language']['form_config_comment_size']; ?></td><td><input class="input" type="text" name="comment_size" value="<?php echo $this->_var['config']['comment_size']; ?>" size="5"/></td></tr>
-->

<tr><td align="right" height="30">提成比例：</td><td><input class="input" type="text" name="search_size" value="<?php echo $this->_var['config']['search_size']; ?>" size="10"/></td></tr>

<tr><td height="1" bgcolor="#eeeeee" colspan="2"></td></tr>

<tr>
<td align="right"height="30"><?php echo $this->_var['language']['form_config_smtp_server']; ?></td>
<td><input type="text" name="smtp_server" value="<?php echo htmlspecialchars($this->_var['config']['smtp_server']); ?>" class="input" /></td></td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_smtp_port']; ?></td>
<td><input type="text" name="smtp_port" value="<?php echo htmlspecialchars($this->_var['config']['smtp_port']); ?>" class="input"/></td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_smtp_user']; ?></td>
<td><input type="text" name="smtp_user" value="<?php echo htmlspecialchars($this->_var['config']['smtp_user']); ?>" class="input"/></td>
</tr>

<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_smtp_password']; ?></td>
<td><input type="text" name="smtp_password" value="<?php echo htmlspecialchars($this->_var['config']['smtp_password']); ?>" class="input"/></td>
</tr>

<tr><td height="1" bgcolor="#eeeeee" colspan="2"></td></tr>

<!--
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_image_thumb_open']; ?></td>
<td><input type="radio" name="image_thumb_open" <?php if ($this->_var['config']['image_thumb_open'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_image_thumb_open_yes']; ?>&nbsp;<input type="radio" name="image_thumb_open"  <?php if ($this->_var['config']['image_thumb_open'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_image_thumb_open_no']; ?></td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_image_thumb_width']; ?></td>
<td><input type="text" name="image_thumb_width" value="<?php echo $this->_var['config']['image_thumb_width']; ?>" class="input"/></td>
</tr>
<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_image_thumb_height']; ?></td>
<td><input type="text" name="image_thumb_height" value="<?php echo $this->_var['config']['image_thumb_height']; ?>" class="input"/></td>
</tr>


<tr>
<td align="right" height="30"><?php echo $this->_var['language']['form_config_image_text_open']; ?></td>
<td><input type="radio" name="image_text_open" <?php if ($this->_var['config']['image_text_open'] == 'yes'): ?>checked<?php endif; ?> value="yes"/>&nbsp;<?php echo $this->_var['language']['form_config_image_text_open_yes']; ?>&nbsp;<input type="radio" name="image_text_open"  <?php if ($this->_var['config']['image_text_open'] == 'no'): ?>checked<?php endif; ?> value="no"/>&nbsp;<?php echo $this->_var['language']['form_config_image_text_open_no']; ?>

</td>
</tr>

<tr>
<td align="right"  height="30"><?php echo $this->_var['language']['form_config_image_pos']; ?></td>
<td>
<select name="image_pos">
<option value="0" <?php if ($this->_var['config']['image_pos'] == 0): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_0']; ?></option>
<option value="1" <?php if ($this->_var['config']['image_pos'] == 1): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_1']; ?></option>
<option value="2" <?php if ($this->_var['config']['image_pos'] == 2): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_2']; ?></option>
<option value="3" <?php if ($this->_var['config']['image_pos'] == 3): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_3']; ?></option>
<option value="4" <?php if ($this->_var['config']['image_pos'] == 4): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_4']; ?></option>
<option value="5" <?php if ($this->_var['config']['image_pos'] == 5): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_5']; ?></option>
<option value="6" <?php if ($this->_var['config']['image_pos'] == 6): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_6']; ?></option>
<option value="7" <?php if ($this->_var['config']['image_pos'] == 7): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_7']; ?></option>
<option value="8" <?php if ($this->_var['config']['image_pos'] == 8): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_8']; ?></option>
<option value="9" <?php if ($this->_var['config']['image_pos'] == 9): ?>selected<?php endif; ?>/><?php echo $this->_var['language']['form_config_image_pos_9']; ?></option>
</select><br />

</td>
</tr>
<tr>
<td align="right"  height="30">&nbsp;</td>
<td><?php echo $this->_var['language']['form_config_image_tip']; ?></td>
</tr>
<tr><td height="1" bgcolor="#eeeeee" colspan="2"></td></tr>
-->
		<tr>
		<td align="right" height="30">&nbsp;</td>
		<td>
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>
		</td>
		</tr>
</table>
</form>
 </div>
</div>
</div>
</td>
</tr>
</table>
</body>
</html>