
<?php if ($this->_var['links']): ?>
<div class="box friendlink">
    <h3>
        <strong class="fl"><font color="#000000">&nbsp;&nbsp;&nbsp;&nbsp;友情链接</font></strong>
    </h3>
    <div class="margin">
        <ul class="clearfix">
            <li>
			<?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link');if (count($_from)):
    foreach ($_from AS $this->_var['link']):
?>
			<a href="<?php echo $this->_var['link']['url']; ?>" target="_blank" title="<?php echo $this->_var['link']['text']; ?>"><font color="#000000"><?php echo $this->_var['link']['name']; ?></font></a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</li>
        </ul>
    </div>
</div>
<?php endif; ?>
