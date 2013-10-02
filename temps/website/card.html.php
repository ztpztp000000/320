<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/game.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>

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

<div class="mainbg">
	<div class="game_main"><h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
		<div class="game_left">
			<div class="yxlb"></div>
             
    <div class=margin>
		<ul class="g_list3 clearfix">
			<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
			<li>
				<img src="uploads/<?php echo $this->_var['game']['game_logo']; ?>">
				<div class="a6">所使用游戏:<span class="a7"><?php echo $this->_var['game']['game_name']; ?></span></div>
				<div><a href="card.php?action=card_list&id=<?php echo $this->_var['game']['game_id']; ?>&name=<?php echo $this->_var['game']['game_name']; ?>"><img src="templates/kele/img/cd_btn.gif" border="0" /></a></div>
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
    </div>
    </div>
    <div class="game_right">
    	<DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV>
    </div>
  </div><?php echo $this->fetch('footer.html'); ?>
</div>
</body></html>