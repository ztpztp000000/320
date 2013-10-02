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
<script src="/templates/kele/js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="/templates/kele/js/html5.js"></script>
<![endif]-->
<script src="/templates/kele/js/blocksit.min.js"></script>
<script>
$(document).ready(function() {
	//vendor script
	$('#header')
	.css({'top':-50})
	.delay(1000)
	.animate({'top': 0}, 800);
	
	$('#footer')
	.css({'bottom':-15})
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 4,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 700;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 700) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 700) {
			conWidth = 980;
			col = 4;
		} else {
			conWidth = 700;
			col = 4;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<style type="text/css">
#container{
	position:relative;
	width:700px;
	padding-bottom: 10px;
	margin-left: 12px;
	float:left;
}
.grid{
	width:188px;
	min-height:100px;
	padding: 15px;
	background:#fff;
	margin:8px;
	font-size:12px;
	float:left;
	border:1px solid #ccc;
	box-shadow: 0 1px 3px rgba(34,25,25,0.4);
	-moz-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
	-webkit-box-shadow: 0 1px 3px rgba(34,25,25,0.4);
	-webkit-transition: top 1s ease, left 1s ease;
	-moz-transition: top 1s ease, left 1s ease;
	-o-transition: top 1s ease, left 1s ease;
	-ms-transition: top 1s ease, left 1s ease;
}
.grid strong {
	border-bottom:1px solid #ccc;
	margin:10px 0;
	display:block;
	padding:0 0 5px;
	font-size:17px;
}
.grid .meta{
	text-align:right;
	color:#777;
	font-size:12px;
}
.grid .imgholder img{
	max-width:100%;
	background:#ccc;
	display:block;
}
.ahref{}
.ahref a{color:#000; text-decoration:none;}
.ahref a:hover{color:#33FFFF;}
</style>
</head>
<body>
<?php echo $this->fetch('header.html'); ?>
<div class="mainbg">
	<div class="game_main"><h1 class="logo"><img src="templates/kele/image/ooxxsm.png" /></h1>
		<div class="game_left">
			<div class="yxlb"></div>

<div id="container">
<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
	<div class="grid">	
		<div class="imgholder">
			<img src=<?php echo $this->_var['game']['logo_list']; ?> />
		</div>
		<strong><?php echo $this->_var['game']['name']; ?></strong>
		<div class="ahref"><a href="game.php?action=server_list&game_id=<?php echo $this->_var['game']['id']; ?>">进入游戏 |</a>
                <a href="/<?php echo $this->_var['game']['no']; ?>" target="_blank">官网 |</a>
                <a href="card.php?game_id=<?php echo $this->_var['game']['id']; ?>"> 礼包</a></div>
	</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
                        
			</div>
        <div class="game_right"><DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV>
      </div>
</div><?php echo $this->fetch('footer.html'); ?>
</div>

</body>

</html>
