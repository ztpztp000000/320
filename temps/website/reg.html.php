<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/reg.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]--> 
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
<body>
<?php echo $this->fetch('header.html'); ?>
<div class="contenter">


  
 <div class="user_main">
 	<div class="user_top">
    	<h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
    </div>
</div>


<div class="wraper">
<div class="reg_bg">
<img src="templates/kele/image/zctxz.png" class="zctxz" /></div>
<div class="hr10"></div>
<div class="regbox"><strong>欢迎您注册网站通行证！为了您的账户安全，请认真填写注册资料！</strong>
<p>根据2010年8月1日实施的《网络游戏管理暂行办法》，网络游戏用户需使用有效身份证件进行实名注册。为保证流畅游戏体验，享受健康游戏生活，请广大好好玩游戏的玩家注册后到尽快到 用户中心 - 防沉迷设置，完成实名认证。</p>
<form id="register_form" name="register_form" method="post" action="user.php?action=register_ok&sp=<?php echo $this->_var['sp']; ?>">
			<table cellpadding="4" cellspacing="4" width="100%" align="center">
                <tr>
                    <td height="38" align="right">
                        用户名：                    </td>
                    <td>
                        <input type="text" id="member_username" name="member_username" class="reg_i" />&nbsp;<span id="errMsg_member_username">账号由字母、数字和下划线"_"，长度为6-16位，不区分大小写。
                        </span>
                    </td>
                </tr>

                <tr>
                    <td height="38" align="right">
                        密码：                    </td>
                    <td>
                        <input type="password" id="member_password" name="member_password" class="reg_i" onkeyup="check_strength(this.value)"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <table width="90" border="0" cellspacing="0" cellpadding="1">
						  <tr align="center">
							<td width="33%" id="pwd_lower">低</td>
							<td width="33%" id="pwd_middle">中</td>
							<td width="33%" id="pwd_high">高</td>
						  </tr>
						</table>
                    </td>
                </tr>
                <tr>
                    <td height="38" align="right">
                        确认密码：                    </td>
                    <td>
                        <input type="password" id="member_password_confirm" name="member_password_confirm" class="reg_i" />
                    </td>
                </tr>
                <tr>
                    <td width="17%" height="38" align="right">
                        电子邮箱：                    </td>
                    <td width="83%">
                        <input type="text" id="member_mail" name="member_mail" class="reg_i" />&nbsp;<span id="errMsg_member_mail"></span>
                  </td>
                </tr>
                <tbody id="sp_id">   
                <tr>
                	<?php if ($this->_var['sp'] == ''): ?>
                    <td width="17%" height="38" align="right">
                        推荐码：                    </td>
                    <td width="83%">
                        <input  type="text" id="sp" name="sp" value="<?php echo $this->_var['sp']; ?>"  class="reg_i" />（选填）
                  </td>
                  <?php endif; ?>
                </tr>
              </tbody>
                <tr id="Code" visible="false">
                    <td height="38" align="right">
                        验证码：</td>
                    <td>
                        <input type="text" id="authcode" name="authcode" class="reg_i2" />
                        <img src="authcode.php" alt="" align="absmiddle" onclick="this.src+='?'+Math.random()"/>
                    </td>
                </tr>
                <tr>
                    <td height="38"></td>
                    <td>
						<input id="register_submit"  type="button" value="" class="reg_btn2"/>
						                    </td>
                </tr>
          </table>
		  </form></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</div>

