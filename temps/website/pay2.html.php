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

<script type="text/javascript">
var money_per = 10;
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
money_per = <?php echo $this->_var['game_per']['money_per']; ?>;
setGold(100);
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
                            <li class="youxi"></li>
                            <li class="tianbiao2"></li>
                            <li class="wancheng"></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            
            
           <div class="c11_right">
             <div class="c111_right_top"><img src="templates/kele/image/czfs.png" /></div>
                <div class="c11_right_main">
                <form action="?action=pay_ok" method="post" <?php if ($this->_var['pay_mode'] != 6): ?>target="_blank"<?php endif; ?> enctype="multipart/form-data"> 
                  <div class="xz_dangqian"><p>您选择的游戏是：<strong>《<?php echo $this->_var['game_name']; ?>》</strong>，您选择的充值方式是：<strong>《<?php echo $this->_var['paymode_name']; ?>》</strong>
                  </p></div>
                  <div class="biaoge_content">
                  	<div class="biaoge_sm"></div>
                    <div class="biaoge_wenzi">请选择您要充值的账号</div>
                
					<div class="biaoge_shuru">
                      <p>
                            <label for=""> 充值帐号：</label>
                            <input type="text" class="i" id="game_user" name="game_user" value="<?php echo $this->_var['login']['username']; ?>" onblur="check_user()">
                            <span id="sp_user"></span>
                        </p>
                        <p>
                            <label for=""> 确认帐号：</label>
                            <input type="text" class="i" id="game_user_verify" name="game_user_verify" value="<?php echo $this->_var['login']['username']; ?>" onblur="check_user2()">
                            <span id="sp_user2"></span>
                        </p>
                        <p>
                            <label for="">
                                手机号码：</label>
                            <input type="text" class="i" id="tel_pt" name="tel_pt">
                        </p>
                        <?php if ($this->_var['to_vc'] == 0): ?>
                        <p>
                            选服务器： 
                            <select name="server_id">
                            	<option value="0">请选择服务器</option>
								<?php $_from = $this->_var['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
								<option value="<?php echo $this->_var['server']['id']; ?>" <?php if ($this->_var['server_no'] == $this->_var['server']['no']): ?>selected<?php endif; ?>><?php echo $this->_var['server']['name']; ?></option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select>
                        </p>
                        <?php endif; ?>
                    </div>
					<div class="biaoge_wenzi">请选择您的充值金额</div>
                    <div class=""></div>
                    <ul><li class="select_mm">
                     <label for="">
                                选择充值金额：</label>
                            <select id="money" name="money" onchange="setGold(this.options[selectedIndex].value)">
								<option value="1">1</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
								<option value="100" selected="selected">100</option>
								<option value="150">150</option>
								<option value="200">200</option>
								<option value="250">250</option>
								<option value="300">300</option>
								<option value="500">500</option>
								<option value="800">800</option>
								<option value="1000">1000</option>
								<option value="1500">1500</option>
								<option value="2000">2000</option>
								<option value="3000">3000</option>
								<option value="5000">5000</option>
								<option value="10000">10000</option>
							</select>
                            元（人民币
                    </li>
                    <li class="select_get"><label for="">您将获得：</label>
                    	<span id="gold_cnt">1000</span> <?php echo $this->_var['game_per']['money_name']; ?>
                    </li>
                    </ul> 
                  </div>
                  <input type="hidden" name="pay_mode" value="<?php echo $this->_var['pay_mode']; ?>">
                  <input type="hidden" name="game_id" value="<?php echo $this->_var['game_id']; ?>">
                  <input type="submit"  class="queren_btt" id="btnPay" value="确认充值" >
                 </form>
                </div>
          </div>
		
</div>
</div>
</div>
</div>

<script type="text/javascript">
function setGold(money)
{
	gold = money * money_per;
	$("#gold_cnt").html(gold);
}
</script>

<?php echo $this->fetch('footer.html'); ?>
</div>

