<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="UTF-8">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?php echo $this->_var['language']['title']; ?></title>
</head>
<body>
<div style="font:normal 12px 'Microsoft Yahei','Tahoma'"><?php echo $this->_var['message']['text']; ?></div>
<script type="text/javascript">
<?php if ($this->_var['message']['link'] == ''): ?>
window.setTimeout(function(){history.go(-1)},1000);
<?php else: ?>
window.setTimeout(function(){location.href='<?php echo $this->_var['message']['link']; ?>';},1000);
<?php endif; ?>
</script>
</body>
</html>
