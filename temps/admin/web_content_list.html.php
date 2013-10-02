<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/templates/new_admin/img/js/jquery.js"></script>
<script type="text/javascript" src="/templates/new_admin/img/js/quxian.js"></script>
<script type="text/javascript" SRC="js/swfobject.js"></script>
</head>
<body>
	<div id="top">
		<div class="wrapper">
			
			<div id="title"><h1>管理官网</h1></div>
			
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
					<li><a HREF="?sort=websites">管理平台</a></li>
					<li class="current"><a HREF="?sort=websites">管理官网</a></li>
					<li><a HREF="?sort=user">用户列表</a></li>	
					<li><a HREF="?sort=pay">充值记录</a></li>
                    <li><a HREF="?sort=graphs">图表</a></li>	
				</ul>
			</nav>
			
			
			
		</div>
	</div>
	
</div>

	<div id="pagetitle">
		<div class="wrapper">
			<h1>管理官网 - 数据列表</h1>
		</div>
	</div>
	
  
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=websites&action=content&do=content_add&channel_id=<?php echo $_REQUEST['channel_id']; ?>"><?php echo $this->_var['language']['content_add']; ?></a>
&raquo;&nbsp;<?php echo $this->_var['channel_name']; ?></div>
<?php if ($this->_var['content_list']): ?>

<table cellspacing="0" cellpadding="0" width="100%">
	<form action="?sort=websites&action=content&do=content_delete" method="post" name="content_list">
	<input type="hidden" name="channel_id" value="<?php echo $_REQUEST['channel_id']; ?>" />
	<?php $_from = $this->_var['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'content');if (count($_from)):
    foreach ($_from AS $this->_var['content']):
?>
	<tr>
	<td height="30" width="5%" align="center" nowrap="nowrap"><input type="checkbox" name="content_id[]" value="<?php echo $this->_var['content']['id']; ?>" /></td>
	<td width="80%">
	<?php if ($this->_var['content']['category_name']): ?>
		[<a href="?sort=websites&action=content&do=content_list&channel_id=<?php echo $this->_var['content']['channel_id']; ?>&content_id=<?php echo $this->_var['content']['id']; ?>&category_id=<?php echo $this->_var['content']['category_id']; ?>" style="font-weight:bold;color:green"><?php echo $this->_var['content']['category_name']; ?></a>]
	<?php endif; ?>
	<a href="?sort=websites&action=content&do=content_edit&channel_id=<?php echo $this->_var['content']['channel_id']; ?>&content_id=<?php echo $this->_var['content']['id']; ?>"><?php echo $this->_var['content']['title']; ?></a>
	<?php if ($this->_var['content']['thumb']): ?>
		<a href="/uploads/<?php echo $this->_var['content']['thumb']; ?>" target="_blank"><img src="<?php if ($this->_var['content']['thumb_http']): ?><?php echo $this->_var['content']['thumb']; ?><?php else: ?>uploads/<?php echo $this->_var['content']['thumb']; ?><?php endif; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
	<?php endif; ?>
	<?php if ($this->_var['content']['password']): ?>
	<img src="images/lock.gif" alt="<?php echo $this->_var['content']['password']; ?>" align="absmiddle"/>
	<?php endif; ?>
	<?php if ($this->_var['content']['comment_count']): ?>
	(<a href="?sort=websites&action=content&do=comment_list&content_id=<?php echo $this->_var['content']['id']; ?>"><?php echo $this->_var['content']['comment_count']; ?></a>)
	<?php endif; ?>

	<?php if ($this->_var['content']['is_best']): ?>
	<b style="color:red">[<?php echo $this->_var['language']['best']; ?>]</b>
	<?php endif; ?>
	</td>
	<td  width="15%" align="center" nowrap="nowrap"><?php echo $this->_var['content']['time']; ?></td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="3"></td></tr>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<td><input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/></td>
	</form>

	<tr>
	<td height="30" width="5%" align="center"><input type="checkbox" onclick="batch('content_list',this)"  /></td>
	<td colspan="2" width="95%">
	<table width="100%">
	<tr>
	<td width="100">
	<select onchange="batch_do('content_list',this.options[this.selectedIndex].value)">
	<option><?php echo $this->_var['language']['select']; ?></option>
	<option value="best_yes"><?php echo $this->_var['language']['selected_batch_best_yes']; ?></option>
	<option value="best_no"><?php echo $this->_var['language']['selected_batch_best_no']; ?></option>
	<option value="delete"><?php echo $this->_var['language']['selected_delete_content']; ?></option>
	</select>

	</td>
	<td width="300">
	<form method="get" name="content_search" onsubmit="if(this.elements['keyword'].value==''){this.elements['keyword'].focus();return false;}">

<input type="hidden" name="action" value="content"/>
<input type="hidden" name="do" value="content_list"/>
<input type="hidden" name="channel_id" value="<?php echo $_REQUEST['channel_id']; ?>"/>
<?php if ($_REQUEST['category_id']): ?>
<input type="hidden" name="category_id" value="<?php echo $_REQUEST['category_id']; ?>"/>
<?php endif; ?>
<input type="text" name="keyword" class="input"/>
<input type="submit" value="<?php echo $this->_var['language']['search']; ?>" style="padding:2px 5px"/>
</form>
	
	</td>
	<td align="right"><?php echo $this->_var['pagebar']; ?></td>
	</tr></table>
	</td>
	</tr>
</table>
<?php else: ?>
<div style="line-height:50px;text-align:center;"><?php echo $this->_var['language']['nodata']; ?></div>
<?php endif; ?>
</td>
</tr>
</table>
</body>
</html>