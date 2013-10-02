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
			<h1>平台管理 - 添加频道 - 编辑</h1>
		</div>
	</div>
	
  
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=news&do=channel_list"><?php echo $this->_var['language']['channel_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['channel_add']; ?><?php else: ?><?php echo $this->_var['language']['channel_edit']; ?><?php endif; ?>

</div>
<div class='item'>
	
	<form action="?sort=game_flat&action=news&do=channel_<?php echo $this->_var['mode']; ?>" method="post" enctype="multipart/form-data">
 
		<table width="100%" cellspacing="5" cellpadding="0">
<tr>
		<td align="right" width="20%" height="30"><?php echo $this->_var['language']['form_channel_name']; ?></td>
		<td><input type="text" name="channel_name" size="40" value="<?php echo htmlspecialchars($this->_var['channel']['name']); ?>" class="input"/></td> </tr>

		<tr>
		<td align="right"><?php echo $this->_var['language']['form_channel_description']; ?></td>
		<td colspan="3"><textarea name="channel_description" cols="80" rows="3" class="textarea"><?php echo htmlspecialchars($this->_var['channel']['description']); ?></textarea></td>
	 </tr>
	 <tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_channel_upload_ext']; ?></td>
		<td colspan="3">
		<textarea name="channel_upload_ext" cols="80" rows="3" class="textarea"><?php echo htmlspecialchars($this->_var['channel']['upload_ext']); ?></textarea>
		</td>
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_channel_sort']; ?></td>
		<td><input type="text" name="channel_sort" size="10" value="<?php echo $this->_var['channel']['sort']; ?>" class="input"/></td>
		</tr>	 
<!--
		<tr>
<td height="30"  align="right"><?php echo $this->_var['language']['form_channel_banner']; ?></td>
		<td><input type="file" name="channel_banner" class="input"/>
		<?php if ($this->_var['channel']['banner']): ?>
		<a href="uploads/<?php echo $this->_var['channel']['banner']; ?>" target="_blank"><img src="uploads/<?php echo $this->_var['channel']['banner']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
		<label><input type="checkbox" name="channel_banner_delete" value="<?php echo $this->_var['channel']['banner']; ?>" /> <?php echo $this->_var['language']['delete']; ?></label>
		<input type="hidden" name="channel_banner_old" value="<?php echo $this->_var['channel']['banner']; ?>"/>
		<?php endif; ?>
		</td>
		</tr>
		</tr>
-->
		<tr><td colspan="4" bgcolor="#dddddd" height="1"></td></tr>
