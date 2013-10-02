<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                <li class="current"><a HREF="?sort=start">首页</a></li>
					<li><a HREF="?sort=game_flat">管理平台</a></li>
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
			<h1>管理首页</h1>
		</div>
	</div>
	
    
    
    <div id="s_page"><ul>
    		<li><h3><strong>尊敬的用户，欢迎回来！</strong></h3></li>
            </ul>
	</div>
    <div id="s_data"><ul>
    		<li>您可以更新平台数据：<a href="?sort=start">点击更新</a></li>
    		<li><b class="padding">总注册量：<?php echo $this->_var['reg_info']['total_user']; ?> （人）</b><b class="padding">本月新增注册量：<?php echo $this->_var['reg_info']['month_reg']; ?> （人）</b><b class="padding">今日新增注册量：<?php echo $this->_var['reg_info']['day_reg']; ?> （人）</b></li>
            <li><b class="padding">总充值：<?php echo $this->_var['reg_info']['total_pay']; ?> （元）</b><b class="padding">本月新增充值：<?php echo $this->_var['reg_info']['month_pay']; ?> （元）</b><b class="padding">今日新增充值：<?php echo $this->_var['reg_info']['day_pay']; ?> （元）<b class="padding"></b> </li>
    </ul></div>
    

    <div id="s_detial"><ul>
    <h3><strong>游戏开服信息查询</strong></h3><br />
    		<li>您可以更新数据：<a href="?sort=start">点击更新</a></li>
    		<?php $_from = $this->_var['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
	            <li>
	            	<b class="padding"><?php echo $this->_var['server']['name']; ?> 充值: <?php echo $this->_var['server']['pay']; ?> 元</b>
	            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul></div>
	
	<div id="s_server"><ul>
    		<li><?php echo $this->_var['language']['system_info_1']; ?><?php echo $this->_var['system_info']['SERVER_TIME']; ?></li>
			<li><?php echo $this->_var['language']['system_info_2']; ?><?php echo $this->_var['system_info']['SERVER_PORT']; ?></li>
			<li><?php echo $this->_var['language']['system_info_3']; ?><a href='./' target="_blank" style="color:red;text-decoration:underline"><?php echo $this->_var['system_info']['SERVER_NAME']; ?></a></li>
			<li><?php echo $this->_var['language']['system_info_4']; ?><?php echo $this->_var['system_info']['PHP_OS']; ?></li>
			<li><?php echo $this->_var['language']['system_info_5']; ?><?php echo $this->_var['system_info']['SERVER_SOFTWARE']; ?></li>
			<li><?php echo $this->_var['language']['system_info_6']; ?>MYSQL <?php echo $this->_var['system_info']['DB_VERSION']; ?></li>
			<li><?php echo $this->_var['language']['system_info_7']; ?><?php echo $this->_var['system_info']['DOCUMENT_ROOT']; ?></li>
			<li><?php echo $this->_var['language']['system_info_8']; ?><?php echo $this->_var['system_info']['UPLOAD_MAX_FILESIZE']; ?></li>
    </ul></div>
	
	
	
	<footer id="bottom">
		<div class="wrapper">
			<nav>
				<a href="#">技术支持</a> &middot;
				<a href="#">帮助中心</a> &middot;

			</nav>
			<p>Copyright &copy; 2012 <b><a HREF="themeforest.net/user/zoranjuric" title="Visit my profile page @ThemeForest">whmedia</a></b> | 技术支持 <a HREF="www.famfamfam.com/index.htm">玩圈圈叉叉</a></p>
		</div>
	</footer>
	
	
</td>
</tr>
</table>
</body>
</html>