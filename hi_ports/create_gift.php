<?php
#生成礼包卡功能
function create_gift($game_no,$num,$money,$book = '00'){
    //SSSG:盛世三国
    //XXXX:待定
    //YYYY:待定
    //ZZZZ:待定
    //TTTT:待定
	$type = array(
        'SSSG'=>'A0',
        'XXXX'=>'B0',
        'YYYY'=>'C0',
        'ZZZZ'=>'D0',
        'TTTT'=>'E0'
        );
    if(!isset($type[$game_no])){
        return false;
    }
	$money = sprintf("%02d", $money);
	$table = $GLOBALS['db_prefix'].'gift';
	for($i=1;$i<=$num;$i++){
		$str = substr(md5(sprintf("%08d",rand(1,99999999))),1,12);
		$gift_key = $type[$game_no].$money.$book.$str;
		$value = array('gift_key'=>$gift_key,'key_add_time'=>date('Y-m-d H:i:s'));
		$GLOBALS['db']->insert($table,$value);
	}
}