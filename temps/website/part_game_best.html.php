<?php $_from = $this->_var['game_new']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'game');if (count($_from)):
    foreach ($_from AS $this->_var['game']):
?>
<div class="h_hot_div">
<ul>
 <li><img class="pngfix" src="<?php echo $this->_var['game']['logo_new']; ?>"></li>
	<li><b class="server_name"><?php echo $this->_var['game']['name']; ?></b>
	<p><a title="官网" href="<?php echo $this->_var['game']['website']; ?>" target="_blank">官网|</a>
      <a title="新手卡" href="card.php?game_id=<?php echo $this->_var['game']['id']; ?>" target="_blank">礼包卡|</a>
      <a class="a3" title="进入游戏" href="game.php?action=server_list&game_id=<?php echo $this->_var['game']['id']; ?>" target="_blank">进入游戏</a></li>
</ul>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>