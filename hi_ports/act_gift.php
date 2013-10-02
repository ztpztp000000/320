<?php
#礼包卡激活接口

function gift_activation($member_id,$user,$game_id,$server_id,$gift_key){
    $table = $GLOBALS['db_prefix'].'gift';
    
	if(empty($gift_key))
		return 2;
        
	$row = $GLOBALS['db']->getone("SELECT * FROM ".$table." WHERE gift_key='$gift_key'");
	if(empty($row))//不存在
		return 3;
        
	if((1==$row['key_state']) || (''!=$row['key_get_user']))
		return 4;//使用过了
        
    $row = $GLOBALS['db']->getone("SELECT * FROM ".$table." WHERE key_get_user='$user' AND key_get_game_id='$game_id' AND key_get_server_id='$server_id'");
    if((1==$row['key_state']) || (''!=$row['key_get_user']))
    return 5;//同一游戏同一服区只能使用一张礼包卡
	
	$value = array(
        'key_state'     =>  1,
        'key_get_user'  =>  $user,
        'key_get_member_id' => $member_id,
        'key_get_time'  =>  date('Y-m-d H:i:s'),
        'key_get_game_id'       =>  $game_id,
        'key_get_server_id'     =>  $server_id,
        );
	$where = "gift_key='$gift_key'";
	$GLOBALS['db']->update($table,$value,$where);
	$gift_addGold_res = gift_addGold($user,$game_id,$server_id,$gift_key);
    if('1'==$gift_addGold_res){
        return 1;//礼包卡激活成功
    }
    else{
        return $gift_addGold_res;
    }
}

function gift_addGold($user,$game_id,$server_id,$gift_key){
	$modeinfo=get_paymode_info(7);
	$gameinfo=get_game_info($game_id);
	$serverinfo=get_server_info($server_id);
	
	//游戏币
	$money=(int)substr($gift_key,2,2);
	$pay_per=$modeinfo['money_per'];
	$game_per=$gameinfo['game_money_per'];
	$gold=round($money*($pay_per/100)*$game_per);
	$pay_url=$serverinfo['pay_gateway'];
	//充值接口
	$ret=0;
	switch ($gameinfo['game_no']){
	case 'SSSG':
		$ret=sssg_charge($gift_key,$gold,$user,$pay_url,$gameinfo);
		break;
	}
	return $ret;
}