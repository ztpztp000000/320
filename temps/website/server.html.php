<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/game.css" type=text/css rel=stylesheet>
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
             
            
<div class="ser_list clearfix">
     <div class="recommend_list">
     <p><strong><span id="lblGameTitle"><?php echo $this->_var['game_name']; ?></span>服务器列表</strong></p>
      </div>
      <div class="ser_list_div">
      <ul>
<?php $_from = $this->_var['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
<li class="state_0<?php echo $this->_var['server']['state']; ?>"><a href="game.php?action=play&game_id=<?php echo $this->_var['server']['game_id']; ?>&server_id=<?php echo $this->_var['server']['id']; ?>" target="_blank"><?php echo $this->_var['server']['name']; ?></a> <em>状态</em> </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </ul>
              </div>
          </div>
    </DIV>

        <div class="game_right"><DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV>
      </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</div> 




<SCRIPT LANGUAGE="JavaScript">
var e_planid=923
</SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="http://www.ugooo.cc/effect.js"></SCRIPT>
</body>
</html>
