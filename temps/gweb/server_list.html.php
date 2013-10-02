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
	<div class="g_main"><h1 class="logo"><img src="/templates/gweb/image/ooxxsm.png" /></h1><div class="hr30"></div>
		<div class="g_left"><DIV id=uc_box><?php echo $this->fetch('p_login.html'); ?></DIV></div>
        <div class="g_right">
			<?php echo $this->fetch('part_nav.html'); ?>
             
             
             <div class="s_top"><b>服务器列表</b></div>
             <div class="s_list">
             	<ul><li><b>服务器名称</b></li><li>开服日期</li><li>礼包卡</li><li>进入游戏</li></ul></div>
             <div class="dashed"></div>
<?php $_from = $this->_var['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
			<div class="list_server">
            	<ul>
                	<li><b><?php echo $this->_var['server']['name']; ?></b></li>
                    <li><?php echo $this->_var['server']['trunon_date']; ?>日<?php echo $this->_var['server']['trunon_hour']; ?>时</li>
                    <li><a title="领取礼包" href="/card.php?action=card_list&id=<?php echo $this->_var['server']['game_id']; ?>">领取礼包</a></li>
                    <li><a title="进入游戏" href="/game.php?action=play&server_id=<?php echo $this->_var['server']['id']; ?>" target="_blank">进入游戏</a></li>
                </ul>
            </div><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
