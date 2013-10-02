<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/top.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/new.css" type=text/css rel=stylesheet>
<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]--> 
<script type="text/javascript" src="scripts/jquery.js"></script>
</head>
<body>
<?php echo $this->fetch('header.html'); ?>
   
<div class="contenter">
<DIV class="clearfix" style="margin:0 auto;width:980px;">
 <div class="user_main">
 	<div class="user_top">
    	<h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
    </div>
</div>
  <div class="box newlist">
     <h3><strong style="color:#000000;"><?php echo $this->_var['channel_info']['name']; ?></strong></h3>
    <DIV class=margin>
    	<DIV class=last_content>
			  <H2 style="color:#333333;"><?php echo $this->_var['content_info']['title']; ?></H2>
			  <DIV style="border-top:2px dashed #999;margin-left:20px;width:940px;color:#666666;"><?php echo $this->_var['content_info']['text']; ?></DIV>
			  <hr size="1" style="border:1px dotted #AAA; width:98%;">
			  <div style="padding-left:10px;">
<?php if ($this->_var['prev'] != ''): ?>
<div>上一篇：
<a href="<?php echo $this->_var['prev']['url']; ?>" <?php if ($this->_var['content']['target']): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['prev']['title']; ?></a>
</div>
<?php endif; ?>
<?php if ($this->_var['next'] != ''): ?>
<div>
下一篇：
<a href="<?php echo $this->_var['next']['url']; ?>" <?php if ($this->_var['content']['target']): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['next']['title']; ?></a>
</div>
<?php endif; ?>
			  </div>
			</DIV>
    </DIV>
  </DIV>
</DIV>
<?php echo $this->fetch('footer.html'); ?>
</div>

</body>
</html>
