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
		<div class="recommend_list">
		  <p><strong><span id="lblGameTitle"><?php echo $this->_var['game_name']; ?></span>新手礼包</strong></p>
		</div>
		<?php if ($this->_var['card_list']): ?>
		<div class="xsk_content">
			<h2>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center">服务器名称</td>
                <td width="30%" align="center">限制</td>
                <td width="35%" align="center">领取礼包</td>
              </tr>
            </table>
			</h2>
			<ul>
				<?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
				<li>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td align="center"><?php echo $this->_var['card']['name']; ?></td>
						<td width="30%" align="center">无限制</td>
						<td width="35%" align="center">
						<?php if ($this->_var['card']['link'] != ''): ?>
							<a href="<?php echo $this->_var['card']['link']; ?>" target="_blank">我要领取</a>
						<?php else: ?>
							<?php if ($this->_var['card']['free'] == 0): ?>
							发放结束
							<?php else: ?>
							<a href="card.php?action=get_card&id=<?php echo $this->_var['card']['id']; ?>&gid=<?php echo $this->_var['game_id']; ?>&free=<?php echo $this->_var['card']['free']; ?>"><img src="templates/kele/img/cd_btn2.gif" border="0" /></a>
							<?php endif; ?>
						<?php endif; ?>
						</td>
					  </tr>
				  </table>
				</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</ul>
	  </div>
	  <?php endif; ?>
    </div>
  </div>
        <div class="game_right"><DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV></div></div><?php echo $this->fetch('footer.html'); ?></div>

</body>
</html>
