<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>
<body>
<?php echo $this->fetch('top.htm'); ?>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="150" valign="top"><?php echo $this->fetch('left.htm'); ?></td>
<td valign="top">
<div class='title'>
<a href="?action=start&do=log_clear" onclick="return confirm('<?php echo $this->_var['language']['log_clear_confirm']; ?>')"><?php echo $this->_var['language']['log_clear']; ?></a>
&raquo;&nbsp;<?php echo $this->_var['language']['log_list']; ?></div>
<div class='item'>
	<table cellspacing="0" cellpadding="0" width="100%">
	<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');if (count($_from)):
    foreach ($_from AS $this->_var['log']):
?>
	<tr>
	<td title="<?php echo $this->_var['log']['agent']; ?>">[<b><?php echo $this->_var['log']['admin']; ?></b>]&nbsp;<?php echo $this->_var['log']['info']; ?></td>
	<td height="26" width="300" ><?php echo $this->_var['log']['address']; ?>(<?php echo $this->_var['log']['ip']; ?>)</td>
	<td height="26" width="150" align="center"><?php echo $this->_var['log']['time']; ?></td>
	</tr>
	<tr><td height="1" bgcolor="#eeeeee" colspan="4"></td></tr>
	<?php endforeach; else: ?>
	<tr><td height="50" colspan="4" align="center"><?php echo $this->_var['language']['nodata']; ?></td></tr>
	<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php if ($this->_var['pagebar']): ?>
	<tr><td height="26"  colspan="4" align="right"><?php echo $this->_var['pagebar']; ?></td></tr>
	<?php endif; ?>
	</table>
</div>
</td>
</tr>
</table>
</body>
</html>