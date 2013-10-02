<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/style.css" type=text/css rel=stylesheet>
<!--swfobject - needed only if you require <video> tag support for older browsers -->
<script type="text/javascript" SRC="/templates/new_adminjs/swfobject.js"></script>

<script type="text/javascript" SRC="/templates/new_adminjs/jquery-1.4.2.min.js"></script>
<!-- Could be loaded remotely from Google CDN : <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript" SRC="/templates/new_adminjs/jquery.ui.core.min.js"></script>
<script type="text/javascript" SRC="/templates/new_adminjs/jquery.ui.widget.min.js"></script>
<script type="text/javascript" SRC="/templates/new_adminjs/jquery.ui.tabs.min.js"></script>

<script type="text/javascript" SRC="/templates/new_adminjs/jquery.tipTip.min.js"></script>

<script type="text/javascript" SRC="/templates/new_adminjs/jquery.superfish.min.js"></script>
<script type="text/javascript" SRC="/templates/new_adminjs/jquery.supersubs.min.js"></script>

<script type="text/javascript" SRC="/templates/new_adminjs/jquery.validate_pack.js"></script>

<script type="text/javascript" SRC="/templates/new_adminjs/jquery.nyroModal.pack.js"></script>

 

<!--[if IE]>

<link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>

<script src="js/html5.js"></script>

<![endif]-->



<!--[if lt IE 8]>

<script src="js/IE8.js"></script>

<![endif]-->
</head>
<body>

		<div class="wrapper-login">
			
			<div id="title">游戏平台管理系统</div>
			
			<nav id="menu">
				<ul class="sf-menu">
				<li class="current"><a href="#">登 陆</a></li>
				</ul>
			</nav>
			<!-- End of Main navigation
            ------------------------------------------------------------------------------------------------end-->
			
			
		</div>
	
	
	<div id="pagetitle">
		<div class="wrapper-login"></div>
	</div>
	
	
	<div id="page">
		
		<div class="wrapper-login">
				
				<section class="full">					
					<div class="box box-info">请输入管理员账号</div>
                    
                    <form action="?do=login" method="post" name="login">
						<p>
							<label class="required" for="username">用户名:</label><br/>
							<input type="text" class="full" value="" name="admin_name"/>
						</p>
						<p>
						<label class="required" for="password">密 码:</label><br/>
						<input type="password" class="full" value="" name="admin_password"/>
						</p>
                        <p><label class="required" for="authcode">校验码:</label><br/></p>
						<input type="text" name="authcode" class="full" />
                        <p><img src="/authcode.php" alt="" align="absmiddle" onclick="this.src+='?'+Math.random()"/></p>
                        <p class="box box-info">如果看不校验码图片，请F5刷新或用点击图片刷新。</p>
						<p>
							<input type="checkbox" id="remember" class="" value="1" name="remember"/>
							<label class="choice" for="remember">记住我?</label>
						</p>
						<p>
							<input type="submit" class="btn btn-green big" value="登  陆"/>
						</p>
						<div class="clear">&nbsp;</div>
					</form>
				</section>
				
		</div>
		
	</div>
	
	
	<footer id="bottom">
		<div class="wrapper-login">

			<p>Copyright &copy; 2012 wanooxx | 网站设计 <a HREF="www.famfamfam.com/index.htm">玩圈圈叉叉</a></p>
		</div>
	</footer>
	

</body>
</html>