<script type="text/javascript">   
	$("#member_username").blur(function(){
		var flag=false;
		if(this.value!=''){
			$.ajax({
				type:"GET",
				url:"user.php?action=check_member_username&member_username="+encodeURI(this.value)+"&r="+Math.random(), dataType:"text",async:false,success:function (e){
				if (e==1) {
					flag=false;
				}else{
					flag=true;
				}
			}});
		}
		if (!flag) {
			$("#errMsg_member_username").html("<img src='images/no.gif' align='absmiddle'/>");
		}else{
			$("#errMsg_member_username").html("<img src='images/yes.gif' align='absmiddle'/>");
		}
	});

	$("#member_mail").blur(function(){
		var flag=false;
		if(this.value!=''){
			$.ajax({
				type:"GET",
				url:"user.php?action=check_member_mail&member_mail="+encodeURI(this.value)+"&r="+Math.random(), dataType:"text",async:false,success:function (e){	
				if (e==1) {
					flag=false;
				}else{
					flag=true;
				}
			}});
		}
		if (!flag) {
			$("#errMsg_member_mail").html("<img src='images/no.gif' align='absmiddle'/>");
		}else{
			$("#errMsg_member_mail").html("<img src='images/yes.gif' align='absmiddle'/>");
		}
	});
	
	$("#member_password").blur(function(){
		var Mcolor = "#FFF",Lcolor = "#FFF",Hcolor = "#FFF";
		var m=0,Modes = 0,pwd=this.value;
		for (i=0; i<pwd.length; i++){
			var charType = 0;
			var t = pwd.charCodeAt(i);
			if (t>=48 && t <=57){
			  charType = 1;
			}else if (t>=65 && t <=90){
			  charType = 2;
			}else if (t>=97 && t <=122){
			  charType = 4;
			}else{
			  charType = 4;
			 }
			Modes |= charType;
		}

		for (i=0;i<4;i++){
			if(Modes & 1)m++;
			Modes>>>=1;
		}

		if (pwd.length<=4){
			m = 1;
		}

		switch(m){
		case 1 :
		  Lcolor = "2px solid red";
		  Mcolor = Hcolor = "2px solid #DADADA";
		break;
		case 2 :
		  Mcolor = "2px solid #f90";
		  Lcolor = Hcolor = "2px solid #DADADA";
		break;
		case 3 :
		  Hcolor = "2px solid #3c0";
		  Lcolor = Mcolor = "2px solid #DADADA";
		break;
		case 4 :
		  Hcolor = "2px solid #3c0";
		  Lcolor = Mcolor = "2px solid #DADADA";
		break;
		default :
		  Hcolor = Mcolor = Lcolor = "";
		break;
		}
		if (document.getElementById("pwd_lower")){
			document.getElementById("pwd_lower").style.borderBottom  = Lcolor;
			document.getElementById("pwd_middle").style.borderBottom = Mcolor;
			document.getElementById("pwd_high").style.borderBottom   = Hcolor;
		}
	});
	
	$("#register_submit").click(function(){
		var member_username=$('#member_username').val();
		var member_mail=$('#member_mail').val();
		var member_password=$('#member_password').val();
		var member_password_confirm=$('#member_password_confirm').val();
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
		if ($.trim(member_password)!=$.trim(member_password_confirm)){
			alert('<?php echo $this->_var['language']['password_is_error']; ?>');
			return false;
		}
		if ($.trim(member_mail)==''){
			alert('<?php echo $this->_var['language']['mail_is_empty']; ?>');
			return false;
		}
		var reg=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
		if(!reg.test(member_mail)){
			alert('<?php echo $this->_var['language']['mail_is_error']; ?>');
			return false;
		}
		
		$("#register_form").submit();

		/*$.ajax({type:"GET", url:"user.php?action=register_ok&member_username="+encodeURI(member_username)+"&member_mail="+encodeURI(member_mail)+"&member_password="+encodeURI(member_password)+"&member_password_confirm="+encodeURI(member_password_confirm)+"&r="+Math.random(), dataType:"text",async:false,success:function(e){
			if(e=='error:username_is_empty'){
				alert('<?php echo $this->_var['language']['username_is_empty']; ?>');
				return false;
			}else if(e=='error:username_is_occupy'){
				alert('<?php echo $this->_var['language']['username_is_occupy']; ?>');
				return false;
			}else if(e=='error:mail_is_empty'){
				alert('<?php echo $this->_var['language']['mail_is_empty']; ?>');
				return false;
			}else if(e=='error:mail_is_error'){
				alert('<?php echo $this->_var['language']['mail_is_error']; ?>');
				return false;
			}else if(e=='error:password_is_empty'){
				alert('<?php echo $this->_var['language']['password_is_empty']; ?>');
				return false;
			}else if(e=='error:password_is_error'){
				alert('<?php echo $this->_var['language']['password_is_error']; ?>');
				return false;
			}
		}});*/
	});
</script>
