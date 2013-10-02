<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>官网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK href="/templates/gweb/image/reset.css" type=text/css rel=stylesheet>
<LINK href="/templates/gweb/image/guanwang.css" type=text/css rel=stylesheet>
<LINK href="/templates/gweb/image/server_list.css" type=text/css rel=stylesheet>

<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]-->
<script type="text/javascript" src="/scripts/jquery.js"></script>
<html>
<body>
<?php echo $this->fetch('header.html'); ?>
<div style="background:url(<?php echo $this->_var['website_bk']; ?>) no-repeat;margin:0 auto;width:1420px;">
<div class="mainbg">
	<div class="g_main"><h1 class="logo"><img src="/templates/gweb/image/ooxxsm.png" /></h1><div class="hr30"></div>
		<div class="g_left"><?php echo $this->fetch('left_server_list.html'); ?></div>
        <div class="g_right">
			<?php echo $this->fetch('part_nav.html'); ?>
		<div class="s_top"><b><?php echo $this->_var['title']; ?></b></div>
			<div class="list_cont"><ul>
        	<?php $_from = $this->_var['content_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'content');if (count($_from)):
    foreach ($_from AS $this->_var['content']):
?>
				<li class="margin"><a title="<?php echo $this->_var['content']['content_title']; ?>" href="<?php echo $this->_var['content']['url']; ?>"><?php echo $this->_var['content']['content_title']; ?></a> </li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
			
			</div>
			<div><ul><li style="float:right;padding-right:20px; letter-spacing:10px; font-size:14px;padding-top:10px;"><?php echo $this->_var['pagebar']; ?></li></ul></div>
        </div>
</div>

</div>

</div><?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>


