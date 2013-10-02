<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/img/reset.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/img/common.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/img/pay.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/top.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/czzx.css" type=text/css rel=stylesheet>
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
		$('#containe').BlocksIt({
			numOfCol: 4,
			offsetX: 8,
			offsetY: 8
		});
	});
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
<script>
<!--
function setTab(name,cursel,n){
 for(i=1;i<=n;i++){
  var menu=document.getElementById(name+i);
  var con=document.getElementById("con_"+name+"_"+i);
  menu.className=i==cursel?"hover":"";
  con.style.display=i==cursel?"block":"none";
 }
}
//-->
</script>
<style type="text/css">
#containe{
	position:relative;
	width:700px;
	padding-bottom: 10px;

	float:left;
}
.grid1{
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
.grid1 strong {
	border-bottom:1px solid #ccc;
	margin:10px 0;
	display:block;
	padding:0 0 5px;
	font-size:17px;
}
.grid1 .meta{
	text-align:right;
	color:#777;
	font-size:12px;
}
.grid1 .imgholder img{
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
<div class="czzx_bg">
<div id="main">
	<img src="templates/kele/image/ooxxsm.png" />	
   		 
		<div class="main_top">
    	<div class="left"></div>
        <div class="bg"><div class="czlogo"></div></div>
        <div class="right"></div>
   		 </div>
         
         
         
        <div id="main_fontbg">
		<ul id="navigation">
		<li><a href="pay0.php">游戏充值</a></li>
		<li><a href="?action=pay_log">充值记录</a></li>
		</ul></div>	
        
        
<div id="container">	
  <div class="content">
  <a name="c1" id="c1"></a>
  <div class="c11">
            
            	<div class="c11_left">
                	<div class="yindao">
                    	<ul>
                        	<li class="chongzhi"></li>
                            <li class="youxi"></li>
                            <li class="tianbiao"></li>
                            <li class="wancheng"></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            
            
                    
				<div class="c11_right">
					<div class="c11_right_top"><img src="templates/kele/image/xuanzecz.png" /></div>
					<div class="c11_right_main1"><b>为了更方便您对游戏的充值，您可以首先充值到平台！</b>
					<p class="ptb"><a href="pay0.php?game_name=平台币充值"><img src="templates/kele/image/ptb.jpg" /></a></div>
                	<div class="c11_right_top"><img src="templates/kele/image/xuanzecz.png" /></div>
                		<div class="c11_right_main">
                        
<div id="containe">
<?php $_from = $this->_var['game_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
	<div class="grid1">	
		<div class="imgholder">
		<a href="pay0.php?app=<?php echo $this->_var['game']['no']; ?>&gid=<?php echo $this->_var['game']['id']; ?>&game_name=<?php echo $this->_var['game']['name']; ?>"><img src="<?php echo $this->_var['game']['logo_list']; ?>"/></a>
		</div><strong><?php echo $this->_var['game']['name']; ?></strong></div><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>						
                    </div>
                </div>            
</div>
</div>
</div>
</div>

</div><?php echo $this->fetch('footer.html'); ?>

