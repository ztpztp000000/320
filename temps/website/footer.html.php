<div id=foot>
<div class="foot_bar">
<div class="footlogo">
<div class="footfont">健康游戏公告：抵制不良游戏，拒绝盗版游戏。注意自我保护，预防受骗上当。适度游戏益脑，沉迷游戏伤身。合理安排时间，享受健康生活</div>
</div>
</div>
<div id="foot_main">

	<?php if ($this->_var['bottom_menu']): ?>
	<P>
	<?php $_from = $this->_var['bottom_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'menu');$this->_foreach['bottom_menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bottom_menu']['total'] > 0):
    foreach ($_from AS $this->_var['menu']):
        $this->_foreach['bottom_menu']['iteration']++;
?>
 <a href="<?php echo $this->_var['menu']['link']; ?>" <?php if ($this->_var['menu']['target'] == 1): ?>target="_blank"<?php endif; ?>> <font color="#000000"><?php echo $this->_var['menu']['name']; ?></font></a>
  <?php if (! ($this->_foreach['bottom_menu']['iteration'] == $this->_foreach['bottom_menu']['total'])): ?>┊<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </P>
	<?php endif; ?>  
     <P>
 <font color="#000000">  ┊ <?php echo $this->_var['config']['site_icp']; ?></font>
  </P>
</div>
</div>