<?php
/**
 *支付接口处理类
*/
function pay_gateway($mode_id, $order_no, $money){
	//debug
	/*if(true){
		require_once('charge_gateway.php');
		game_charge_gateway($order_no);
		exit;
	}*/
	
	//支付方式
	$modeinfo=get_paymode_info($mode_id);
	
	//支付接口
	switch ($modeinfo['no'])
	{
	case 'HEEPAY'://骏网
		$typeId="20";		//支付类型
		$typeCode="";		//银行编码
		heepay($order_no,$money,$typeId,$typeCode);
		break;
	case 'HEEPAY-SZX':
		$typeId="13";
		$typeCode=$channel;
		heepay($order_no,$money,$typeId,$typeCode);
		break;
	case 'HEEPAY-UNICOM':
		$typeId="14";
		$typeCode=$channel;
		heepay($order_no,$money,$typeId,$typeCode);
		break;
	case 'HEEPAY-CARD':
		$typeId="10";
		$typeCode=$channel;
		heepay($order_no,$money,$typeId,$typeCode);
		break;
	case 'HEEPAY-DIANXIN':
		$typeId="15";
		$typeCode=$channel;
		heepay($order_no,$money,$typeId,$typeCode);
		break;
	}
}

//骏网汇付宝
function heepay($order_no, $money, $typeId, $typeCode){
	require_once(ROOT_PATH."pay/heepay/config.php");
	
	$version="1";
	$pay_type=$typeId;
	$pay_code=$typeCode;
	$pay_flag=0;
	$agent_bill_id=$order_no;
	$pay_amt=$money;
	$user_ip=$_SERVER['REMOTE_ADDR'];
	$agent_bill_time=date('YmdHis');
	$goods_name="GAME";
	$goods_num="1";
	$remark="";
	$is_test=1;
	$goods_note="";
	
	$md5str="version=".$version."&agent_id=".$agent_id."&agent_bill_id=".$agent_bill_id."&agent_bill_time=".$agent_bill_time."&pay_type=".$pay_type."&pay_amt=".$pay_amt."&notify_url=".$notify_url."&return_url=".$return_url."&user_ip=".$user_ip."&key=".$key;
	$sign=md5($md5str);
	$url_post="version=".$version."&agent_id=".$agent_id."&agent_bill_id=".$agent_bill_id."&agent_bill_time=".$agent_bill_time."&pay_type=".$pay_type."&pay_amt=".$pay_amt."&notify_url=".$notify_url."&return_url=".$return_url."&user_ip=".$user_ip."&remark=".$remark."&goods_name=".$goods_name."&sign=".$sign."&pay_code=".$pay_code;
	$url="http://www.heepay.com/Payment/Index.aspx?".$url_post;
	//echo $url;
	//header("location:$url");
	echo "<script language = 'javascript' type = 'text/javascript'>";    
	echo "window.location.href = '$url' ";    
	echo "</script>";  
	exit;
}
?>