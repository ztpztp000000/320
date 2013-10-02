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
<script type="text/javascript" src="scripts/jquery.js"></script>
<html>
<body>
<?php echo $this->fetch('header.html'); ?>
 
<div style="background:url(<?php echo $this->_var['website_bk']; ?>) no-repeat;margin:0 auto;width:1420px;">
<div class="mainbg">
<div class="g_main">
<h1 class="logo"><img src="/templates/gweb/image/ooxxsm.png" /></h1><div class="hr30"></div>
<div class="g_left">    <?php echo $this->fetch('left_server_list.html'); ?></div>
<div class="g_right">
        	<?php echo $this->fetch('part_nav.html'); ?>
 <DIV class="mainContent clearfix">
  <div class="left box newlist">
     <h3><strong class="fl icon_07"><?php echo $this->_var['channel_info']['name']; ?></strong></h3>
    <DIV class=margin>
    	<DIV class=last_content>
			  <H2 style="padding:10px;border-bottom:3px solid #999;"><?php echo $this->_var['content_info']['title']; ?></H2>
			  <DIV style="overflow-x:hidden;overflow-y:scroll;height:800px;width:745px;scrollbar-base-color:#282828;scrollbar-dark-shadow-color:#ccc;scrollbar-arrow-color:#fff;"><?php echo $this->_var['content_info']['text']; ?></DIV>
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
  <DIV class=sidebar>

    <DIV class="box latest_news">
      <?php echo $this->fetch('part_faq.html'); ?>
    </DIV>
    <DIV class="box cs">
      <DIV class=margin>
      	<?php echo $this->fetch('part_service.html'); ?>
      </DIV>
    </DIV>
  </DIV>
</DIV      </div>
</div></div></div>
    
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>
