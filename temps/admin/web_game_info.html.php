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
			
			<div id="title"><h1>后台管理系统</h1></div>
			
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
					<li class="current"><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</nav>
			
			
			
		</div>
	</div>
	


	<div id="pagetitle">
		<div class="wrapper">
			<h1>游戏网站管理 - 编辑游戏</h1>
		</div>
	</div>
	
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
&raquo;&nbsp;编辑游戏

</div>
<div class='item'>
	
	<form action="?sort=websites&action=game&do=game_<?php echo $this->_var['mode']; ?>&game_id=<?php echo $this->_var['game']['game_id']; ?>" method="post" enctype="multipart/form-data">
		<table width="100%" cellspacing="5" cellpadding="0">
	
		<tr>
		<td width="20%" align="right">游戏介绍</td>
		<td><textarea name="game_depict" cols="80" rows="3" class="textarea"><?php echo htmlspecialchars($this->_var['game']['game_depict']); ?></textarea>[官网 - 游戏介绍编辑]</td>
		</tr>
		<tr>
		<td width="20%" height="30" align="right">游戏官网</td>
		<td><input type="text" name="game_website" size="30" value="<?php echo $this->_var['game']['game_website']; ?>" class="input"/>[编辑官网地址]</td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">官网背景图</td>
		<td><input type="file" name="website_bk" class="input"/>
	  	<?php if ($this->_var['game']['website_bk']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['website_bk']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['website_bk']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">官网LOGO</td>
		<td><input type="file" name="website_logo" class="input"/>
	  	<?php if ($this->_var['game']['website_logo']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['website_logo']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['website_logo']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">活动图片左上</td>
		<td><input type="file" name="activity_pic_1" class="input"/>
	  	<?php if ($this->_var['game']['activity_pic_1']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['activity_pic_1']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['activity_pic_1']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30" align="right">活动链接地址</td>
		<td><input type="text" name="activity_url_1" size="30" value="<?php echo $this->_var['game']['activity_url_1']; ?>" class="input"/></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">活动图片右上</td>
		<td><input type="file" name="activity_pic_2" class="input"/>
	  	<?php if ($this->_var['game']['activity_pic_2']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['activity_pic_2']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['activity_pic_2']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30" align="right">活动链接地址</td>
		<td><input type="text" name="activity_url_2" size="30" value="<?php echo $this->_var['game']['activity_url_2']; ?>" class="input"/></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">活动图片左下</td>
		<td><input type="file" name="activity_pic_3" class="input"/>
	  	<?php if ($this->_var['game']['activity_pic_3']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['activity_pic_3']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['activity_pic_3']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30" align="right">活动链接地址</td>
		<td><input type="text" name="activity_url_3" size="30" value="<?php echo $this->_var['game']['activity_url_3']; ?>" class="input"/></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">活动图片右下</td>
		<td><input type="file" name="activity_pic_4" class="input"/>
	  	<?php if ($this->_var['game']['activity_pic_4']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['activity_pic_4']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['activity_pic_4']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>[游戏活动区域编辑]
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30" align="right">活动链接地址</td>
		<td><input type="text" name="activity_url_4" size="30" value="<?php echo $this->_var['game']['activity_url_4']; ?>" class="input"/></td>
		</tr>
		
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_1" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_1']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_1']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_1']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a> [编辑游戏截图]
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_2" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_2']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_2']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_2']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_3" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_3']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_3']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_3']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_4" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_4']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_4']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_4']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_5" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_5']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_5']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_5']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		<tr>
		<td width="20%" height="30"  align="right">游戏截图</td>
		<td><input type="file" name="cature_pic_6" class="input"/>
	  	<?php if ($this->_var['game']['cature_pic_6']): ?>
	  	<a href="uploads/<?php echo $this->_var['game']['cature_pic_6']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game']['cature_pic_6']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	  	<?php endif; ?></td>
		</tr>
		
		<tr>
		<td width="20%" height="30" align="right">&nbsp;</td>
		<td valign="center">
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>		</td>
		</tr>
		
		</table>
		<input type="hidden" name="game_id" value="<?php echo $this->_var['game']['game_id']; ?>"/>
	</form>

</div>
</td>
</tr>
</table>
</body>
</html>