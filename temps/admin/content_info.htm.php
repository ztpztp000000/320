<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<LINK href="/templates/new_admin/img/main.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="/scripts/jquery.js"></script>
<script type="text/javascript" src="/scripts/jquery.editor.js"></script>
<script type="text/javascript">

var e;
$(function(){
	e=$('#content_text').xheditor({
		upImgUrl:"?action=upload",
		upImgExt:"jpg,gif,png",
		onUpload:function(msg){
			msg=msg.toString().replace('/uploads/','');
			$("#attachment_list").val($("#attachment_list").val()+msg+",");
		},
		shortcuts:{
			'ctrl+enter':function(){
				$('#content_info').submit();
			}
		}	
	});
});

function editor_insert(html){
	e.pasteHTML(html);
}
function editor_insert_attachment(filename){
	var ext=filename.split(".")[1];
	if(ext=='gif'||ext=='jpg'||ext=='png'||ext=='bmp'){
		editor_insert('<img src="/uploads/'+filename+'" alt=""/>');
	}else{
		editor_insert('<a href="/uploads/'+filename+'">'+filename+'</a>');
	}
}
function addlink(obj){
	document.getElementById('content_link').innerHTML+="<div style=\"padding:4px 0\"'><input type=\"text\" class=\"input\" name=\"content_link[]\" size=\"110\"/>&nbsp;<a href=\"javascript:;\" onclick=\"removelink(this)\">[-]</a></div>";
}
function removelink(obj){
var parent=obj.parentNode;
	parent.innerHTML='';
	parent.parentNode.removeChild(parent);
}
var attachmentnum=1;
function addattachment(obj){
  if(attachmentnum>=10)return;
document.getElementById('content_attachment').innerHTML+="<div style=\"padding:4px 0\"'><input type=\"file\" class=\"input\" name=\"content_attachment[]\" />&nbsp;<a href=\"javascript:;\" onclick=\"removeattachment(this)\">[-]</a></div>";
  attachmentnum++;
}
function removeattachment(obj){
var parent=obj.parentNode;
	parent.innerHTML='';
	parent.parentNode.removeChild(parent);
  attachmentnum--;
}
 
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
			<h1>平台管理 - 添加频道 - 编辑</h1>
		</div>
	</div>
	
  
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<tr>
<td valign="top">
<div class='title'>
<a href="?sort=game_flat&action=news&do=content_list&channel_id=<?php echo $this->_var['content']['channel_id']; ?>"><?php echo $this->_var['language']['content_list']; ?></a>
&raquo;&nbsp;<?php if ($this->_var['mode'] == 'insert'): ?><?php echo $this->_var['language']['content_add']; ?><?php else: ?><?php echo $this->_var['language']['content_edit']; ?><?php endif; ?>
</div>
<div class='item'>
<form action="?sort=game_flat&action=news&do=content_<?php echo $this->_var['mode']; ?>" method="post" enctype="multipart/form-data" name="content_info">
<input name="attachment_list" id="attachment_list" type="hidden" value=""/>
<table width="100%">
<?php if ($this->_var['category_list'] != ''): ?>
	<tr>
		<td width="100" height="30" align="right"><?php echo $this->_var['language']['form_content_category']; ?></td>
		<td>
			<select name="category_id">
		<option value="0"><?php echo $this->_var['language']['select']; ?></option><?php echo $this->_var['category_list']; ?>
		</select>
</td>
		</tr>
<?php endif; ?>
		<tr>
		<td width="100" height="30" align="right"><?php echo $this->_var['language']['form_content_title']; ?></td>
		<td><input type="text" name="content_title" style="width:734px; border:1px solid #6CF;background:#D1EBF1;" value="<?php echo htmlspecialchars($this->_var['content']['title']); ?>" class="input"/></td>
		</tr>

		<tr>
		<td valign="top" align="right"><?php echo $this->_var['language']['form_content_text']; ?></td>
		<td><textarea name="content_text" id="content_text" style="width:740px;height:400px;border:1px solid #6CF;background:#D1EBF1;"><?php echo htmlspecialchars($this->_var['content']['text']); ?></textarea>
		<?php echo $this->_var['language']['form_content_text_tip']; ?>
		</td>
		</tr>


		<tr>
		<td width="100" height="30" align="right"><?php echo $this->_var['language']['form_content_url']; ?></td>
		<td><input type="text" name="content_url" size="80" value="<?php echo htmlspecialchars($this->_var['content']['url']); ?>" class="input"/>
		(<?php echo $this->_var['language']['form_content_url_text']; ?>)
		</td>
		</tr>

