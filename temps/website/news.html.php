<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/img/reset.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/img/common.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/img/news.css" type=text/css rel=stylesheet>
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
 
<DIV class="mainContent clearfix">
  <div class="left box newlist">
     <h3><strong class="fl icon_07"><?php echo $this->_var['channel_info']['name']; ?></strong></h3>
    <DIV class=margin>
<ul class="news_list">
<?php $_from = $this->_var['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'content');if (count($_from)):
    foreach ($_from AS $this->_var['content']):
?>
<li><span class="category"></span><a href="<?php echo $this->_var['content']['url']; ?>" <?php if ($this->_var['content']['target']): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['content']['title']; ?></a> <span class="date"><?php echo $this->_var['content']['time']; ?></span></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
<div align="right"><?php echo $this->_var['pagebar']; ?></div>
    </DIV>
  </DIV>
  <DIV class=sidebar>
    <DIV class="" id=uc_box>
      <?php echo $this->fetch('part_login.html'); ?>
    </DIV>
    <DIV class="box latest_news">
      <?php echo $this->fetch('part_faq.html'); ?>
    </DIV>
    <DIV class="box cs">
      <DIV class=margin>
      	<?php echo $this->fetch('part_service.html'); ?>
      </DIV>
    </DIV>
  </DIV>
</DIV>

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>
