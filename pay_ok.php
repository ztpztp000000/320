<?php
include('includes/global.php');
include('languages/'.$config['site_language'].'/front.php');
include('includes/front.php');
include 'includes/config.php';	

require_once('includes/global.php');
require_once(ROOT_PATH.'languages/'.$config['site_language'].'/front.php');
require_once('includes/front.php');

$order_no = $_GET['aid'];
$sql="select pay_user,pay_state,pay_money,dst_type from ".$GLOBALS['db_prefix']."pay WHERE pay_order_no='$order_no'";
$row=$db_reg->getone($sql);
if ($row)
{
	//��Ϸ��
	$money=$row['pay_money'];
	
	if (0 == $row['pay_state'])
	{
		if (2 == $row['dst_type'])
		{
			/// ƽ̨����Ϸʧ��ʱҪ�ѿ۵���Ǯ����ȥ
			$db->query("UPDATE {$db_prefix}member SET cur_money=cur_money+$money where member_id=$pay_user_id");
			
			$update=array();
			$update['cur_money'] = $row['pay_money'];
			$db->update($db_prefix."member", $update, "member_id=$member_id and guid_op='$guid_tmp'");
			
			$db->update($db_prefix."member", $clean_guid, "member_id=$member_id and guid_op='$guid_tmp'");
		}
	}
	/// ���³�ֵ״̬
	$update=array();
	$update['pay_state']=1;
	$db->update($db_prefix."pay",$update,"pay_order_no='".$order_no."'");
	
	if (1 == $row['dst_type'])
	{
		/// ��ֵ��ƽ̨�ɹ��������ҵ�ǰƽ̨��
		$pay_user_id = $row['pay_user'];
	  $db->query("UPDATE {$db_prefix}member SET cur_money=cur_money+$money where member_id=$pay_user_id");
	}
  get_user_info($row['pay_user']);
}
else
{
}

?>
