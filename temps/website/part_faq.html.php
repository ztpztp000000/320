<h3><strong class="fl pngfix">常见问题</strong> <a title="更多" href="news.php?id=2" class="fr">更多&gt;&gt;</a></h3>
<DIV class=margin>
<ul class="list">
<?php $_from = $this->_var['faq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'faq_0_00937600_1356390628');if (count($_from)):
    foreach ($_from AS $this->_var['faq_0_00937600_1356390628']):
?>
<li><a title="<?php echo $this->_var['faq_0_00937600_1356390628']['content_title']; ?>" href="<?php echo $this->_var['faq_0_00937600_1356390628']['url']; ?>"><?php echo $this->_var['faq_0_00937600_1356390628']['content_title']; ?></a> </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</DIV>