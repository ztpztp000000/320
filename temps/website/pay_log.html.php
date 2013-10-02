<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/game.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
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
        <strong class="fl icon_02">用户中心</strong>
		<div class="margin_jl">
			<div class="msg"><strong>您的历史充值记录</strong></div>
			<div class="xsk_content">
				<h2>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="center">订单号</td>
					<td width="12%" align="center">订单方式</td>
					<td width="12%" align="center">充值金额</td>
					<td width="25%" align="center">充值时间</td>
					<td width="20%" align="center">充值游戏</td>
				  </tr>
				</table>
				</h2>
				<ul>
					<?php $_from = $this->_var['paylog']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');if (count($_from)):
    foreach ($_from AS $this->_var['log']):
?>
					<li>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td align="center"><?php echo $this->_var['log']['order_no']; ?></td>
							<td width="12%" align="center"><?php echo $this->_var['log']['pay_mode']; ?></td>
							<td width="12%" align="center"><?php echo $this->_var['log']['money']; ?></td>
							<td width="25%" align="center"><?php echo $this->_var['log']['time']; ?></td>
							<td width="20%" align="center"><?php echo $this->_var['log']['game']; ?></td>
						  </tr>
					  </table>
					</li>
					<?php endforeach; else: ?>
					<li>您当前还未充值过，<a href="pay0.php">立即充值</a>。</li>
					<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
				<div align="right"><?php echo $this->_var['pagebar']; ?></div>
          </div>
          </div>
        </div>
        <div class="game_right">
        <DIV class="" id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV>


        </div>
        </div>


<?php echo $this->fetch('footer.html'); ?>
</body>
</html>
