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
					<li><a HREF="?sort=game_flat">管理平台</a></li>
					<li><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li class="current"><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</nav>
			
			
			
		</div>
	</div>
	
</div>

	<div id="pagetitle">
		<div class="wrapper">
			<h1>平台管理 -友情链接 - 编辑</h1>
		</div>
	</div>
	
 <table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=links&do=link_list"><?php echo $this->_var['language']['link_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['link_add']; ?><?php else: ?><?php echo $this->_var['language']['link_edit']; ?><?php endif; ?>

</div>
<div class='item'>
	<table width="100%">
	<form action="?sort=pay&do=rebates_go" method="post" name="rebates" enctype="multipart/form-data">
		<tr>
		<td align="right" width="80" height="30">返利比例: </td>
		<td><input type="text" name="rate" class="input" size="20" value="" />		</td>
		<td><input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button" style="width:60px;"/></td>
		</tr>
		<input type="hidden" name="order_no" value="<?php echo $this->_var['order_no']; ?>"/>
	</form>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>