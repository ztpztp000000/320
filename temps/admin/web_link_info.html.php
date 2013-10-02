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
			
			<div id="title"><h1>管理官网</h1></div>
			
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
					<li><a HREF="?sort=websites">管理平台</a></li>
					<li class="current"><a HREF="?sort=websites">管理官网</a></li>
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
			<h1>管理官网 -友情链接 - 编辑</h1>
		</div>
	</div>
	
 <table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=websites&action=links&do=link_list"><?php echo $this->_var['language']['link_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['link_add']; ?><?php else: ?><?php echo $this->_var['language']['link_edit']; ?><?php endif; ?>

</div>
<div class='item'>
	<table width="100%">
	<form action="?sort=websites&action=links&do=link_<?php echo $this->_var['mode']; ?>" method="post" name="link_info" enctype="multipart/form-data">
		<tr>
		<td align="right" width="80" height="30"><?php echo $this->_var['language']['form_link_name']; ?></td>
		<td><input type="text" name="link_name" class="input" size="60" value="<?php echo htmlspecialchars($this->_var['link']['name']); ?>" />		</td>
		</tr>

		<tr>
		<td align="right" width="80" height="30"><?php echo $this->_var['language']['form_link_text']; ?></td>
		<td><input type="text" name="link_text" class="input" size="60" value="<?php echo htmlspecialchars($this->_var['link']['text']); ?>" />		</td>
		</tr>

		<tr>
		<td align="right" width="80" height="30"><?php echo $this->_var['language']['form_link_url']; ?></td>
		<td><input type="text" name="link_url" class="input" size="60" value="<?php echo htmlspecialchars($this->_var['link']['url']); ?>" />		</td>
		</tr>
		<tr>
		<td height="30"  align="right"><?php echo $this->_var['language']['form_link_logo']; ?></td>
		<td><input type="file" name="link_logo" size="40" value="<?php echo $this->_var['link']['logo']; ?>" class="input"/>
		<?php if ($this->_var['link']['logo']): ?>
		<a href="uploads/<?php echo $this->_var['link']['logo']; ?>" target="_blank"><img src="uploads/<?php echo $this->_var['link']['logo']; ?>" alt="" align="absmiddle" style="width:88px;height:31px;border:none"/></a>
		<label><input type="checkbox" name="link_logo_delete" value="<?php echo $this->_var['link']['logo']; ?>" /> <?php echo $this->_var['language']['delete']; ?></label>
		<input type="hidden" name="link_logo_old" value="<?php echo $this->_var['link']['logo']; ?>"/>
		<?php endif; ?>
		</td>
		</tr>
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_link_sort']; ?></td>
		<td><input type="text" name="link_sort" class="input" size="5" value="<?php echo $this->_var['link']['sort']; ?>" />	
		</td>
		</tr>		
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_link_state']; ?></td>
		<td>
		<label><input type="radio" name="link_state" value="1" <?php if ($this->_var['link']['state'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_link_state_1']; ?></label>
		<label><input type="radio" name="link_state" value="0" <?php if ($this->_var['link']['state'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_link_state_0']; ?></label>
		</td>
		</tr>	
		
		<tr>
  		<td align="right" height="30">所属游戏</td>
 		 <td>
  		<select name="game_id">
		<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
		<option value="<?php echo $this->_var['game']['id']; ?>" <?php if ($this->_var['link']['game_id'] == $this->_var['game']['id']): ?>selected<?php endif; ?>><?php echo $this->_var['game']['name']; ?></option>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</select>
  		</td>
		</tr>
		
		<tr>
		<td height="30" align="right"><?php echo $this->_var['language']['form_content_attribute']; ?></td>
		<td>
			<label><input type="checkbox" name="is_show_home" value="1" <?php if ($this->_var['link']['is_show_home'] == 1): ?>checked<?php endif; ?> /> 平台同步添加</label>
		</td>
		</tr>

		<tr>
		<td align="right" height="30">&nbsp;</td>
		<td>
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>
		</td>
		</tr>
		<input type="hidden" name="link_id" value="<?php echo $this->_var['link']['id']; ?>"/>
	</form>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>