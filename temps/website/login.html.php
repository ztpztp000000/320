<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
		<title><?php echo $this->_var['config']['site_name']; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
    <LINK href="/templates/kele/image/login.css" type=text/css rel=stylesheet>
    <LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
    <!--[if lte IE 6]>
    <script src="/templates/kele/img/fixPNG.js"></script>
    <script type="text/javascript">
    DD_belatedPNG.fix('.pngfix');
    </script>
    <![endif]--> 
</head>
<body>
<?php echo $this->fetch('header.html'); ?>
  <div class="main">
  	<div id="headindex">
    <h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
    </div>
    <div id="wrapper">
    	<div class=t></div>
        	<div class=m>
        		<div class="l">
        			<div id="login">
            		<div class=tit></div>
                 <form id="login_form" name="login_form" method="post" action="user.php?action=login_ok">
                <div class=wrongbox></div>
                通行证<input id="member_username" name="member_username" type="text" class="input180" />
                通行证密码：<input id="member_password" name="member_password" type="password" class="input180" />
                验证码：<input id="authcode" name="authcode" type="text" class="input180" />
                <img src="authcode.php" alt="" align="absmiddle" onclick="this.src+='?'+Math.random()"/>
                <div class=yzm></div>
                <div class="buttonbox">
                <div class="login_button">
                <input type="image" src="templates/kele/image/login_button.png" />
                </div>
                </div>
                
                </form>
            </div> 
<div id="getlogin">
</div>

<div id="reg">
	还没注册通行证？
    <a href="reg.php" class="regbutton"><img src="templates/kele/image/zc.jpg" /></a>
   </div>
    	</div>

	<div class="r_main">
    	<div class="login_top"></div>
        <div class="login_ad"> <?php echo $this->fetch('hot.html'); ?></div>
    </div>
     </div>
<div class="b_tom"></div>  
  </div>   <div class="hr30"></div>  <div class="hr30"></div>   <div class="hr30"></div><?php echo $this->fetch('footer.html'); ?>
  </div>

 <script type="text/javascript">
	var logins=function(){
		var member_username=$('#member_username').val();
		var member_password=$('#member_password').val();
		if ($.trim(member_username)==''){
			alert('<?php echo $this->_var['language']['username_is_empty']; ?>');
			return false;
		}
		if ($.trim(member_password)==''){
			alert('<?php echo $this->_var['language']['password_is_empty']; ?>');
			return false;
		}
		if (member_password.length<6&&member_password.length>20){
			alert('<?php echo $this->_var['language']['member_password_text']; ?>');
			return false;
		}
		
		$("#login_form").submit();
		
		/*$.ajax({
			type:"GET",
			url:"user.php?action=login_ok&member_username="+encodeURI(member_username)+"&member_password="+encodeURI(member_password)+"&r="+Math.random(), 
			dataType:"text",
			async:false,
			success:function(e){
				if(e=='error:username_is_empty'){
					alert('<?php echo $this->_var['language']['username_is_empty']; ?>');
					return false;
				}else if(e=='error:password_is_empty'){
					alert('<?php echo $this->_var['language']['password_is_empty']; ?>');
					return false;
				}else if(e=='error:account_is_not_activate'){
					alert('<?php echo $this->_var['language']['account_is_not_activate']; ?>');
					return false;
				}else if(e=='error:account_is_lock'){
					alert('<?php echo $this->_var['language']['account_is_lock']; ?>');
					return false;
				}else if(e=='error:login_failed'){
					alert('<?php echo $this->_var['language']['login_failed']; ?>');
					return false;
				}
			}
		});*/
	};
	$("#login_submit").click(function(){
		logins();
	});
</script>
</body>
</html>