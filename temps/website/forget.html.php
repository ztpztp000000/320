<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
		<title><?php echo $this->_var['config']['site_name']; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <LINK href="/templates/kele/img/reset.css" type=text/css rel=stylesheet>
    <LINK href="/templates/kele/img/common.css" type=text/css rel=stylesheet>
    <LINK href="/templates/kele/img/main.css" type=text/css rel=stylesheet>
    <!--[if lte IE 6]>
    <script src="/templates/kele/img/fixPNG.js"></script>
    <script type="text/javascript">
    DD_belatedPNG.fix('.pngfix');
    </script>
    <![endif]--> 
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
</head>
<body>
    <?php echo $this->fetch('header.html'); ?>
    <div class="mainContent clearfix">
        <div class="box reg" id="div_reg">
            <h3>
                <strong class="fl pngfix">用户中心</strong>
            </h3>
            <div class="margin">
              <div class="reg_div">
            <div class="member_form">
<?php if ($this->_var['reset'] == 1): ?>
			<form id="reset_form" name="register_form" method="post" action="user.php?action=reset_ok">
			<table cellpadding="4" cellspacing="4" width="100%" align="center">
                <tr>
                    <td height="38" align="right">
                        新密码：                    </td>
                    <td>
                        <input type="password" id="member_password" name="member_password" class="reg_i" />
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
                    <td height="38"></td>
                    <td><input type="submit" id="reset_submit" value="重设密码" style="width:90px; height:30px; font-size:14px;" /></td>
                </tr>
          </table>
		  <input type="hidden" name="mail" value="<?php echo $this->_var['mail']; ?>" />
		  <input type="hidden" name="safecode" value="<?php echo $this->_var['safecode']; ?>" />
		  </form>
<?php else: ?>
			<form id="forget_form" name="register_form" method="post" action="user.php?action=forget_ok">
			<table cellpadding="4" cellspacing="4" width="100%" align="center">
                <tr>
                    <td width="17%" height="38" align="right">
                        电子邮箱：</td>
                    <td width="83%">
                        <input type="text" id="member_mail" name="member_mail" class="reg_i" />&nbsp;<span id="errMsg_member_mail"></span></td>
                </tr>
                <tr id="Code" visible="false">
                    <td height="38" align="right">
                        验证码：</td>
                    <td>
                        <input type="text" id="authcode" name="authcode" class="reg_i2" />
                        <img src="authcode.php" alt="" align="absmiddle" onclick="this.src+='?'+Math.random()"/>                    </td>
                </tr>
                <tr>
                    <td height="38"></td>
                    <td><input type="submit" id="forget_submit" value="取回密码" style="width:90px; height:30px; font-size:14px;" /></td>
                </tr>
          </table>
		  </form>
<?php endif; ?>
          </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
	$("#forget_submit").click(function(){
		var member_mail=$('#member_mail').val();
		if ($.trim(member_mail)==''){
			$("#errMsg_member_mail").html("<img src='images/no.gif' align='absmiddle'/> 请输入邮箱");
			return false;
		}
		var reg=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
		if(!reg.test(member_mail)){
			$("#errMsg_member_mail").html("<img src='images/no.gif' align='absmiddle'/> 邮箱格式错误");
			return false;
		}
		flag=false;
		$.ajax({
			type:"GET",
			url:"user.php?action=check_member_mail&member_mail="+encodeURI(this.value)+"&r="+Math.random(), dataType:"text",async:false,success:function (e){	
			if (e==1) {
				flag=true;
			}}
		});
		if(!flag){
			$("#errMsg_member_mail").html("<img src='images/no.gif' align='absmiddle'/> 邮箱不存在");
			return false;
		}
		$("#forget_form").submit();
	});
</script>
    <?php echo $this->fetch('footer.html'); ?>
</body>
</html>