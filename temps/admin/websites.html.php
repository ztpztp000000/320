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
			<h1>游戏网站管理</h1>
		</div>
	</div>
	
    
<div id="web_site">
<ul>
<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>

<?php if ($this->_var['game']['id'] == $this->_var['game_id']): ?>
<li class="li_actvie"><a href="?sort=websites&action=game&do=sel_game&game_id=<?php echo $this->_var['game']['id']; ?>"> <?php echo $this->_var['game']['name']; ?> </a></li>
<?php else: ?>
<li><a href="?sort=websites&action=game&do=sel_game&game_id=<?php echo $this->_var['game']['id']; ?>"> <?php echo $this->_var['game']['name']; ?> </a></li>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>
<div id="web_site">		
	<ul>
		<li><a href="?sort=websites&action=game&do=edit_game"><img src="/templates/new_admin/img/08.png" /><br />游戏编辑</a></li>
    	<li><a href="?sort=websites&action=content&channel_id=1"><img src="/templates/new_admin/img/01.png" /><br />新闻公告</a></li>
    	<li><a href="?sort=websites&action=content&channel_id=2"><img src="/templates/new_admin/img/02.png" /><br />热门活动</a></li>
        <li><a href="?sort=websites&action=content&channel_id=3"><img src="/templates/new_admin/img/04.png" /><br />游戏资料</a></li>
        <li><a href="?sort=websites&action=content&channel_id=4"><img src="/templates/new_admin/img/05.png" /><br />游戏攻略</a></li>
        <li><a href="?sort=websites&action=content&channel_id=5"><img src="/templates/new_admin/img/07.png" /><br />玩家心得</a></li>
        <li><a href="?sort=websites&action=links"><img src="/templates/new_admin/img/09.png" /><br />友情链接</a></li>
    </ul></div>
</body>
</html>