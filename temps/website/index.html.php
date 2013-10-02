
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/top.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/hot.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/new.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/main.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/hot_ht.css" type=text/css rel=stylesheet>

<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]-->
<script type="text/javascript" src="scripts/jquery.pause.min.js"></script>
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/function.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<script type="text/javascript">
ieGo();
function ieGo(){ 
        var ie = !-[1,];  
        if(ie == true) {
            var ua = navigator.userAgent.toLowerCase();
            var version = parseInt(ua.match(/msie ([\d.]+)/)[1]);
            if(version <= 6) {
                location.href='/templates/kele/ie6.html'; 
            }
        }
}
</script>
</head>
<body class="bground"> 
<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('banner.html'); ?>

<div id="mainhot">
 <div id="lefthot">
     <div id="left_1" class="left_div"><?php echo $this->fetch('hot.html'); ?></div>
     <div id="left_2" class="left_div">
		<div class=game_bbs>
			<div class=tit>
				<div class="newh4"><font color="#990000">火热开服</font> 
                </div>
			</div>
    <div class="new_game_btn">
<a class="btn_green" title="进入游戏" href="game.php?action=server_list&game_id=<?php echo $this->_var['game']['game_id']; ?>"></a>
</div>

<?php $_from = $this->_var['server_new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
<div class="zxkf_div fl">
<div><img class="fl" src="<?php echo $this->_var['server']['logo']; ?>"></div>
<div class="new_game_nr">
	<div class="time_font"><?php echo $this->_var['server']['trunon_date']; ?></div>
    <div class="mew_game_btn"><a title="进入游戏" href="game.php?action=play&server_id=<?php echo $this->_var['server']['id']; ?>" target="_blank">进入游戏</a>
    </div>
    <div class="mew_game_time"><?php echo $this->_var['server']['trunon_hour']; ?></div>
<div class="fl"><strong class="mew_game_name"><?php echo $this->_var['server']['name']; ?></strong><a title="领取礼包" href="card.php?action=card_list&id=<?php echo $this->_var['server']['game_id']; ?>">领取礼包</a></div>
</div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
</div>

 <div id="righthot">
	<DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV>
 </div>
</div>

<?php echo $this->fetch('cmain.html'); ?>
<DIV class="con clearfix" style="ZOOM: 1">

<?php echo $this->fetch('part_link.html'); ?>
</DIV>
<?php echo $this->fetch('footer.html'); ?>