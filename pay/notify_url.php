<?php
include('../../includes/global.php');
include('../../languages/'.$config['site_language'].'/front.php');
include('../../includes/front.php');
include 'config.php';	

/*
 * 充值平台的充值结果, 充值成功后要转到777fly, 由777fly充值到游戏中
*/

$result			= $_REQUEST['result'];
$pay_message	= $_REQUEST['pay_message'];
$agent_id		= $_REQUEST['agent_id'];
$jnet_bill_no	= $_REQUEST['jnet_bill_no'];
$agent_bill_id	= $_REQUEST['agent_bill_id'];
$pay_type		= $_REQUEST['pay_type'];
$pay_amt		= $_REQUEST['pay_amt'];
$remark			= $_REQUEST['remark'];
$sign			= $_REQUEST['sign'];

$md5str="result=".$result."&agent_id=".$agent_id."&jnet_bill_no=".$jnet_bill_no."&agent_bill_id=".$agent_bill_id."&pay_type=".$pay_type."&pay_amt=".$pay_amt."&remark=".$remark."&key=".$key;
$signstr=md5($md5str);

#校验码正确
if($sign==$signstr) {
	if($result=="1"){
		echo "ok";
		$orderinfo=get_order_info($agent_bill_id);
		
		if (0 != $orderinfo['state'])
		{
			exit;
		}
		
		//首先判断，是否为直接充值到平台
		if(1==$orderinfo['dst_type']){
			//idk 充值到平台
			$update=array();
			$update['pay_state'] = '1';
			$db->update($db_prefix."pay",$update,"pay_order_no='".$agent_bill_id."'");

			header("Location: http://www.".$web_src.".com/pay_ok.php?aid=$agent_bill_id");
		}
		else
		{
			//游戏订单处理
			require_once(ROOT_PATH.'hi_ports/charge_gateway.php');
			$ret=game_charge_gateway($agent_bill_id);
			
			$n=1;
			//返回失败时重复10次
			while($ret!=1 && $n<10){
				$ret=game_charge_gateway($agent_bill_id);
				$n++;
				sleep(1);
			}
			
			//更新订单状态
			if($ret==1){
				$update=array();
				$update['pay_state']=1;
				$db->update($db_prefix."pay",$update,"pay_order_no='".$agent_bill_id."'");
			}
			else{
				$update=array();
				$update['pay_state']=2;
				$db->update($db_prefix."pay",$update,"pay_order_no='".$agent_bill_id."'");
			}
		}
	}
}
else{
	echo "error";
}

?>
