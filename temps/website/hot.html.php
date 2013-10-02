<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<div class=hot>
	<div class=hotmain>

	
	<div class="part0">
    	<ul>
    	<?php $_from = $this->_var['ad_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
        <li class="part1">
	        <a href="<?php echo $this->_var['ad']['link']; ?>" class="partlink" target="_blank"><img src="/uploads/<?php echo $this->_var['ad']['pic_name']; ?>"></a>
	     </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
	</div>
</div>
