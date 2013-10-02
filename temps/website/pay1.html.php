<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_var['config']['site_name']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo htmlspecialchars($this->_var['config']['site_keywords']); ?>" />
<meta name="description" content="<?php echo htmlspecialchars($this->_var['config']['site_description']); ?>" />
<LINK href="/templates/kele/image/reset1.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/czzx.css" type=text/css rel=stylesheet>
<LINK href="/templates/kele/image/banner.css" type=text/css rel=stylesheet>
<!--[if lte IE 6]>
<script src="/templates/kele/img/fixPNG.js"></script>
<script type="text/javascript">
DD_belatedPNG.fix('.pngfix');
</script>
<![endif]--> 
<script type="text/javascript" src="scripts/jquery.js"></script>
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
		<li><a href="#">游戏充值</a></li>
		<li><a href="#c3">充值记录</a></li>
		</ul></div>	
        
        
<div id="container">	
  <div class="content">
  <a name="c1" id="c1"></a>
  <div class="c11">
            
            
            	<div class="c11_left">
                	<div class="yindao">
                    	<ul>
                        	<li class="chongzhi1"></li>
                            <li class="youxi1"></li>
                            <li class="tianbiao"></li>
                            <li class="wancheng"></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            
            
                    
				<div class="c11_right">
                	<div class="c111_right_top"><img src="templates/kele/image/czfs.png" /></div>
                		<div class="c11_right_main">
                        <?php if ($this->_var['game_name'] == '平台币充值'): ?>
						<div class="xz_dangqian">
						<p>
						
						您选择是<strong>《充值平台币》</strong>请选择您的充值方式：
						</p>
						</div>
						<?php else: ?>
						<div class="xz_dangqian">
						<p>
						您选择的游戏是<strong>《<?php echo $this->_var['game_name']; ?>》</strong>，请选择您的充值方式：
						</p>
						</div>
						<?php endif; ?>
                        
                        <div class="xz_content">
                        
                        <?php $_from = $this->_var['paymode_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'paymode');if (count($_from)):
    foreach ($_from AS $this->_var['paymode']):
?>
                        	<?php if ($this->_var['paymode']['id'] != 6 || $this->_var['game_name'] != '平台币充值'): ?>
                        	<div class="yinlian_main">
                            	<div class="yinlian1">
                                	<ul>
                                    	<li class="yinlian_wenzi"><?php echo $this->_var['paymode']['name']; ?></li>
                                        <li class="yinlian_logo"><img src="<?php echo $this->_var['paymode']['logo']; ?>"/></li>
                                    </ul>
                                </div>
                           
                                <div class="yinlian2">
                                	<ul>
                                    	<li class="yinlian_btt">
                                        <a href="pay0.php?mode=<?php echo $this->_var['paymode']['id']; ?>&mn=<?php echo $this->_var['paymode']['name']; ?>&app=<?php echo $this->_var['game_no']; ?>&gid=<?php echo $this->_var['game_id']; ?>&game_name=<?php echo $this->_var['game_name']; ?>&server=<?php echo $this->_var['server_no']; ?>">
                                        <img src="templates/kele/image/ljzc.jpg" /></a></li>
                                        <li class="yinlian2_wenzi"><?php echo $this->_var['paymode']['desc']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                           
                            
                        </div>
                        
                    </div>
                </div>            
</div>
</div>
</div>
</div>
<?php echo $this->fetch('footer.html'); ?>
</div>

