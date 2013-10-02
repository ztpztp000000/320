<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/game.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/img/main.css" type=text/css rel=stylesheet>
<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]--> 
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/jquery.calendar.js"></script>
<link href="styles/calendars.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
  $("#member_birthday").cld();
});
</script>
</head>
<body>
<?php echo $this->fetch('header.html'); ?>
 <div class="mainbg">
	<div class="game_main"><h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
		<div class="game_left">
        
        <div class="margin">
			<div class="msg">
				<strong>您的推广链接：<span style="color:red"><?php echo $this->_var['sp_link']; ?></span></strong>
			</div>
			<div class="xsk_content">
				<h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="33%" align="center">用户</td>
					<td width="33%" align="center">注册时间</td>
					<td width="33%" align="center">付费金额</td>
				  </tr>
				</table>
				</h2>
				<ul>
					<?php $_from = $this->_var['splog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');if (count($_from)):
    foreach ($_from AS $this->_var['log']):
?>
					<li>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="33%" align="center"><?php echo $this->_var['log']['username']; ?></td>
							<td width="33%" align="center"><?php echo $this->_var['log']['join_time']; ?></td>
							<td width="33%" align="center"><?php echo $this->_var['log']['pay_count']; ?></td>
						  </tr>
					  </table>
					</li>
					<?php endforeach; else: ?>
					<li>您当前还没有推广记录。</li>
					<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
				<div align="right">推广数据：注册用户<span style="color:red"><?php echo $this->_var['reg_count']; ?></span>人，付费用户<span style="color:red"><?php echo $this->_var['pay_count']; ?></span>人，付费金额<span style="color:red"><?php echo $this->_var['pay_money']; ?></span>元。  
				<input type="button" name="b1" value="申请提现" onclick="javascript:location.href='user.php?action=cash';" />  
			    <?php echo $this->_var['pagebar']; ?></div>
		  </div>
		</div>
        </div>
        <div class="game_right">
        	<DIV class="" id=uc_box>
     	 <?php echo $this->fetch('part_login.html'); ?>
   		 </DIV></div>
    </div><?php echo $this->fetch('footer.html'); ?>
</div>


</body>
</html>
