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
			<h1>平台管理 -广告管理 - 编辑</h1>
		</div>
	</div>
	
 <table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=ad&do=ad_edit"><?php echo $this->_var['language']['ad_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?>添加广告<?php else: ?>编辑广告<?php endif; ?>

</div>
<div class='item'>
	<form action="?sort=game_flat&action=ad&do=ad_<?php echo $this->_var['mode']; ?>" method="post" enctype="multipart/form-data">
		<table width="100%" cellspacing="5" cellpadding="0">
			<tr>
				<td align="right" width="20%" height="30">广告名称</td>
				<td><input type="text" name="ad_name" size="30" value="<?php echo $this->_var['ad']['name']; ?>" class="input"/></td>
			</tr>
			<tr>
			  <td height="30"  align="right">链接网址</td>
			  <td><input type="text" name="ad_link" size="30" value="<?php echo htmlspecialchars($this->_var['ad']['link']); ?>" class="input"/></td>
			</tr>
			<tr>
				<td width="20%" height="30"  align="right">广告图片</td>
				<td><input type="file" name="ad_pic" class="input"/>
	  				<?php if ($this->_var['ad']['pic_name']): ?>
	  				<a href="uploads/<?php echo $this->_var['ad']['pic_name']; ?>" target="_blank"><img src="uploads/<?php echo $this->_var['ad']['pic_name']; ?>" alt="" align="absmiddle" style="width:100px;height:60px;border:1px solid #ccc;padding:1px"/></a>
	  			<?php endif; ?></td>
			</tr>
			<tr>
				<td width="20%" height="30" align="right">播放顺序</td>
				<td><input type="text" name="ad_sort" size="10" value="<?php echo $this->_var['ad']['sort']; ?>" class="input"/></td>
			</tr>
			<tr>
				<td align="right" height="30"  width="20%"></td>
				<td><label>
				  <input type="checkbox" name="ad_is_show" value="1" <?php if ($this->_var['ad']['visble'] == 1): ?>checked<?php endif; ?> />
		          是否显示</label>
		          </td>
			</tr>
			<tr>
				<td width="20%" height="30" align="right">&nbsp;</td>
				<td valign="center">
				<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>		</td>
			</tr>
		</table>
		<input type="hidden" name="ad_id" value="<?php echo $this->_var['ad']['id']; ?>"/>
	</form>
</div>
</td>
</tr>
</table>
</body>
</html>