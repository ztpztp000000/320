<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="css">
.friendlink{margin:12px auto; _margin:10px auto 12px; width:980px;}
.friendlink .margin{background:url("bg_friendlink[1].png") repeat-x 0 0;}
.friendlink ul{margin:0;}
.friendlink li {float:left;}
.friendlink li a{margin:0 8px;-space:nowrap;}
.friendlink li a:hover{#F60;}
</style>

<?php if ($this->_var['link']): ?>
<div class="friendlink">
    <h3>
        <strong><font color="#000000">友情链接</font></strong>
    </h3></div>
    <div class="margin">
        <ul class="clearfix">
            <li>
			<?php $_from = $this->_var['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link_0_55832800_1356579749');if (count($_from)):
    foreach ($_from AS $this->_var['link_0_55832800_1356579749']):
?>
			<a href="<?php echo $this->_var['link_0_55832800_1356579749']['url']; ?>" target="_blank" title="<?php echo $this->_var['link_0_55832800_1356579749']['text']; ?>"><font color="#000000"><?php echo $this->_var['link_0_55832800_1356579749']['name']; ?></font></a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</li>
        </ul>
    </div>
</div>
<?php endif; ?>
