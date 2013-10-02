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
					<li class="current"><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
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
	<form action="?sort=user&do=sp&sp_id=<?php echo $this->_var['sp_id']; ?>" method="post">
	<table width="100%" border="0" cellspacing="2" cellpadding="2" align="center">
		<tr>
	    <td width="400">充值时间：
			<input id="stime" name="stime" type="text" size="15" value="<?php echo $this->_var['search']['stime']; ?>" readonly bj="cBj" />
			-
			<input id="etime" name="etime" type="text" size="15" value="<?php echo $this->_var['search']['etime']; ?>" readonly bj="cBj" />
		</td>
		<td>充值账号：
          <input name="game_user" type="text" size="20" value="<?php echo $this->_var['search']['game_user']; ?>" />
        </td>
        
        <td><input type="submit" name="Submit" value="提交查询" style="padding:2px 5px" /></td>
	  </tr>
	  
	</table>
	</form>
	<table cellspacing="1" cellpadding="0" width="100%">
	<tr class="titlebg">
	<td width="100">账号</td>
	<td width="80">充值金额</td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="10"></td></tr>
	<?php $_from = $this->_var['pay_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pay');if (count($_from)):
    foreach ($_from AS $this->_var['pay']):
?>
	<tr>

	<td><?php echo $this->_var['pay']['game_user']; ?><?php if ($this->_var['pay']['game_role'] != ''): ?> (<?php echo $this->_var['pay']['game_role']; ?>)<?php endif; ?></td>
	<td><?php echo $this->_var['pay']['real_money']; ?></td>
	
	<td align="center">
	<a href="?sort=user&do=pay_log&user=<?php echo $this->_var['pay']['game_user']; ?>">充值日志</a>
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