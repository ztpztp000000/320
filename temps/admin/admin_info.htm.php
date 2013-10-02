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
			
			<div id="title"><h1>平台管理</h1></div>
			
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
					<li class="current"><a HREF="?sort=game_flat">管理平台</a></li>
					<li><a HREF="?sort=websites">管理官网</a></li>
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
			<h1>平台管理 - 权限管理 - 编辑</h1>
		</div>
	</div>
	
  
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=admin"><?php echo $this->_var['language']['admin_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['admin_add']; ?><?php else: ?><?php echo $this->_var['language']['admin_edit']; ?><?php endif; ?>

</div>
<div class='item'>
	<table width="100%">
	<form action="?sort=game_flat&action=admin&do=admin_<?php echo $this->_var['mode']; ?>" method="post" name="admin_info">
		<tr>
		<td align="right" width="80" height="30"><?php echo $this->_var['language']['form_admin_name']; ?></td>
		<td><?php if ($this->_var['mode'] == 'insert'): ?><input type="text" name="admin_name" size="40" value="<?php echo htmlspecialchars($this->_var['admin']['name']); ?>" class="input"/>
		<?php else: ?>
		<input type="hidden" name="admin_name" value="<?php echo htmlspecialchars($this->_var['admin']['name']); ?>" />
		<?php echo htmlspecialchars($this->_var['admin']['name']); ?>
		<?php endif; ?></td>
		</tr>

		<tr>
		<td align="right"  height="30"><?php echo $this->_var['language']['form_admin_password']; ?></td>
		<td><input type="password" name="admin_password" size="40" value="" class="input"/></td>
		</tr>
		<?php if ($_SESSION['admin_name'] != $this->_var['admin']['name']): ?>
		<tr>
		<td align="right"  height="30"><?php echo $this->_var['language']['form_admin_permissions']; ?></td>
		<td>
			<label><input type="radio" name="admin_permissions" onclick="display_permissions(false)" value="all" <?php if ($this->_var['admin']['permissions'] == 'all'): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_admin_permissions_all']; ?></label>
			<label><input type="radio" name="admin_permissions" onclick="display_permissions(true)" id="admin_permissions_normal" value="<?php echo $this->_var['admin']['permissions']; ?>" <?php if ($this->_var['admin']['permissions'] != 'all'): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_admin_permissions_other']; ?></label>

		</td>
		</tr>

		<tr id="permissionss"  <?php if ($this->_var['admin']['permissions'] == 'all'): ?>style="display:none"<?php endif; ?>>
		<td align="right">&nbsp;</td>
		<td>
		<table bgcolor="#cccccc" cellpadding="1" cellspacing="1">
		<tr>
		<td width="80" bgcolor="#f4f4f4" align="center" height="25">&nbsp;</td>
		<td width="70" bgcolor="#ffffff" align="center" ><?php echo $this->_var['language']['form_admin_permissions_read']; ?></td>
		<td width="70" bgcolor="#ffffff" align="center" ><?php echo $this->_var['language']['form_admin_permissions_write']; ?></td>
		<td width="70" bgcolor="#ffffff" align="center" ><?php echo $this->_var['language']['form_admin_permissions_delete']; ?></td>
		</tr>
	

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25"><?php echo $this->_var['language']['form_admin_permissions_1']; ?></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="menu_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="menu_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="menu_delete" onclick="push_permissions(this)"/></td>
		</tr>


		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">新闻频道管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="channel_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="channel_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="channel_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">新闻内容管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="content_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="content_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="content_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">游戏管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="game_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="game_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="game_delete" onclick="push_permissions(this)"/></td>
		</tr>



		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">服务器管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="server_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="server_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="server_delete" onclick="push_permissions(this)"/></td>
		</tr>		

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">充值管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="pay_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="pay_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="pay_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">新手卡管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="card_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="card_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="card_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">会员管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="member_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="member_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="member_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">模板管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="template_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="template_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="template_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">友情链接管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="link_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="link_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="link_delete" onclick="push_permissions(this)"/></td>
		</tr>

		<tr>
		<td bgcolor="#f4f4f4" align="center" height="25">推广分析管理</td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="sp_read" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="sp_write" onclick="push_permissions(this)"/></td>
		<td bgcolor="#ffffff" align="center"><input type="checkbox" value="sp_delete" onclick="push_permissions(this)"/></td>
		</tr>
	
		</table>
		</td>
		</tr>
		<tr>
		<td align="right" height="30"><?php echo $this->_var['language']['form_admin_state']; ?></td>
		<td>
		
		<label><input type="radio" name="admin_state" value="1" <?php if ($this->_var['admin']['state'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_admin_state_1']; ?></label>
		<label><input type="radio" name="admin_state" value="0" <?php if ($this->_var['admin']['state'] == 0): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_admin_state_0']; ?></label>
		</td>
		</tr>
		<?php else: ?>
		<input type="hidden" name="admin_permissions" value="<?php echo $this->_var['admin']['permissions']; ?>" />
		<input type="hidden" name="admin_state" value="<?php echo $this->_var['admin']['state']; ?>" />
		<?php endif; ?>
		<tr>
		<td align="right" height="30">&nbsp;</td>
		<td>
		<input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/>
		</td>
		</tr>
		<input type="hidden" name="admin_id" value="<?php echo $this->_var['admin']['id']; ?>"/>
	</form>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>
<script type="text/javascript">
check_permissions('<?php echo $this->_var['admin']['permissions']; ?>');

function display_permissions(mode){
	if (mode){
		$('#permissionss').show();
	}else{
		$('#permissionss').hide();
	}
}

function push_permissions(obj){
	if (obj.checked){
		var $array=[];
		if ($("#admin_permissions_normal").val()!=""){
			var $admin_permissions_value=$("#admin_permissions_normal").val();
			var $admin_permissions_value_split=$admin_permissions_value.replace(/ /g,"").split(",");	
			if ($admin_permissions_value_split.length>0){
				for (var $i=0;$i<$admin_permissions_value_split.length;$i++){
					$array.push($admin_permissions_value_split[$i]);
				}
			}
		}
		$array.push(obj.value);
		$("#admin_permissions_normal").val($array.join(","));
	}else{
		var $array=[];
		if ($("#admin_permissions_normal").val()!=""){
			var $admin_permissions_value=$("#admin_permissions_normal").val();
			var $admin_permissions_value_split=$admin_permissions_value.replace(/ /g,"").split(",");	
			if ($admin_permissions_value_split.length>0){
				for (var $i=0;$i<$admin_permissions_value_split.length;$i++){
					if (obj.value!=$admin_permissions_value_split[$i]){
						$array.push($admin_permissions_value_split[$i]);
					}
				}
			}
		}
		$("#admin_permissions_normal").val($array.join(","));
	}
}
function check_permissions(permissions){
	var l=permissions.split(",");
	var f=document.forms['admin_info'];
		for (var i=0;i<f.elements.length ;i++ ){
			if (f.elements[i].type=='checkbox'){
				for (var j=0;j<l.length ;j++ ){
					if (f.elements[i].value==l[j]){
						f.elements[i].checked=true;
					}
				}
			}
		}
}
</script>