<!--
		<tr>
		<td height="30" align="right"><?php echo $this->_var['language']['form_content_thumb']; ?></td>
		<td><input type="file" name="content_thumb" class="input"/>
		<?php if (! $this->_var['content']['thumb_http']): ?>
		<?php if ($this->_var['content']['thumb']): ?>
		<a href="/uploads/<?php echo $this->_var['content']['thumb']; ?>" target="_blank"><img src="//uploads/<?php echo $this->_var['content']['thumb']; ?>" alt="" align="absmiddle" style="width:20px;height:20px;border:1px solid #ccc;padding:1px"/></a>
		<label><input type="checkbox" name="content_thumb_delete" value="<?php echo $this->_var['content']['thumb']; ?>" /> <?php echo $this->_var['language']['delete']; ?></label>
		<input type="hidden" name="content_thumb_old" value="<?php echo $this->_var['content']['thumb']; ?>"/>
		<?php endif; ?>
		<?php endif; ?>
		</td>
		</tr>

		<tr>
		<td height="30">&nbsp;</td>
		<td>
		<input type="text" name="content_thumb_http" size="110" value="<?php echo $this->_var['content']['thumb_http']; ?>" class="input"/>
		</td>
		</tr>


		<tr>
		<td height="30" valign="top" align="right"><?php echo $this->_var['language']['form_content_attachment']; ?></td>
		<td>
				<?php $_from = $this->_var['content']['attachment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attachment');if (count($_from)):
    foreach ($_from AS $this->_var['attachment']):
?>
			<div style="padding:4px 0"><input type="checkbox" name="content_attachment_delete[]" value="<?php echo $this->_var['attachment']['id']; ?>" />&nbsp;<a href="/uploads/<?php echo $this->_var['attachment']['name']; ?>" target="_blank"><?php echo $this->_var['attachment']['name']; ?></a>&nbsp<a href="javascript:;" onclick="editor_insert_attachment('<?php echo $this->_var['attachment']['name']; ?>');">[+]</a></div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<input type="file" name="content_attachment[]" class="input"/>&nbsp;<a href="javascript:;" onclick="addattachment(this)">[+]</a>
			<div id="content_attachment"></div>
		</td>
		</tr>


		<tr>
		<td width="100" height="30" valign="top" align="right"><?php echo $this->_var['language']['form_content_link']; ?></td>
		<td>
		<input type="hidden" name="content_link_count" value="<?php $_from = $this->_var['content']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');$this->_foreach['content_link_count'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['content_link_count']['total'] > 0):
    foreach ($_from AS $this->_var['link']):
        $this->_foreach['content_link_count']['iteration']++;
?><?php echo $this->_var['link']['id']; ?><?php if (! ($this->_foreach['content_link_count']['iteration'] == $this->_foreach['content_link_count']['total'])): ?>,<?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>" />
			<?php $_from = $this->_var['content']['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
			<div style="padding:4px 0">
				<input type="text" name="content_link_<?php echo $this->_var['link']['id']; ?>" value="<?php echo $this->_var['link']['url']; ?>" class="input" size="110" />
				<label>
				<input type="checkbox" name="content_link_delete[]" value="<?php echo $this->_var['link']['id']; ?>" />
				<?php echo $this->_var['language']['delete']; ?>
				</label>
				</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<input type="text" name="content_link[]" size="110" class="input"/>&nbsp;<a href="javascript:;" onclick="addlink(this)">[+]</a>
			<div id="content_link"></div>
		</td>
		</tr>
		<tr>
		<td width="100" height="30" align="right"><?php echo $this->_var['language']['form_content_keywords']; ?></td>
		<td><input type="text" name="content_keywords" size="40" value="<?php echo htmlspecialchars($this->_var['content']['keywords']); ?>" class="input"/></td>
		</tr>
		<tr>
		<td width="100" height="30" align="right"><?php echo $this->_var['language']['form_content_description']; ?></td>
		<td><textarea name="content_description" class="input" rows="4" cols="80"><?php echo htmlspecialchars($this->_var['content']['description']); ?></textarea></td>
		</tr>
		<tr>
		<td height="30" align="right"><?php echo $this->_var['language']['form_content_password']; ?></td>
		<td><input type="text" name="content_password" size="40" value="<?php echo $this->_var['content']['password']; ?>" class="input"/></td>
		</tr>
-->

		<tr>
		<td height="30" align="right"><?php echo $this->_var['language']['form_content_attribute']; ?></td>
		<td>
<!--
<label><input type="checkbox" name="content_is_best" value="1" <?php if ($this->_var['content']['is_best'] == 1): ?>checked<?php endif; ?> /><?php echo $this->_var['language']['form_content_is_best']; ?></label>
<label><input type="checkbox" name="content_is_comment" value="1" <?php if ($this->_var['content']['is_comment'] == 1): ?>checked<?php endif; ?> /><?php echo $this->_var['language']['form_content_is_comment']; ?></label>
-->
			<label><input type="checkbox" name="content_state" value="1" <?php if ($this->_var['content']['state'] == 1): ?>checked<?php endif; ?> /> <?php echo $this->_var['language']['form_content_is_show']; ?></label>
			<label><input type="checkbox" name="is_show_home" value="1" <?php if ($this->_var['content']['is_show_home'] == 1): ?>checked<?php endif; ?> /> 平台主页显示</label>
		</td>
		</tr>
		
		<input type="hidden" name="content_id" value="<?php echo $this->_var['content']['id']; ?>"/>
		<input type="hidden" name="channel_id" value="<?php echo $this->_var['content']['channel_id']; ?>"/>	
		<tr>
		<td width="100" height="30">&nbsp;</td>
		<td><input type="submit" value="<?php echo $this->_var['language']['submit']; ?>" class="button"/></td>
		</tr>
	</table>
	
</form>
</div>
</td>
</tr>
</table>
</body>
</html>