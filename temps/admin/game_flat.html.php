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
			<h1>平台管理</h1>
		</div>
	</div>
	
  
<div id="s_website">
	<ul><li> <a href="?sort=game_flat&action=config&do=info"><img src="/templates/new_admin/img/list_canshu.png" /><br />站点参数 </a></li>
    	<li> <a href="?sort=game_flat&action=admin"><img src="/templates/new_admin/img/list_user.png" /><br />权限管理 </a></li>
		<li> <a href="?sort=game_flat&action=news"><img src="/templates/new_admin/img/list_new.png" /><br />新闻公告 </a></li>
        <li> <a href="?sort=game_flat&action=channel"><img src="/templates/new_admin/img/list_new.png" /><br />频道管理 </a></li>
		<li> <a href="?sort=banner"><img src="/templates/new_admin/img/list_ad.png" /><br />banner管理 </a></li>
        <li> <a href="?sort=game_flat&action=ad"><img src="/templates/new_admin/img/list_ad.png" /><br />广告管理 </a></li>
		<li> <a href="?sort=game_flat&action=links"><img src="/templates/new_admin/img/list_ad.png" /><br />友情链接 </a></li>
    </ul></div>
</body>
</html>