<!--
		<tr>
		<td align="right" height="30" width="20%"><?php echo $this->_var['language']['form_channel_index']; ?></td>
		<td width="30%">
		<label><input type="radio" name="channel_index" value="1" <?php if ($this->_var['channel']['index'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_channel_index_1']; ?></label>
		<label><input type="radio" name="channel_index" value="0" <?php if ($this->_var['channel']['index'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_channel_index_0']; ?></label>
		</td>
<td align="right" height="30" width="20%"><?php echo $this->_var['language']['form_channel_index_style']; ?></td>
		<td width="30%">
		<select name="channel_index_style">
		<option value="1" <?php if ($this->_var['channel']['index_style'] == 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_index_style_1']; ?></option>
		</select>
		</td>
		</tr>	
		<tr>
		<td align="right" height="30"  width="15%"><?php echo $this->_var['language']['form_channel_index_truncate']; ?></td>
		<td width="35%"><input type="text" name="channel_index_truncate" size="10" value="<?php echo $this->_var['channel']['index_truncate']; ?>" class="input"/></td>

		<td align="right" height="30"  width="15%"><?php echo $this->_var['language']['form_channel_index_size']; ?></td>
		<td width="35%"><input type="text" name="channel_index_size" size="10" value="<?php echo $this->_var['channel']['index_size']; ?>" class="input"/></td>
		</tr>
 
			<tr><td colspan="4" bgcolor="#dddddd" height="1"></td></tr>	
-->
		<tr>
		<td align="right" height="30" width="20%"><?php echo $this->_var['language']['form_channel_list_truncate']; ?></td>
		<td width="30%"><input type="text" name="channel_list_truncate" size="10" value="<?php echo $this->_var['channel']['list_truncate']; ?>" class="input"/></td>
		<td align="right" height="30"  width="20%"><?php echo $this->_var['language']['form_channel_list_style']; ?></td>
		<td width="30%">
		<select name="channel_list_style">
		<option value="1" <?php if ($this->_var['channel']['list_style'] == 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_list_style_1']; ?></option>
		</select>
		</td>

		</tr>

		<tr>
		<td align="right" height="30"  width="20%"><?php echo $this->_var['language']['form_channel_list_size']; ?></td>
		<td  width="30%"><input type="text" name="channel_list_size" size="10" value="<?php echo $this->_var['channel']['list_size']; ?>" class="input"/></td>

		<td align="right" height="30" width="20%"><?php echo $this->_var['language']['form_channel_content_style']; ?></td>
		<td width="30%">
		<select name="channel_content_style">
		<option value="1" <?php if ($this->_var['channel']['content_style'] == 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_content_style_1']; ?></option>
		</select>
		</td>
		</tr>
<tr><td colspan="4" bgcolor="#dddddd" height="1"></td></tr>	


		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_channel_read_permissions']; ?></td>
		<td>
		<select name="channel_read_permissions">
		<option value="-2"  <?php if ($this->_var['channel']['read_permissions'] == - 2): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_0']; ?></option>
		<option value="-1" <?php if ($this->_var['channel']['read_permissions'] == - 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_1']; ?></option>
		<option value="0" <?php if ($this->_var['channel']['read_permissions'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_2']; ?></option>
		<?php echo $this->html_options(array('options'=>$this->_var['member_group'],'selected'=>$this->_var['channel']['read_permissions'])); ?>
		</select>
		</td>

		<td align="right" height="30"><?php echo $this->_var['language']['form_channel_write_permissions']; ?></td>
		<td>
		<select name="channel_write_permissions">
		<option value="-2"  <?php if ($this->_var['channel']['write_permissions'] == - 2): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_0']; ?></option>
		<option value="-1" <?php if ($this->_var['channel']['write_permissions'] == - 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_1']; ?></option>
		<option value="0" <?php if ($this->_var['channel']['write_permissions'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_2']; ?></option>
		<?php echo $this->html_options(array('options'=>$this->_var['member_group'],'selected'=>$this->_var['channel']['write_permissions'])); ?>
		</select>
		</td>
		</tr>	

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_channel_comment_permissions']; ?></td>
		<td>
		<select name="channel_comment_permissions">
		<option value="-2"  <?php if ($this->_var['channel']['comment_permissions'] == - 2): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_0']; ?></option>
		<option value="-1" <?php if ($this->_var['channel']['comment_permissions'] == - 1): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_1']; ?></option>
		<option value="0" <?php if ($this->_var['channel']['comment_permissions'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['language']['form_channel_permissions_2']; ?></option>
		<?php echo $this->html_options(array('options'=>$this->_var['member_group'],'selected'=>$this->_var['channel']['comment_permissions'])); ?>
		</select>
		</td>
		</tr>	

		<tr>
		<td align="right" height="30"></td>
		<td>
		<label><input type="checkbox" name="channel_state" value="1" <?php if ($this->_var['channel']['state'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_channel_state']; ?></label>
		<label><input type="checkbox" name="channel_cache" value="1" <?php if ($this->_var['channel']['cache'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_channel_cache']; ?></label>
<!--
		<?php if ($this->_var['mode'] == 'insert'): ?>
		<label><input type="checkbox" name="channel_menu" value="1" <?php if ($this->_var['channel']['menu'] == 1): ?>checked<?php endif; ?> />
		<?php echo $this->_var['language']['form_channel_menu']; ?></label>
		<?php endif; ?>
-->
		</td>
		</tr>	

		<tr>
		<td align="right" height="30">&nbsp;</td>
		<td valign="center">
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>


		</td>
		</tr>
			</table>
		<input type="hidden" name="channel_id" value="<?php echo $this->_var['channel']['id']; ?>"/>
	</form>

</div>
</td>
</tr>
</table>
</body>
</html>