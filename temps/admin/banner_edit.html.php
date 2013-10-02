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
			<h1>平台管理 -banner管理 - 编辑</h1>
		</div>
	</div>
	
 <table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?action=other&do=ad_list"><?php echo $this->_var['language']['ad_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['ad_add']; ?><?php else: ?><?php echo $this->_var['language']['ad_edit']; ?><?php endif; ?>

</div>

<div class='item'>
	<?php $_from = $this->_var['banner_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'banner');if (count($_from)):
    foreach ($_from AS $this->_var['banner']):
?>
	<form action="?sort=banner&action=update&id=<?php echo $this->_var['banner']['id']; ?>" method="post" enctype="multipart/form-data">
		<table width="100%" cellspacing="5" cellpadding="0">
			<tr>
			  <td height="30"  align="right">第一幅链接</td>
			  <td><input type="text" name="website_<?php echo $this->_var['banner']['id']; ?>" size="30" value="<?php echo htmlspecialchars($this->_var['banner']['website']); ?>" class="input"/>【图片的链接地址，请填写绝对地址】</td>
			</tr>
			<tr>
				<td width="20%" height="30"  align="right">第一幅banner</td>
				<td><input type="file" name="pic_<?php echo $this->_var['banner']['id']; ?>" class="input"/>
	  				<?php if ($this->_var['banner']['pic']): ?>
	  				<a href="<?php echo $this->_var['banner']['pic']; ?>" target="_blank"><img src="<?php echo $this->_var['banner']['pic']; ?>" alt="" align="absmiddle" style="width:100px;height:60px;border:1px solid #ccc;padding:1px"/></a>
	  			<?php endif; ?>【尺寸规格：1440 * 300px】</td>
			</tr>
			<tr>
				<td width="20%" height="30"  align="right">第一幅小图</td>
				<td><input type="file" name="pic_mini_<?php echo $this->_var['banner']['id']; ?>" class="input"/> 
	  				<?php if ($this->_var['banner']['pic_mini']): ?>
	  				<a href="<?php echo $this->_var['banner']['pic_mini']; ?>" target="_blank"><img src="<?php echo $this->_var['banner']['pic_mini']; ?>" alt="" align="absmiddle" style="width:100px;height:60px;border:1px solid #ccc;padding:1px"/></a>
	  			<?php endif; ?>【尺寸规格：104 * 57px】</td>
				<td><input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button" style="width:200px;"/></td>
			</tr>

			
			--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		</table>
	</form>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</body>
</html>