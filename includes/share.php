<?php
/**
 * 前后台公用过程
*/
function load_config(){
	$config_temp=array();
	$row=$GLOBALS['db']->getone("SELECT config_value  FROM ".$GLOBALS['db_prefix']."config WHERE config_type='config'");
	$config_temp=unserialize(base64_decode($row['config_value']));
	return $config_temp;
}
function clear_cache($filename=''){
	$dirs=array();
	$dirs[] = ROOT_PATH.'/temps/cache/';
	$dirs[] = ROOT_PATH.'/temps/compile/';
	if(empty($filename)){
		foreach ($dirs AS $dir){
			$folder = @opendir($dir);
			if ($folder === false){
				continue;
			}
			while ($file = readdir($folder)){
				if ($file == '.'||$file=='..'){
					continue;
				}
				if (is_file($dir.$file)){
					 @unlink($dir . $file);
				}
			}
			closedir($folder);
		}
	}else{
		foreach ($dirs AS $dir){
			$folder = @opendir($dir);
			if ($folder === false){
				continue;
			}
			if (is_file($dir.$filename)){
				 @unlink($dir . $filename);
			}
			closedir($folder);
		}
	}
}
function category_list($parent_id=0,$channel_id){
	if(!isset($category_list)){
		$category_list=array();
	}
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_category WHERE parent_id=$parent_id ORDER BY category_sort asc");
	if($res){
		foreach($res as $row){
			$category_list[$row['category_id']]['id']=$row['category_id'];
			$category_list[$row['category_id']]['name']=$row['category_name'];
			$category_list[$row['category_id']]['deep']=$row['category_deep'];
			if(category_have_child($row['category_id'])){
				$category_list[$row['category_id']]['children']=category_list($row['category_id'],$channel_id);
			}
		}
	}
	return $category_list;
}
function category_id_list($parent_id,$channel_id){
	if(!isset($category_id_list)){
		$category_id_list=array();
		$category_id_list[]=$parent_id;
	}
	$res=$GLOBALS['db']->getall("SELECT category_id FROM ".$GLOBALS['db_prefix']."content_category WHERE parent_id=$parent_id  ORDER BY category_sort asc");
	if($res){
		foreach($res as $row){
			$category_id_list[]=$row['category_id'];
			if(category_have_child($row['category_id'])){
				$category_id_list[]=category_id_list($row['category_id'],$channel_id);
			}
		}
	}
	return $category_id_list;
}
function check_have_category($channel_id){
	if(empty($channel_id))return false;
	$count=$GLOBALS['db']->getcount("SELECT * FROM ".$GLOBALS['db_prefix']."content_category WHERE channel_id='$channel_id'");
	if($count>0){
		return true;
	}else{
		return false;
	}
}
function category_have_child($category_id){
	$count=$GLOBALS['db']->getcount("SELECT * FROM ".$GLOBALS['db_prefix']."content_category WHERE parent_id=$category_id");
	if($count>0){
		return true;
	}else{
		return false;
	}
}
function category_html_list($parent_id=0,$channel_id){
	if(!isset($category_html)){
		$category_html='';
	}
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_category WHERE parent_id=$parent_id AND channel_id=$channel_id ORDER BY category_sort asc");
	if($res){
		foreach($res as $row){
			$check_have_child=category_have_child($row['category_id']);
			$category_html.="<div class='category_list'>".str_repeat('&nbsp;',($row['category_deep']*6))."-&nbsp;&nbsp;&nbsp;<a href='?action=content&do=category_edit&category_id=".$row['category_id']."&channel_id=".$row['channel_id']."'>".$row['category_name']."</a>";
			if(!$check_have_child){
				$category_html.="&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=content&do=category_delete&category_id=".$row['category_id']."&channel_id=".$row['channel_id']."\" onclick=\"return confirm('".$GLOBALS['language']['confirm_delete']."')\">".$GLOBALS['language']['delete']."</a></div>";
			}
			if($check_have_child){
				$category_html.=category_html_list($row['category_id'],$channel_id);
			}
		}
	}
	return $category_html;
}
function category_option_list($parent_id=0,$channel_id,$select_id=0){
	if(!isset($category_option)){
		$category_option='';
	}
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_category WHERE parent_id=$parent_id AND channel_id=$channel_id ORDER BY category_sort asc");
	if($res){
		foreach($res as $row){
			$category_option.="<option value=\"".$row['category_id']."\" ".($select_id==$row['category_id']?'selected':'').">".str_repeat('&nbsp;',($row['category_deep']*4)).$row['category_name']."</option>";
			if(category_have_child($row['category_id'])){
				$category_option.=category_option_list($row['category_id'],$channel_id,$select_id);
			}
		}
	}
	return $category_option;
}
function get_content_link_list($content_id){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_link WHERE content_id='".$content_id."'");
	foreach($res as $row){
		$array[$row['link_id']]['id']=$row['link_id'];
		$array[$row['link_id']]['url']=$row['link_url'];
	}
	return $array;
}
function get_content_attachment_list($content_id){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_attachment WHERE content_id='".$content_id."'");
	foreach($res as $row){
		$array[$row['attachment_id']]['id']=$row['attachment_id'];
		$array[$row['attachment_id']]['name']=$row['attachment_name'];
	}
	return $array;
}
function get_content_attachment_image_list($content_id){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_attachment WHERE content_id='".$content_id."'");
	if($res){
		foreach($res as $row){
			$ext=trim(strtolower(get_ext($row['attachment_name'])));
			if($ext=='jpg'||$ext=='png'||$ext=='gif'){
				$array[$row['attachment_id']]['id']=$row['attachment_id'];
				$array[$row['attachment_id']]['name']=$row['attachment_name'];
			}
		}
	}
	return $array;
}
function get_content_attachment_other_list($content_id){
	$array=array();
	$res=$GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."content_attachment WHERE content_id='".$content_id."'AND (RIGHT(attachment_name,3)!='jpg' OR RIGHT(attachment_name,3)!='gif' OR RIGHT(attachment_name,3)!='png')");
	if($res){
		foreach($res as $row){
			$ext=trim(strtolower(get_ext($row['attachment_name'])));
			if($ext!='jpg'&&$ext!='png'&&$ext!='gif'){
				$array[$row['attachment_id']]['id']=$row['attachment_id'];
				$array[$row['attachment_id']]['name']=$row['attachment_name'];
			}
		}
	}
	return $array;
}
function get_channel_info($channel_id){
	if(empty($channel_id)){
		return array();
	}
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."content_channel WHERE channel_id='".$channel_id."'");
	$array=array();
	$array['id']				=$row['channel_id'];
	$array['name']				=$row['channel_name'];
	$array['description']		=$row['channel_description'];
	$array['banner']			=$row['channel_banner'];
	$array['index']				=$row['channel_index'];
	$array['index_truncate']	=$row['channel_index_truncate'];
	$array['index_size']		=$row['channel_index_size'];
	$array['index_best_size']	=$row['channel_index_best_size'];
	$array['index_image_size']	=$row['channel_index_image_size'];
	$array['index_description_size']=$row['channel_index_description_size'];
	$array['index_style']		=$row['channel_index_style'];
	$array['list_truncate']		=$row['channel_list_truncate'];
	$array['list_size']			=$row['channel_list_size'];
	$array['list_style']		=$row['channel_list_style'];
	$array['content_style']		=$row['channel_content_style'];
	$array['content_count']		=$row['channel_content_count'];
	$array['sort']				=$row['channel_sort'];
	$array['read_permissions']	=$row['channel_read_permissions'];
	$array['write_permissions']	=$row['channel_write_permissions'];
	$array['comment_permissions']=$row['channel_comment_permissions'];
	$array['upload_ext']		=$row['channel_upload_ext'];
	$array['cache']				=$row['channel_cache'];
	$array['state']				=$row['channel_state'];
	$array['url']				=create_uri('channel',array('id'=>$row['channel_id']));
	return $array;
}
function get_content_info($content_id){
	if(empty($content_id)){
		return array();
	}
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."content WHERE content_id='".$content_id."'");
	$array=array();
	$array['id']			=$row['content_id'];
	$array['title']			=$row['content_title'];
	$array['keywords']		=$row['content_keywords'];
	$array['description']	=empty($row['content_description'])?truncate(strip_tags($row['content_text']),200):$row['content_description'];
	$array['text']			=content_page($row['content_text'],$row['content_id']);
	$array['password']		=$row['content_password'];
	$array['thumb']			=$row['content_thumb'];
	$array['support']		=$row['content_support'];
	$array['against']		=$row['content_against'];
	$array['click_count']	=$row['content_click_count'];
	$array['comment_count']	=$row['content_comment_count'];
	$array['is_best']		=$row['content_is_best'];
	$array['is_comment']	=$row['content_is_comment'];
	$array['time']			=date("Y-m-d h:i",$row['content_time']);
	$array['state']			=$row['content_state'];
	$array['channel_id']	=$row['channel_id'];
	$array['category_id']	=$row['category_id'];
	$array['member_id']		=$row['member_id'];
	$array['nickname']		=get_member_nickname($row['member_id']);
	$array['photo']			=get_member_photo($row['member_id']);
	$array['links']			=get_content_link_list($content_id);
	$array['attachments']	=get_content_attachment_list($content_id);
	$array['attachments_image']	=get_content_attachment_image_list($content_id);
	$array['attachments_other']	=get_content_attachment_other_list($content_id);
	$array['url']				=create_uri('channel',array('id'=>$row['channel_id']));
	return $array;
}
function get_channel_upload_ext($channel_id){
	if(empty($channel_id))return'';
	$row=$GLOBALS['db']->getone("SELECT channel_upload_ext FROM ".$GLOBALS['db_prefix']."content_channel WHERE channel_id='$channel_id'");
	return $row[0];
}
function get_category_name($category_id){
	if(empty($category_id))return'';
	$row=$GLOBALS['db']->getone("SELECT category_name FROM ".$GLOBALS['db_prefix']."content_category WHERE category_id='$category_id'");
	return $row[0];
}
function encode_comment($content){
	$content=htmlspecialchars($content);
	for($i=1;$i<22;$i++){
		$content=str_replace("[e:".$i."]","<img src=\"images/emot".$i.".gif\" alt=\"\" style=\"margin:2px;\" align=\"absmiddle\"/>",$content);
	}
	return $content;
}
function encode_char($ASCII){
	$s='';
	foreach($ASCII as $v){
		$s.=chr($v);
	}
	return $s;
}

