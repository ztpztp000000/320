<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $this->_var['game_title']; ?></title>
    </head>
    <body>
    	<div style="display:none;">
        <iframe src="<?php echo $this->_var['pai_api']; ?>pay/user.php?user=<?php echo $this->_var['p_user']; ?>&site=<?php echo $this->_var['p_site']; ?>"></iframe>
        </div>
         
        <iframe scrolling="auto" id="ifm" frameborder="0" marginwidth="0" marginheight="0" height="100%" width="100%" src="<?php echo $this->_var['game_url']; ?>"></iframe>
        
        <?php if ($this->_var['show_mm'] == 1): ?>       
        <script type="text/javascript" src="http://www.mojiyule.com/imoji/common/imoji_jquery.js"></script>
		<script type="text/javascript" src="http://www.mojiyule.com/imoji/common/imoji_swfobject.js"></script>
		<script type="text/javascript" src="<?php echo $this->_var['mm_url']; ?>" id="imojitvScript"></script>
		<script type="text/javascript">playerButton('create');</script>
        <?php endif; ?>
    </body>
</html>

