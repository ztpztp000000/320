<?php
require_once'includes/global.php';
require_once'languages/'.$config['site_language'].'/admin.php';

$action	=empty($_GET['action'])?'':trim($_GET['action']);
$do=empty($_GET['do'])?'':trim($_GET['do']);
if($action==''){
	include'sp/sp_index.php';
	exit;
}
if($action=='start'){
	include'sp/sp_start.php';
	exit;
}
if($action=='sp'){
	include'sp/sp.php';
	exit;
}
function smarty_header(){
	$GLOBALS['smarty']->template_dir	=ROOT_PATH.'templates/sp';
	$GLOBALS['smarty']->cache_dir		=ROOT_PATH.'temps/cache';
	$GLOBALS['smarty']->compile_dir	=ROOT_PATH.'temps/compile';
	$GLOBALS['smarty']->assign('language',$GLOBALS['language']);
	$GLOBALS['smarty']->assign('config',$GLOBALS['config']);
}

function message($message=array()){
	$smarty=new smarty();
	$smarty->template_dir	=ROOT_PATH.'templates/sp';
	$smarty->cache_dir		=ROOT_PATH.'temps/cache';
	$smarty->compile_dir	=ROOT_PATH.'temps/compile';
	$smarty->assign('language',$GLOBALS['language']);
	$smarty->assign('config',$GLOBALS['config']);
	$smarty->assign('message',$message);
	$smarty->display('message.htm');
	exit;
}

function check_login(){
	if(empty($_SESSION['sp_id'])||$_SESSION['sp_id']<1){
		message(array('text'=>$GLOBALS['language']['please_login'],'link'=>get_self()));
	}
}
function sp_log($action,$do,$text){
	$info=$GLOBALS['language']['log_action'][$action].$GLOBALS['language']['log_do'][$do].(empty($text)?'':':'.$text);
	$insert=array();
	$insert['log_time']=$_SERVER['REQUEST_TIME'];
	$insert['log_info']=$info;
	$insert['log_ip']=get_ip();
	$insert['log_agent']=$_SERVER['HTTP_USER_AGENT'];
	$insert['admin_id']=$_SESSION['admin_id'];
	$GLOBALS['db']->insert($GLOBALS['db_prefix']."admin_log",$insert);
}
function pagebar($page_name,$page_parameters='',$page_current,$page_size,$count){
	parse_str($page_parameters);
	$page_count		=ceil($count/$page_size);
	$page_start		=$page_current-4;
	$page_end		=$page_current+4;
	if($page_current<5){
		$page_start	=1;
		$page_end	=5;
	}
	if($page_current>$page_count-4){
		$page_start	=$page_count-8;
		$page_end	=$page_count;
	}
	if($page_start<1)$page_start=1;
	if($page_end>$page_count)$page_end=$page_count;
	$html="";
	$html.="<div class=\"pagebar\">";
	$html.="<span class=\"info\">".$page_current." / ".$page_count."</span>";
	if($page_current!=1){
			$html.="<a href='".$page_name."?".$page_parameters."page=1'>&laquo;</a>";
	}
	for($i=$page_start;$i<=$page_end;$i++){
		if($i==$page_current){
			$html.="<span class=\"current\">".$i."</span>";
		}else{
			$html.="<a href='".$page_name."?".$page_parameters."page=".$i."'>".$i."</a>";
		}
	}
	if($page_current!=$page_count){
			$html.="<a href='".$page_name."?".$page_parameters."page=".$page_count."'>&raquo;</a>";
	}
	$html.="</div>";
	return $html;
}

/// 获取一个推广员的推广人数
function get_sp_count($sp_member_id, $def_search_size){
	include('includes/config.php');
	require_once'includes/global.php';
	
	$sql = "SELECT member_id FROM ".$db_prefix."member WHERE spread_user=".$sp_member_id;
	$count=$GLOBALS['db']->getcount($sql);
	$res=$GLOBALS['db']->getall($sql);
	$sp_info = array();
	$sp_info['count'] = $count;
	$sp_info['t_money'] = 0;
	$sp_info['search_size'] = 0;
	if($count>0){
		foreach($res as $row){
			$sp_info['t_money'] += get_sp_money($row['member_id']);
		}
	}
	
	// 每个推广员已提现的金额
	$sql="select search_size,cashed_money from ".$GLOBALS['db_prefix']."member where member_id=$sp_member_id";
	$row=$GLOBALS['db']->getone($sql);
	if($row){
		$sp_info['search_size'] = $row['search_size'];
		if (0 == $search_size)
		{
			$sp_info['search_size'] = $def_search_size;
		}
		
		$sp_info['cashed_money'] = $row['cashed_money'];
	}
	else
	{
		$sp_info['cashed_money'] = 0;
	}

	return $sp_info;
}
/// 获取一个用户的付费总金额
function get_sp_money($user_id){
	include('includes/config.php');
	require_once'includes/global.php';
	
	$sql = "SELECT SUM(pay_money) FROM ".$db_prefix."pay WHERE pay_user=".$user_id." and pay_state=1";
	$row = $GLOBALS['db']->getone($sql);
	
	if ($row['SUM(pay_money)'])
	{
		$total_cash = $row['SUM(pay_money)'];
		//已提现
		/*$sql="select sum(cash) from ".$GLOBALS['db_prefix']."cashlog where userid=$sp_member_id";
		$row=$GLOBALS['db']->getone($sql);
		$cash = $total_cash;
		if($row){
			$cash = $total_cash - ($row[0] * $search_size);
		}*/

		return $total_cash;
	}
	else
	{
		return 0;
	}
}

?>