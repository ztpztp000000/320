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
<script type="text/javascript" src="/scripts/jquery.js"></script>
<html>
<body>
<?php echo $this->fetch('header.html'); ?>
<div style="background:url(<?php echo $this->_var['website_bk']; ?>) no-repeat;margin:0 auto;width:1420px;">
<div class="mainbg">
	<div class="g_main">
    <h1 class="logo"><img src="/templates/gweb/image/ooxxsm.png" /></h1><div class="hr30"></div>
		<div class="g_left"><DIV id=uc_box><?php echo $this->fetch('part_login.html'); ?></DIV><?php echo $this->fetch('left_server_list.html'); ?></div>
        <div class="g_right">
        	<?php echo $this->fetch('part_nav.html'); ?>
            
             <div class="in_game">
             	<ul>
                	<li style="width:340px;height:145px;background:url(<?php echo $this->_var['website_logo']; ?>);float:left;"></li>
                    </ul></div>
             <div class="xinwen">
             	<ul>
                <li class="xw_top"></li>
                <li> 
                	<div class="xw_content">
                    <ul>
                		<?php $_from = $this->_var['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'new');if (count($_from)):
    foreach ($_from AS $this->_var['new']):
?>
						<li><a title="<?php echo $this->_var['new']['content_title']; ?>" href="<?php echo $this->_var['new']['url']; ?>"><?php echo $this->_var['new']['content_title']; ?></a> </li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     </ul>
                    </div>
                </li>
                </ul>
             </div>
             
 		<div class="hd">
        <ul>
        <li class="hd_top"></li>
        <li>
        <div class="hd_content">
                    <ul>
                		<?php $_from = $this->_var['hot_action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'action');if (count($_from)):
    foreach ($_from AS $this->_var['action']):
?>
						<li><a title="<?php echo $this->_var['action']['content_title']; ?>" href="<?php echo $this->_var['action']['url']; ?>"><img src="/templates/gweb/image/i_new.gif" /><?php echo $this->_var['action']['content_title']; ?></a> </li>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     </ul>
                    </div>       
        </li>
        </ul></div>
        
        <div class="hot_content">
        	
            	<ul>
            	<li><a href="<?php echo $this->_var['game_info']['activity_url_1']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game_info']['activity_pic_1']; ?>"/></a></li>
            	<li><a href="<?php echo $this->_var['game_info']['activity_url_2']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game_info']['activity_pic_2']; ?>"/></a></li>
            	<li><a href="<?php echo $this->_var['game_info']['activity_url_3']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game_info']['activity_pic_3']; ?>"/></a></li>
            	<li><a href="<?php echo $this->_var['game_info']['activity_url_4']; ?>" target="_blank"><img src="/uploads/<?php echo $this->_var['game_info']['activity_pic_4']; ?>"/></a></li>
            	</ul>
        </div>
        
        
        <div class="new_hand"><ul>
        	<li class="bbg"><b>游戏资料</b></li>
        	<?php $_from = $this->_var['game_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'content');if (count($_from)):
    foreach ($_from AS $this->_var['content']):
?>
			<li class="margin"><a title="<?php echo $this->_var['content']['content_title']; ?>" href="<?php echo $this->_var['content']['url']; ?>">
            <?php echo $this->_var['content']['content_title']; ?></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul></div>
        
        <div class="yxgl"><ul>
        	<li class="bbg"><b>游戏攻略</b></li>
            <?php $_from = $this->_var['game_tactic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'content');if (count($_from)):
    foreach ($_from AS $this->_var['content']):
?>
			<li class="margin"><a title="<?php echo $this->_var['content']['content_title']; ?>" href="<?php echo $this->_var['content']['url']; ?>"><img src="/templates/gweb/image/i_new.gif" /><?php echo $this->_var['content']['content_title']; ?></a> </li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul></div>
        
        <div class="yxjs">
       					<ul><li class="bbg"><b>游戏介绍</b></li>
                        	<li class="margin"><?php echo $this->_var['game_info']['depict']; ?></li></ul>
       				</div>
        <div class="wjxd"><ul>
        					<li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_1']; ?>"/></li>
                            <li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_2']; ?>"/></li>
                            <li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_3']; ?>"/></li>
                            <li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_4']; ?>"/></li>
                            <li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_5']; ?>"/></li>
                            <li><img src="/uploads/<?php echo $this->_var['game_info']['cature_pic_6']; ?>"/></li>
                      </ul></div>
        <div class="yxjt"><ul>
       	   <li class="bbg"><b>玩家心得</b></li>
        	<?php $_from = $this->_var['player_exp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'exp');if (count($_from)):
    foreach ($_from AS $this->_var['exp']):
?>
				<li class="margin"><a title="<?php echo $this->_var['exp']['content_title']; ?>" href="<?php echo $this->_var['exp']['url']; ?>"><img src="/templates/gweb/image/i_new.gif" /><?php echo $this->_var['exp']['content_title']; ?></a> </li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul></div>
        </div>
  <table height="10"><tr><td></td></tr></table>      
<div><?php echo $this->fetch('part_link.html'); ?></div>
</div>
</div>
<table height="100"><tr><td></td></tr></table>
<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>


