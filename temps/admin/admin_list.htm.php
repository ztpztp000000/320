<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/templates/new_admin/img/js/jquery.js"></script>
<script type="text/javascript" SRC="/templates/new_admin/img/js/swfobject.js"></script>

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
				<span>|</span> <a href='?sort=logout'><?php echo $this->_var['language']['menu_logout']; ?></a>
			</div>
			
			
			<div>
				<ul class="sf-menu">
                <li><a HREF="?sort=start">首页</a></li>
					<li  class="current"><a HREF="?sort=game_flat">管理平台</a></li>
					<li><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</div>
			
			
			
		</div>
	</div>
	
</div>

	<div id="pagetitle">
		<div class="wrapper">
			<h1>平台管理 - 权限管理</h1>
		</div>
	</div>
	

<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=admin&do=admin_add"><?php echo $this->_var['language']['admin_add']; ?></a>
&raquo;&nbsp;<?php echo $this->_var['language']['admin_list']; ?></div>
<div class='item'>
	<table cellspacing="0" cellpadding="0" width="100%">
	<?php $_from = $this->_var['admin_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'admin');if (count($_from)):
    foreach ($_from AS $this->_var['admin']):
?>
	<tr>
	<td height="28" align="center" width="40"><?php echo $this->_var['admin']['id']; ?></td>
	<td>
	<a href="?sort=game_flat&action=admin&do=admin_edit&admin_id=<?php echo $this->_var['admin']['id']; ?>" class="name"><?php echo $this->_var['admin']['name']; ?></a>&nbsp;<span style="font-size:10px;color:#ccc">(<?php echo $this->_var['admin']['password']; ?>)</span>
	</td>
	
	<td width="100" align="center" >
	<?php if ($_SESSION['admin_name'] != $this->_var['admin']['name']): ?>
	<a href="?sort=game_flat&action=admin&do=admin_edit&admin_id=<?php echo $this->_var['admin']['id']; ?>"><?php echo $this->_var['language']['edit']; ?></a>
	<a href="?sort=game_flat&action=admin&do=admin_delete&admin_id=<?php echo $this->_var['admin']['id']; ?>" onclick="return confirm('<?php echo $this->_var['language']['confirm_delete']; ?>')"><?php echo $this->_var['language']['delete']; ?></a>
	<?php endif; ?>
	</td>

	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="4"></td></tr>
	<?php endforeach; else: ?>
	<tr><td height="50" colspan="2" align="center"><?php echo $this->_var['language']['nodata']; ?></td></tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>