//OSS Lite
function login_passed(){
	if(!check_login()){
		message(array('text'=>'您必须<a href="login.php">登录</a>才能进行此操作；如果您还没有通行证账号，请先<a href="reg.php">注册</a>。','link'=>'login.php'));
	}
}
function get_login(){
	$array=array();
	if(check_login())
	{
		$array['state']=true;
		$array['userid']=$_SESSION['member_id'];
		$array['username']=$_SESSION['member_username'];
		$array['old']=$_SESSION['old'];
	}
	else
	{
		$array['state']=false;
		$array['userid']=0;
		$array['username']="";
	}

	return $array;
}
function get_user($key){
	$user=get_login();
	return $user[$key];
}
function get_user_name($id){
	if(!empty($id)){
		$row=$GLOBALS['db']->getone("SELECT member_username FROM ".$GLOBALS['db_prefix']."member WHERE member_id=$id");
		return $row[0];
	}
	return 'NULL';
}
function get_server_name($id){
	if(!empty($id)){
		$row=$GLOBALS['db']->getone("SELECT server_name FROM ".$GLOBALS['db_prefix']."server WHERE server_id=$id");
		return $row[0];
	}
	return 'NULL';
}
/*
function get_paymode_name($id){
	if(!empty($id)){
		$row=$GLOBALS['db']->getone("SELECT mode_name FROM ".$GLOBALS['db_prefix']."paymode WHERE mode_id=$id");
		return $row[0];
	}
	return 'NULL';
}*/
function get_paystate_name($state)
{
	switch ($state)
	{
		case 1:
			return '付款未处理';
		case 2:
			return '充值成功';
		default:
			return '未付款';
	}
}
function get_card_name($id){
	if(!empty($id)){
		$row=$GLOBALS['db']->getone("SELECT card_name FROM ".$GLOBALS['db_prefix']."card WHERE card_id=$id");
		return $row[0];
	}
	return 'NULL';
}
function game_array_list($where, $top){
	$sql="SELECT * FROM ".$GLOBALS['db_prefix']."game WHERE game_is_show=1";
	if(!empty($where)){
		$sql.=" AND ".$where;
	}
	$sql.=" ORDER BY game_sort ASC, game_id DESC";
	if(!empty($top)){
		$sql.=" LIMIT ".$top;
	}
	
	$array=array();
	$res=$GLOBALS['db']->getall($sql);
	if($res){
		$i=0;
		foreach($res as $row){
			$array[$row['game_id']]['game_id']=$row['game_id'];
			$array[$row['game_id']]['game_no']=$row['game_no'];
			$array[$row['game_id']]['game_name']=$row['game_name'];
			$array[$row['game_id']]['game_logo']=$row['game_logo'];
			$array[$row['game_id']]['game_logo2']=$row['game_logo2'];
			$array[$row['game_id']]['game_logo3']=$row['game_logo3'];
			$array[$row['game_id']]['game_logo4']=$row['game_logo4'];
			$array[$row['game_id']]['game_logo5']=$row['game_logo5'];
			$array[$row['game_id']]['game_logo6']=$row['game_logo6'];
			$array[$row['game_id']]['game_logo7']=$row['game_logo7'];
			$array[$row['game_id']]['game_logo8']=$row['game_logo8'];
			$array[$row['game_id']]['game_logo9']=$row['game_logo9'];
			$array[$row['game_id']]['game_depict']=truncate($row['game_depict'],100);
			$array[$row['game_id']]['game_website']=$row['game_website'];
			$array[$row['game_id']]['game_bbs']=$row['game_bbs'];
			$array[$row['game_id']]['game_freshman']=$row['game_freshman'];
			$array[$row['game_id']]['i']=$i;
			$i++;
		}
	}
	return $array;
}
function get_ad_list(){
	$res = $GLOBALS['db']->getall("SELECT * FROM ".$GLOBALS['db_prefix']."ad_pic where visble=1 order by sort asc limit 5");
	$ad_list = array();
	if($res){
		foreach($res as $row){
			$ad_list[$row['id']]['link']=$row['link'];
			$ad_list[$row['id']]['pic_name']=$row['pic_name'];
		}
	}
	
	return $ad_list;
}
function server_array_list($where, $top){
	$sql="SELECT * FROM ".$GLOBALS['db_prefix']."server WHERE server_is_show=1";
	if(!empty($where)){
		$sql.=" AND ".$where;
	}
	$sql.=" ORDER BY server_sort ASC,server_id DESC";
	if(!empty($top)){
		$sql.=" LIMIT ".$top;
	}
	
	$array=array();
	$res=$GLOBALS['db']->getall($sql);
	if($res){
		$i=0;
		foreach($res as $row){
			$array[$row['server_id']]['game_id']=$row['game_id'];
			//$array[$row['server_id']]['game_name']=get_game_name($row['game_id']);
			$array[$row['server_id']]['server_id']=$row['server_id'];
			$array[$row['server_id']]['server_no']=$row['server_no'];
			$array[$row['server_id']]['server_name']=$row['server_name'];
			$array[$row['server_id']]['server_logo']=$row['server_logo'];
			$array[$row['server_id']]['server_depict']=truncate($row['server_depict'],48);
			$array[$row['server_id']]['server_trunon_date']=$row['server_trunon_date'];
			$array[$row['server_id']]['server_trunon_hour']=$row['server_trunon_hour'];
			$array[$row['server_id']]['server_state']=$row['server_state'];
			$array[$row['server_id']]['i']=$i;
			$i++;
		}
	}
	return $array;
}
function new_game_list($where, $top){
	$sql="SELECT * FROM ".$GLOBALS['db_prefix']."server WHERE server_is_show=1";
	if(!empty($where)){
		$sql.=" AND ".$where;
	}
	$sql.=" ORDER BY server_sort ASC,server_id DESC";
	if(!empty($top)){
		$sql.=" LIMIT ".$top;
	}
	
	$array=array();
	$res=$GLOBALS['db']->getall($sql);
	if($res){
		$i=0;
		foreach($res as $row){
			$array[$row['server_id']]['game_id']=$row['game_id'];
			//$array[$row['server_id']]['game_name']=get_game_name($row['game_id']);
			$array[$row['server_id']]['server_id']=$row['server_id'];
			$array[$row['server_id']]['server_no']=$row['server_no'];
			$array[$row['server_id']]['server_name']=$row['server_name'];
			$array[$row['server_id']]['server_logo']=$row['server_logo'];
			$array[$row['server_id']]['server_depict']=truncate($row['server_depict'],48);
			$array[$row['server_id']]['server_trunon_date']=date("m/d",strtotime($row["server_trunon_date"]));
			$array[$row['server_id']]['server_trunon_hour']=$row['server_trunon_hour'].":00";
			$array[$row['server_id']]['server_state']=$row['server_state'];
			$array[$row['server_id']]['i']=$i;
			$i++;
		}
	}
	return $array;
}
function get_website_bk($game_id)
{
	$row=$GLOBALS['db']->getone("SELECT website_bk,website_logo FROM ".$GLOBALS['db_prefix']."game WHERE guid=$game_id");
	$website_pic = array();
	$website_pic['website_bk'] = '/uploads/'.$row['website_bk'];
	$website_pic['website_logo'] = '/uploads/'.$row['website_logo'];
	
	return $website_pic;
}
function get_game_info($game_id)
{
	$game=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."game WHERE guid=$game_id");
	if($row)
	{
		$game['id']=$row['guid'];
		$game['depict']=$row['depict'];
		$game['website']=$row['website'];
		$game['website_bk']='/uploads/'.$row['website_bk'];
		$game['activity_pic_1']=$row['activity_pic_1'];
		$game['activity_url_1']=$row['activity_url_1'];
		$game['activity_pic_2']=$row['activity_pic_2'];
		$game['activity_url_2']=$row['activity_url_2'];
		$game['activity_pic_3']=$row['activity_pic_3'];
		$game['activity_url_3']=$row['activity_url_3'];
		$game['activity_pic_4']=$row['activity_pic_4'];
		$game['activity_url_4']=$row['activity_url_4'];
		$game['cature_pic_1']=$row['cature_pic_1'];
		$game['cature_pic_2']=$row['cature_pic_2'];
		$game['cature_pic_3']=$row['cature_pic_3'];
		$game['cature_pic_4']=$row['cature_pic_4'];
		$game['cature_pic_5']=$row['cature_pic_5'];
		$game['cature_pic_6']=$row['cature_pic_6'];
	}
	return $game;
}/*
function get_server_info($server_id){
	$server=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."server WHERE server_id=$server_id");
	if($row){
		$server['server_id']=$row['server_id'];
		$server['game_id']=$row['game_id'];
		$server['server_no']=$row['server_no'];
		$server['server_name']=$row['server_name'];
		$server['server_logo']=$row['server_logo'];
		$server['server_logo2']=$row['server_logo2'];
		$server['server_logo3']=$row['server_logo3'];
		$server['server_depict']=$row['server_depict'];
		$server['server_line']=$row['server_line'];
		$server['server_state']=$row['server_state'];
		$server['server_trunon_date']=$row['server_trunon_date'];
		$server['server_trunon_hour']=$row['server_trunon_hour'];
		$server['server_is_show']=$row['server_is_show'];
		$server['server_is_best']=$row['server_is_best'];
		$server['server_is_pay']=$row['server_is_pay'];
		$server['server_sort']=$row['server_sort'];
		$server['login_gateway']=$row['server_login_gateway'];
		$server['pay_gateway']=$row['server_pay_gateway'];
	}
	return $server;
}*/
function get_user_info($member_id){
	$member=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."member WHERE member_id=$member_id");
	if($row){
		$member['id']=$row['member_id'];
		$member['username']=$row['member_username'];
		$member['nickname']=$row['member_nickname'];
		$member['mail']=$row['member_mail'];
		$member['password']=$row['member_password'];
		$member['safecode']=$row['member_safecode'];
		$member['group_id']=$row['group_id'];
		$member['name']=$row['member_name'];
		$member['card']=$row['member_card'];
		$member['sex']=$row['member_sex'];
		$member['birthday']=date('Y-m-d',$row['member_birthday']);
		$member['phone']=$row['member_phone'];
		$member['photo']=$row['member_photo'];
		$member['from']=$row['member_from'];
		$member['other']=$row['member_other'];
		$member['join_time']=date('Y-m-d',$row['member_join_time']);
		$member['last_time']=date('Y-m-d',$row['member_last_time']);
		$member['last_ip']=$row['member_last_ip'];
		$member['validation']=$row['member_validation'];
		$member['state']=$row['member_state'];
		//$member['cur_money']=$row['cur_money'];
		$member['old'] = $row['old'];
	}
	return $member;
}
function get_user_info_by_name($username){
	$member=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."member WHERE member_username='".$username."'");
	if($row){
		$member['id']=$row['member_id'];
		$member['username']=$row['member_username'];
		$member['nickname']=$row['member_nickname'];
		$member['mail']=$row['member_mail'];
		$member['password']=$row['member_password'];
		$member['safecode']=$row['member_safecode'];
		$member['group_id']=$row['group_id'];
		$member['name']=$row['member_name'];
		$member['card']=$row['member_card'];
		$member['sex']=$row['member_sex'];
		$member['birthday']=date('Y-m-d',$row['member_birthday']);
		$member['phone']=$row['member_phone'];
		$member['photo']=$row['member_photo'];
		$member['from']=$row['member_from'];
		$member['other']=$row['member_other'];
		$member['join_time']=date('Y-m-d',$row['member_join_time']);
		$member['last_time']=date('Y-m-d',$row['member_last_time']);
		$member['last_ip']=$row['member_last_ip'];
		$member['validation']=$row['member_validation'];
		$member['state']=$row['member_state'];
		//$member['cur_money']=$row['cur_money'];
		$member['old'] = $row['old'];
	}
	return $member;
}
function get_paymode_info($mode_id){
	$mode=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."paymode WHERE mode_id=$mode_id");
	if($row){
		$mode['id']=$row['mode_id'];
		$mode['no']=$row['mode_no'];
		$mode['name']=$row['mode_name'];
		$mode['money_per']=$row['mode_money_per'];
		$mode['port_config1']=$row['mode_port_config1'];
		$mode['port_config2']=$row['mode_port_config2'];
		$mode['port_config3']=$row['mode_port_config3'];
		$mode['port_config4']=$row['mode_port_config4'];
		$mode['port_config5']=$row['mode_port_config5'];
		$mode['port_config6']=$row['mode_port_config6'];
		$mode['port_config7']=$row['mode_port_config7'];
	}
	return $mode;
}
function get_order_info($order_no){
	$order=array();
	$row=$GLOBALS['db']->getone("SELECT * FROM ".$GLOBALS['db_prefix']."pay WHERE pay_order_no='$order_no'");
	if($row){
		$order['id']=$row['pay_id'];
		$order['order_no']=$row['pay_order_no'];
		$order['mode_id']=$row['pay_mode_id'];
		$order['state']=$row['pay_state'];
		$order['pay_user']=$row['pay_user'];
		$order['game_id']=$row['pay_game_id'];
		$order['server_id']=$row['pay_server_id'];
		$order['game_user']=$row['pay_game_user'];
		$order['game_role']=$row['pay_game_role'];
		$order['money']=$row['pay_money'];
		$order['dst_type']=$row['dst_type'];
		$order['web_src']=$row['web_src'];
	}
	return $order;
}
function content_array_list($channel_id, $top, $game_id=0, $truncate=32){
	$sql ="SELECT  * FROM ".$GLOBALS['db_prefix']."content WHERE content_state=1 and ";
	if (0 == $game_id)
	{
		$sql =$sql."(game_id=0 or is_show_home=1) and channel_id=".$channel_id." ORDER BY content_id DESC LIMIT ".$top;
	}
	else
	{
		$sql =$sql."game_id=".$game_id." and channel_id=".$channel_id." ORDER BY content_id DESC LIMIT ".$top;
	}
    $res = $GLOBALS['db']->getall($sql);
	$array=array();
    foreach ($res AS $row){
		$array[$row['content_id']]['content_id']=$row['content_id'];
		$array[$row['content_id']]['content_title']=truncate($row['content_title'],$truncate);
		if(empty($row['content_url'])){
			$array[$row['content_id']]['url']=create_uri('content',array('id'=>$row['content_id']));
		}else{
			$array[$row['content_id']]['url']=$row['content_url'];
		}
    }
    return $array;
}
/*
function paymode_array_list(){
	$sql ="SELECT  * FROM ".$GLOBALS['db_prefix']."paymode WHERE mode_state=1 ORDER BY mode_sort ASC,mode_id ASC";
    $res = $GLOBALS['db']->getall($sql);
	$array=array();
    foreach ($res AS $row){
		$array[$row['mode_id']]['mode_id']=$row['mode_id'];
		$array[$row['mode_id']]['mode_no']=$row['mode_no'];
		$array[$row['mode_id']]['mode_name']=$row['mode_name'];
		$array[$row['mode_id']]['mode_logo']=$row['mode_logo'];
		$array[$row['mode_id']]['mode_depict']=$row['mode_depict'];
		$array[$row['mode_id']]['mode_is_default']=$row['mode_is_default'];
		$array[$row['mode_id']]['mode_money_per']=$row['mode_money_per'];
    }
    return $array;
}*/
function get_card_count($id,$where){
	$sql="SELECT * FROM ".$GLOBALS['db_prefix']."card_number WHERE card_id=".$id;
	if(!empty($where)){
		$sql.=" AND ".$where;
	}
	$count=$GLOBALS['db']->getcount($sql);
	return $count;
}/*
function get_pay_count($user){
	$sql="SELECT sum(pay_money) FROM ".$GLOBALS['db_prefix']."pay WHERE pay_state=1 AND pay_game_user='".$user."'";
	$row=$GLOBALS['db']->getone($sql);
	if(!empty($row[0])){
		return $row[0];
	}
	return 0;
}*/
?>