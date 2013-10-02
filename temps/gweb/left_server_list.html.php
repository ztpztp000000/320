<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>官网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<LINK href="/templates/gweb/image/game_new.css" type=text/css rel=stylesheet>
<html>
<body>
<div class="hr10"></div>
<div class="xinfu_list_top"><strong>最新开服信息</strong></div>
<?php $_from = $this->_var['server_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'server');if (count($_from)):
    foreach ($_from AS $this->_var['server']):
?>
<div class="xinfu_content"><ul>
<li><b><?php echo $this->_var['server']['name']; ?></b><b><?php echo $this->_var['server']['trunon_date']; ?>日<?php echo $this->_var['server']['trunon_hour']; ?>时</b>
<b><a title="进入游戏" href="/game.php?action=play&server_id=<?php echo $this->_var['server']['id']; ?>" target="_blank">进入游戏</a></b></li>
</ul></div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</body></html>
