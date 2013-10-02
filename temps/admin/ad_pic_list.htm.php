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
			<h1>平台管理 - 广告管理</h1>
		</div>
	</div>
	

<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=ad&do=ad_add"><?php echo $this->_var['language']['ad_add']; ?></a>
&raquo;&nbsp;<?php echo $this->_var['language']['ad_list']; ?>
</div>
	<table cellspacing="0" cellpadding="0" width="100%">
	<?php $_from = $this->_var['ad_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
	<tr>
	<td height="40" width="30" align="center"><?php echo $this->_var['ad']['id']; ?></td>
	<td><a href="?sort=game_flat&action=ad&do=ad_edit&ad_id=<?php echo $this->_var['ad']['id']; ?>"><?php echo $this->_var['ad']['name']; ?></a>&nbsp;<span style="color:#ccc"></span></td>
	<td height="40" width="200" align="center">
	<a href="?sort=game_flat&action=ad&do=ad_edit&ad_id=<?php echo $this->_var['ad']['id']; ?>"><?php echo $this->_var['language']['edit']; ?></a>
	<a href="?sort=game_flat&action=ad&do=ad_delete&ad_id=<?php echo $this->_var['ad']['id']; ?>" onclick="return confirm('<?php echo $this->_var['language']['confirm_delete']; ?>')"><?php echo $this->_var['language']['delete']; ?></a>
	</td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="3"></td></tr>
	<?php endforeach; else: ?>
	<tr><td height="50" colspan="3" align="center"><?php echo $this->_var['language']['nodata']; ?></td></tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</table>
</td>
</tr>
</table>
</body>
</html>