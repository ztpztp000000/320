<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" SRC="/templates/new_admin/img/js/swfobject.js"></script>
<script type="text/javascript" src="/scripts/jquery.js"></script>
<script type="text/javascript" src="/scripts/jquery.calendar.js"></script>
<link href="styles/calendars.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
  $("#stime").cld();
  $("#etime").cld();
});
</script>
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
			
			
			<div>
				<ul class="sf-menu">
                <li><a HREF="?sort=start">首页</a></li>
					<li><a HREF="?sort=pay_flat">管理平台</a></li>
					<li><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li class="current"><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</div>
			
			
			
		</div>
	</div>
	
</div>

	<div id="pagetitle">
		<div class="wrapper">
			<h1>充值记录</h1>
		</div>
	</div>
	

<table width="1100" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'></div>
	<form action="?sort=pay" method="post">
	<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
	  <tr>
		<td width="180">充值方式：
		  <select name="mode_id">
		    <option value="">全部</option>
		      <?php $_from = $this->_var['paymode_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'paymode');if (count($_from)):
    foreach ($_from AS $this->_var['paymode']):
?>
			  <option value="<?php echo $this->_var['paymode']['id']; ?>" <?php if ($this->_var['paymode']['id'] == $this->_var['search']['mode_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['paymode']['name']; ?></option>
			  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		    </select></td>
		    
	    <td width="300">充值游戏：
			<select id="game_id" name="game_id" onchange="getServer(this.options[selectedIndex].value)">
            	<option value="">全部</option>
              	<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
			  	<option value="<?php echo $this->_var['game']['id']; ?>" <?php if ($this->_var['game']['id'] == $this->_var['search']['game_id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_var['game']['name']; ?></option>
			  	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</select>
          	<select id="server_id" name="server_id">
            <option value="">全部</option>
			</select>
		</td></tr>
		<tr>	
	    <td width="400">充值时间：
			<input id="stime" name="stime" type="text" size="15" value="<?php echo $this->_var['search']['stime']; ?>" readonly bj="cBj" />
			-
			<input id="etime" name="etime" type="text" size="15" value="<?php echo $this->_var['search']['etime']; ?>" readonly bj="cBj" />
		</td>
	  </tr>
	  <tr>
	    <td>订单状态：
          <select name="pay_state">
            <option value="3">全部</option>
            <option value="0" <?php if ($this->_var['search']['pay_state'] == 0): ?>selected="selected"<?php endif; ?>>未付款</option>
            <option value="1" <?php if ($this->_var['search']['pay_state'] == 1): ?>selected="selected"<?php endif; ?>>付款未处理</option>
			<option value="2" <?php if ($this->_var['search']['pay_state'] == 1): ?>selected="selected"<?php endif; ?>>充值成功</option>
			</select></td>
	    <td>订单号：　
	      <input name="order_no" type="text" size="20" value="<?php echo $this->_var['search']['order_no']; ?>" /></td>
	    <td>充值账号：
          <input name="game_user" type="text" size="20" value="<?php echo $this->_var['search']['game_user']; ?>" /></td>
	  </tr>
	  <tr>
	    <td><input type="submit" name="Submit" value="提交查询" style="padding:2px 5px" /></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	  </tr>
	</table>
	</form>
	<table cellspacing="1" cellpadding="0" width="100%">
	<tr class="titlebg">
	<td height="20" width="40" align="center">ID</td>
	<td width="160" align="center">订单号</td>
	<td width="80">充值方式</td>
	<td width="80">充值状态</td>
	<td width="100">充值账号</td>
	<td width="100">目标账号</td>
	<td width="80">充值金额</td>
	<td width="80">到账金额</td>
	<td width="160">充值时间</td>
	<td width="120">充值IP</td>
	<td width="120">充值游戏</td>
	<td width="80" align="center">操作</td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="10"></td></tr>
	<?php $_from = $this->_var['pay_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pay');if (count($_from)):
    foreach ($_from AS $this->_var['pay']):
?>
	<tr>
	<td height="30" align="center"><?php echo $this->_var['pay']['id']; ?></td>
	<td align="center"><?php echo $this->_var['pay']['order_no']; ?></td>
	<td><?php echo $this->_var['pay']['pay_mode_name']; ?></td>
	<td><span style="color:<?php if ($this->_var['pay']['state'] == 2): ?>green<?php elseif ($this->_var['pay']['state'] == 1): ?>red<?php endif; ?>;"><?php echo $this->_var['pay']['state_str']; ?></span></td>
	<td><?php echo $this->_var['pay']['pay_user']; ?></td>
	<td><?php echo $this->_var['pay']['game_user']; ?><?php if ($this->_var['pay']['game_role'] != ''): ?> (<?php echo $this->_var['pay']['game_role']; ?>)<?php endif; ?></td>
	<td><?php echo $this->_var['pay']['money']; ?></td>
	<td><?php echo $this->_var['pay']['real_money']; ?></td>
	<td><?php echo $this->_var['pay']['time']; ?></td>
	<td><?php echo $this->_var['pay']['ip']; ?></td>
	<td><?php echo $this->_var['pay']['game_name']; ?></td>
	<td align="center">
	<a href="?sort=pay&do=pay_delete&pay_id=<?php echo $this->_var['pay']['id']; ?>" onclick="return confirm('<?php echo $this->_var['language']['confirm_delete']; ?>')"><?php echo $this->_var['language']['delete']; ?></a>
	<?php if ($this->_var['pay']['state'] == 1): ?>
		<?php if ($this->_var['pay']['mode'] != 6): ?>
		| <a href="?sort=pay&do=repair_bill&order_no=<?php echo $this->_var['pay']['order_no']; ?>">补单</a>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($this->_var['pay']['rebates'] == 0): ?>
		<?php if ($this->_var['pay']['state'] == 2): ?>
		<?php if ($this->_var['pay']['pay_mode_id'] != 6): ?>
		| <a href="?sort=pay&do=rebates&order_no=<?php echo $this->_var['pay']['order_no']; ?>">返利</a>
		<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	</td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="10"></td></tr>
	<?php endforeach; else: ?>
	<tr><td height="50" colspan="10" align="center"><?php echo $this->_var['language']['nodata']; ?></td></tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<tr>
	<td colspan="3" style="color:red;">&nbsp;&nbsp;合计金额：<?php echo $this->_var['total']; ?></td>
	<td height="50" colspan="7" align="right"><?php echo $this->_var['pagebar']; ?></td>
	</tr>
	</table>
</td>
</tr>
</table>
<script type="text/javascript">
	function getServer(id){
		$.ajax({
			url:'pay.php',
			data:"action=get_server&game_id="+id,
			type:'get',
			dataType:'text',
			success:function(result){
				//alert(result);
				$("#server_id").empty();
				$("#server_id").append('<option value="">全部</option>');
				$("#server_id").append(result);
			}
		});
	}
	//默认游戏
	<?php if ($this->_var['search']['game_id'] > 0): ?>
		getServer(<?php echo $this->_var['search']['game_id']; ?>);
	<?php endif; ?>
</script>
</body>
</html>