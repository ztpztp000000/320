<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/scripts/jquery.js"></script>

<script type="text/javascript" src="/scripts/jquery.calendar.js"></script>
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
			
			<div id="title"><h1>用户管理</h1></div>
			
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
					<li><a HREF="?sort=websites">管理官网</a></li>
					<li class="current"><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</nav>
			
			
			
		</div>
	</div>
	

	<div id="pagetitle">
		<div class="wrapper">
			<h1>管理用户</h1>
		</div>
	</div>
	
	

<table width="980" cellpadding="0" cellspacing="0" align="center";>
<tr>
<td valign="top">
<div class='title'><a href="?sort=user&do=member_add"><?php echo $this->_var['language']['member_add']; ?></a>&raquo;&nbsp;<?php echo $this->_var['language']['member_list']; ?></div>
<div>
	<form action="?sort=user" method="post">
	<table width="99%" border="0" cellspacing="2" cellpadding="2" align="center">
	  <tr>
	    <td width="480">时间：
			<select name="time_type">
				<option value="1" <?php if ($this->_var['search']['time_type'] == 1): ?>selected="selected"<?php endif; ?>>注册时间</option>
				<option value="2" <?php if ($this->_var['search']['time_type'] == 2): ?>selected="selected"<?php endif; ?>>最后登陆时间</option>
			</select>
			<input id="stime" name="stime" type="text" size="15" value="<?php echo $this->_var['search']['stime']; ?>" readonly bj="cBj" />
			-
			<input id="etime" name="etime" type="text" size="15" value="<?php echo $this->_var['search']['etime']; ?>" readonly bj="cBj" /></td>
	    <td width="240">用户名：
	      <input name="username" type="text" size="20" value="<?php echo $this->_var['search']['username']; ?>" /></td>
	    <td><input type="submit" name="Submit" value="提交查询" style="padding:2px 5px" /></td>
	  </tr>
	</table>
	</form>
	<table cellspacing="1" cellpadding="0" width="100%">
	<tr class="titlebg">
		<!--
		<td width="30" align="center"></td>
		-->
		<td height="20" width="80" align="center">ID</td>
		<td>用户名</td>
		<td width="150">注册时间</td>
		<td width="100">注册IP</td>
		<td width="150">最后登陆时间</td>
		<td width="80">状态</td>
		<td width="150">推广渠道</td>
		</tr>
		<form action="?sort=user&do=member_delete" method="post" name="member_list">
		<?php $_from = $this->_var['member_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'member');if (count($_from)):
    foreach ($_from AS $this->_var['member']):
?>
		<tr>
		<!--
		<td width="30" align="center"><input type="checkbox" name="member_id[]" value="<?php echo $this->_var['member']['id']; ?>" /></td>
		-->
		<td height="30" width="80" align="center"><?php echo $this->_var['member']['id']; ?></td>
		<td><a href="?sort=user&do=member_edit&member_id=<?php echo $this->_var['member']['id']; ?>"><?php echo $this->_var['member']['username']; ?></a></td>
		<td width="150"><?php echo $this->_var['member']['join_time']; ?></td>
		<td width="100"><?php echo $this->_var['member']['join_ip']; ?></td>
		<td width="150"><?php echo $this->_var['member']['last_time']; ?></td>
		<td width="80">
		<?php if ($this->_var['member']['state'] == 1): ?><?php echo $this->_var['language']['form_member_state_1']; ?><?php endif; ?>
		<?php if ($this->_var['member']['state'] == 0): ?><?php echo $this->_var['language']['form_member_state_0']; ?><?php endif; ?>
		</td>
		<td width="150"><?php echo $this->_var['member']['spread_user']; ?> - <a href="?sort=user&do=sp&sp_id=<?php echo $this->_var['member']['id']; ?>">推广数据</a></td>
		</tr>
		<tr><td height="1" bgcolor="#eeeeee" colspan="8"></td></tr>
		<?php endforeach; else: ?>
		<tr><td height="50" colspan="8" align="center"><?php echo $this->_var['language']['nodata']; ?></td></tr>
		<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</form>
		<?php if ($this->_var['member_list']): ?>
		<tr>
		<!--
		<td height="30" width="30" align="center"><input type="checkbox" onclick="batch('member_list',this)"  /></td>
		<td colspan="7">
		<table width="100%">
		<tr>
		<td width="100">
		<select onchange="batch_do('member_list',this.options[this.selectedIndex].value)">
		<option><?php echo $this->_var['language']['select']; ?></option>
		<option value="delete"><?php echo $this->_var['language']['selected_delete_member']; ?></option>
		</select>
		</td>
		</tr></table>
		</td>
		-->
		<td colspan="7" align="right"><?php echo $this->_var['pagebar']; ?></td>
		</tr>
		<?php endif; ?>
	</table>
</td>
</tr>
</table></tr>
</body>
</html>