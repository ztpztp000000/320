<?php
//礼包卡列表
if($do=='gift_list'){
	check_permissions('gift_read');
	$gift_list=array();
    $game_list = game_array_list('','');
    $server_list = server_array_list('','');
	$state=isset($_GET['state'])?intval($_GET['state']):-1;
    switch($state)
    {
        case 0:
            $where = ' WHERE key_state=0';
            break;
        case 1:
            $where = ' WHERE key_state=1';
            break;
        default:
            $where = ' WHERE 1';
            break;
    }
	$sql="SELECT * FROM ".$db_prefix."gift ".$where;
	$page_size=20;
	$page_current=isset($_GET['page'])?intval($_GET['page']):1;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql." order by gift_id desc limit ".(($page_current-1)*$page_size).",".$page_size);
	if($count>0){
			$no=$count-(($page_current-1)*$page_size);
			foreach($res as $row){
                if('0000-00-00 00:00:00'==$row['key_get_time'])$row['key_get_time']='';
                $key_get_game_id = $row['key_get_game_id'];
                $key_get_server_id = $row['key_get_server_id'];
                $row['key_get_server_id'] = $server_list[$key_get_server_id]['server_name'];
                $row['key_get_game_id'] = $game_list[$key_get_game_id]['game_name'];
                $row['money'] = intval(substr($row['gift_key'],2,2));
				$gift_list[$row['gift_id']]=$row;
				$no--;
			}
			$pagebar=pagebar(get_self(),"action=gift&do=gift_list&",$page_current,$page_size,$count);
	}else{
			$pagebar="";
	}

	$smarty=new smarty();smarty_header();
	$smarty->assign('gift_list',$gift_list);
    $smarty->assign('state',$state);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('gift_list.html');
}

//礼包卡列表导出Excel
if($do=='gift_list_excel'){
	check_permissions('gift_read');
	$gift_list="礼包卡序号, 金额, 使用时间, 游戏, 服区, 使用人, 添加时间\r\n";
    $game_list = game_array_list('','');
    $server_list = server_array_list('','');
	$state=isset($_GET['state'])?intval($_GET['state']):-1;
    switch($state)
    {
        case 0:
            $where = ' WHERE key_state=0';
            break;
        case 1:
            $where = ' WHERE key_state=1';
            break;
        default:
            $where = ' WHERE 1';
            break;
    }
	$sql="SELECT * FROM ".$db_prefix."gift ".$where;

	$res=$GLOBALS['db']->getall($sql);
	if($res){
			foreach($res as $row){
                if('0000-00-00 00:00:00'==$row['key_get_time'])$row['key_get_time']='';
                $key_get_game_id = $row['key_get_game_id'];
                $key_get_server_id = $row['key_get_server_id'];
                $row['key_get_server_id'] = $server_list[$key_get_server_id]['server_name'];
                $row['key_get_game_id'] = $game_list[$key_get_game_id]['game_name'];
                $row['money'] = intval(substr($row['gift_key'],2,2));
				$gift_list .= $row['gift_key'].','.$row['money'].','.$row['key_get_time'].','.$row['key_get_game_id'].','.$row['key_get_server_id'].','.$row['key_get_user'].','.$row['key_add_time']."\r\n";
			}
    }
    $filename = 'GiftCard_'.date('YmdHis').'.csv';
        header("Pragma: public");
        header("Expires: 0");
        header("Accept-Ranges: bytes");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type:APPLICATION/OCTET-STREAM;charset=utf-8");
		echo(mb_convert_encoding($gift_list,"CP936","UTF-8"));
		exit;
}

//添加礼包卡
if($do=='gift_add'){
	check_permissions('gift_write');

	$smarty=new smarty();smarty_header();
	$smarty->display('gift_add.html');
}

//添加礼包卡
if($do=='gift_insert'){
	check_permissions('gift_write');

    $num=empty($_POST['num'])?0:intval($_POST['num']);
    $money=empty($_POST['money'])?0:intval($_POST['money']);
    $game_no=empty($_POST['game_no'])?'':trim($_POST['game_no']);
    if(''==$game_no){
        message(array('text'=>'请确认礼包卡名称','link'=>'?action=gift&do=gift_add'));
    }
    if((0>=$num)||($num>9999)){
        message(array('text'=>'请确认礼包卡数量不能大于9999','link'=>'?action=gift&do=gift_add'));
    }
    if(0>=$money){
        message(array('text'=>'请确认礼包卡金额','link'=>'?action=gift&do=gift_add'));
    }
    require_once('hi_ports/create_gift.php');
    create_gift($game_no,$num,$money);
	$smarty=new smarty();smarty_header();
	$smarty->display('gift_insert.html');
}

//删除礼包卡
if($do=='gift_del'){
	check_permissions('gift_del');
    $gift_ids=empty($_POST['gift_ids'])?false:implode(',',$_POST['gift_ids']);

    $gift_del_res=$db->delete($db_prefix.'gift','(gift_id in ('.$gift_ids.') AND (key_state <> 1))');
    if(1==$gift_del_res){
        $gift_del_res = '删除成功。';
    }else{
        $gift_del_res = '删除失败';
    }
	$smarty=new smarty();smarty_header();
    $smarty->assign('gift_del_res',$gift_del_res);
	$smarty->display('gift_del.html');
}
?>