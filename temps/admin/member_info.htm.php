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
	
	

<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td valign="top">
<div class='title'><a href="?sort=user&do=member_list"><?php echo $this->_var['language']['member_list']; ?></a>&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['member_add']; ?><?php else: ?><?php echo $this->_var['language']['member_edit']; ?><?php endif; ?></div>
<div class='item'>
<table width="100%">
	<form action="?sort=user&do=member_<?php echo $this->_var['mode']; ?>" method="post" enctype="multipart/form-data">

		<tr>
		<td align="right" height="30">用户名：</td>
		<td>
		<?php if ($this->_var['mode'] == 'insert'): ?>
		<input type="text" name="member_username"  size="40" value="<?php echo htmlspecialchars($this->_var['member']['username']); ?>" class="input" />
		<?php else: ?>
		<?php echo $this->_var['member']['username']; ?>
		<input type="hidden" name="member_username" value="<?php echo htmlspecialchars($this->_var['member']['username']); ?>" />
		<?php endif; ?>
		</td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_password']; ?></td>
		<td><input type="password" name="member_password" size="40" value="<?php if ($this->_var['mode'] != 'insert'): ?>passwd<?php endif; ?>" class="input"/></td>
		</tr>

		<tr>
		<td align="right" width="100" height="30"><?php echo $this->_var['language']['form_member_mail']; ?></td>
		<td>
		<input type="text" name="member_mail" size="40" value="<?php echo htmlspecialchars($this->_var['member']['mail']); ?>" class="input"/>
		</td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_safecode']; ?></td>
		<td><input type="password" name="member_safecode" size="40" value="" class="input"/></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_group']; ?></td>
		<td><select name="group_id"><option value="0"><?php echo $this->_var['language']['select']; ?></option><?php echo $this->html_options(array('options'=>$this->_var['member_group'],'selected'=>$this->_var['member']['group_id'])); ?></select></td>
		</tr>

		<tr><td colspan="2" height="30"></td></tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_nickname']; ?></td>
		<td><input type="text" name="member_nickname" size="20" value="<?php echo htmlspecialchars($this->_var['member']['nickname']); ?>" class="input"/></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_name']; ?></td>
		<td><input type="text" name="member_name" size="20" value="<?php echo htmlspecialchars($this->_var['member']['name']); ?>" class="input"/></td>
		</tr>
		<tr>
		<td align="right" height="30">身份证：</td>
		<td><input type="text" name="member_card" size="20" value="<?php echo htmlspecialchars($this->_var['member']['card']); ?>" class="input"/></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_sex']; ?></td>
		<td>
		<label><input type="radio" name="member_sex" value="0" <?php if ($this->_var['member']['sex'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_member_sex_1']; ?></label>
		<label><input type="radio" name="member_sex" value="1" <?php if ($this->_var['member']['sex'] == 1): ?>checked<?php endif; ?>/> <?php echo $this->_var['language']['form_member_sex_2']; ?></label>
		</td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_birthday']; ?></td>
		<td><input type="text" name="member_birthday" readonly  bj="cBj" id="member_birthday" size="20" value="<?php echo $this->_var['member']['birthday']; ?>" class="input"/></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_phone']; ?></td>
		<td><input type="text" name="member_phone" size="20" value="<?php echo htmlspecialchars($this->_var['member']['phone']); ?>" class="input"/></td>
		</tr>


		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_photo']; ?></td>
		<td><input type="file" name="member_photo" size="20" class="input"/>	
		<?php if ($this->_var['member']['photo']): ?>
		<a href="uploads/<?php echo $this->_var['member']['photo']; ?>" target="_blank"><img src="uploads/<?php echo $this->_var['member']['photo']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
		<label><input type="checkbox" name="member_photo_delete" value="<?php echo $this->_var['member']['photo']; ?>" /> <?php echo $this->_var['language']['delete']; ?></label>
		<input type="hidden" name="member_photo_old" value="<?php echo $this->_var['member']['photo']; ?>"/>
		<?php endif; ?>
		</td>
		</tr>


		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_from']; ?></td>
		<td><input type="text" name="member_from" size="40" value="<?php echo htmlspecialchars($this->_var['member']['from']); ?>" class="input"/></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_other']; ?></td>
		<td><textarea name="member_other" cols="60" rows="5" class="input"><?php echo htmlspecialchars($this->_var['member']['other']); ?></textarea></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_validation']; ?></td>
		<td>
		<label><input type="radio" name="member_validation" value="1" <?php if ($this->_var['member']['validation'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_member_validation_1']; ?></label>
		<label><input type="radio" name="member_validation" value="0" <?php if ($this->_var['member']['validation'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_member_validation_0']; ?></label>
		</td>
		</tr>
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_state']; ?></td>
		<td>
		<label><input type="radio" name="member_state" value="1" <?php if ($this->_var['member']['state'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_member_state_1']; ?></label>
		<label><input type="radio" name="member_state" value="0" <?php if ($this->_var['member']['state'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_member_state_0']; ?></label>
		</td>
		</tr>	
<?php if ($this->_var['mode'] == 'update'): ?>
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_join_time']; ?></td>
		<td><?php echo $this->_var['member']['join_time']; ?></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_last_time']; ?></td>
		<td><?php echo $this->_var['member']['last_time']; ?></td>
		</tr>

		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_member_last_ip']; ?></td>
		<td><?php echo $this->_var['member']['last_ip']; ?></td>
		</tr>
<?php endif; ?>
		<tr>
		<td align="right" height="30">&nbsp;</td>
		<td>
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>
		</td>
		</tr>
		<input type="hidden" name="member_id" value="<?php echo $this->_var['member']['id']; ?>"/>
	</form>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>