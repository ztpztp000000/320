<ul class="list">
<?php $_from = $this->_var['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'news_0_37808300_1356321373');if (count($_from)):
    foreach ($_from AS $this->_var['news_0_37808300_1356321373']):
?>
<li><a title="<?php echo $this->_var['news_0_37808300_1356321373']['content_title']; ?>" href="<?php echo $this->_var['news_0_37808300_1356321373']['url']; ?>"target="_blank"><img src="templates/kele/image/arrownew.png" /><?php echo $this->_var['news_0_37808300_1356321373']['content_title']; ?></a> </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>