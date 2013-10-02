<?php
//内容列表
if(empty($do) || $do=='content_list'){
	check_permissions("content_read");
	$channel_id=1;
	$sql="SELECT * FROM ".$db_prefix."content WHERE channel_id='".$channel_id."' and (game_id=0 or is_show_home=1)";
	if(!empty($_GET['category_id'])){
		$sql.=" AND category_id='".intval($_GET['category_id'])."'";
	}
	if(!empty($_GET['keyword'])){
		$sql.=" AND content_title like '%".trim($_GET['keyword'])."%'";
	}
	$sql.=" ORDER BY content_id DESC";
	$page_size=15;
	$page_current=isset($_GET['page'])&&is_numeric($_GET['page'])?intval($_GET['page']):1;
	$count=$db->getcount($sql);
	$res=$db->getall($sql." limit ".(($page_current-1)*$page_size).",".$page_size);
	$content_list=array();
	if($count>0){
		foreach($res as $row){
			$content_list[$row['content_id']]['id']=$row['content_id'];
			$content_list[$row['content_id']]['title']=$row['content_title'];
			$content_list[$row['content_id']]['thumb']=$row['content_thumb'];
			if(substr($row['content_thumb'],0,4)=='http'){
				$content_list[$row['content_id']]['thumb_http']=true;
			}else{
				$content_list[$row['content_id']]['thumb_http']=false;
			}
			$content_list[$row['content_id']]['password']=$row['content_password'];
			$content_list[$row['content_id']]['time']=date("Y/m/d H:i:s",$row['content_time']);
			$content_list[$row['content_id']]['comment_count']=$row['content_comment_count'];
			$content_list[$row['content_id']]['channel_id']=$row['channel_id'];
			$content_list[$row['content_id']]['category_id']=$row['category_id'];
			$content_list[$row['content_id']]['category_name']=get_category_name($row['category_id']);
			$content_list[$row['content_id']]['is_best']=$row['content_is_best'];
		}
		$parameter='action=content&channel_id='.$channel_id.'&';
		if(!empty($_GET['category_id'])){
			$parameter.="category_id='".intval($_GET['category_id'])."'";
		}
		if(!empty($_GET['keyword'])){
			$parameter.="keyword='".trim($_GET['keyword'])."'";
		}
		$pagebar=pagebar(get_self(),$parameter,$page_current,$page_size,$count);
	}else{
		$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('channel_name',get_channel_name($channel_id));
	if(check_have_category($channel_id)){
		$smarty->assign('category_list',category_option_list(0,$channel_id,0));
	}else{
		$smarty->assign('category_list','');
	}
	$smarty->assign('channel_id', $channel_id);
	$smarty->assign('content_list',$content_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('content_list.htm');
}
//内容添加
if($do=='content_add'){
	check_permissions("content_write");
	$channel_id=1;
	$content=array();
	$content['channel_id']=$channel_id;
	$content['id']=0;
	$content['title']='';
	$content['url']='';
	$content['keywords']='';
	$content['description']='';
	$content['text']='';
	$content['thumb']='';
	$content['thumb_http']='http://';
	$content['password']='';
	$content['link']=array();
	$content['attachment']=array();
	$content['is_best']=0;
	$content['is_comment']=1;
	$content['state']=1;
	$content['game_id']=0;
	$content['is_show_home']=1;
	
	$game_list = get_game_list();
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('content',$content);
	if(check_have_category($channel_id)){
		$smarty->assign('category_list',category_option_list(0,$channel_id,0));
	}else{
		$smarty->assign('category_list','');
	}
	$smarty->assign('game_list', $game_list);
	$smarty->assign('mode','insert');
	$smarty->display('content_info.htm');
}
//插入内容
if($do=='content_insert'){
	check_permissions("content_write");
	$content_id=empty($_POST['content_id'])?0:intval($_POST['content_id']);
	$content_title=empty($_POST['content_title'])?'':trim(addslashes($_POST['content_title']));
	$content_url=empty($_POST['content_url'])?'':trim(addslashes($_POST['content_url']));
	$content_keywords=empty($_POST['content_keywords'])?'':trim(addslashes($_POST['content_keywords']));
	$content_description=empty($_POST['content_description'])?'':trim(addslashes($_POST['content_description']));
	$content_text=empty($_POST['content_text'])?'':trim(addslashes($_POST['content_text']));
	$content_password=empty($_POST['content_password'])?'':trim(addslashes($_POST['content_password']));
	$content_is_best=empty($_POST['content_is_best'])?0:1;
	$content_is_comment=empty($_POST['content_is_comment'])?0:1;
	$content_state=empty($_POST['content_state'])?0:1;
	$channel_id=empty($_POST['channel_id'])?0:intval($_POST['channel_id']);
	$category_id=empty($_POST['category_id'])?0:intval($_POST['category_id']);
	$content_thumb_http=empty($_POST['content_thumb_http'])?'':trim(addslashes($_POST['content_thumb_http']));
	//$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	//$is_show_home=empty($_POST['is_show_home'])?0:intval($_POST['is_show_home']);
	if($content_title==''){
		message(array('text'=>$language['content_title_is_empty'],'link'=>''));
	}
	if($content_text==''){
		message(array('text'=>$language['content_text_is_empty'],'link'=>''));
	}
	$content_thumb=upload($_FILES['content_thumb'],false);
	$insert=array();
	$insert['content_title']=$content_title;
	$insert['content_url']=$content_url;
	$insert['content_keywords']=$content_keywords;
	$insert['content_description']=$content_description;
	$insert['content_text']=$content_text;
	$insert['content_password']=$content_password;
	if(empty($content_thumb_http)||$content_thumb_http=='http://'){
		if(!empty($content_thumb)){
			if($config['image_thumb_open']=='yes'){
				make_thumb(ROOT_PATH.'/uploads/'.$content_thumb,$config['image_thumb_width'],$config['image_thumb_height']);
			}
			$insert['content_thumb']=$content_thumb;
		}else{
			$insert['content_thumb']='';
		}
	}else{
		$insert['content_thumb']=$content_thumb_http;
	}
	$insert['content_is_best']=$content_is_best;
	$insert['content_is_comment']=$content_is_comment;
	$insert['content_state']=$content_state;
	$insert['content_time']=$_SERVER['REQUEST_TIME'];
	$insert['channel_id']=$channel_id;
	$insert['category_id']=$category_id;
	$insert['game_id']=0;
	$insert['is_show_home']=1;
	//echo $db->insert($db_prefix."content",$insert,true);exit;
	$db->insert($db_prefix."content",$insert);
	$insert_content_id=$db->insert_id();
	//插入内容连接
	if(!empty($_POST['content_link'])){
		foreach($_POST['content_link'] as $value){
			if(!empty($value)){
				$db->insert($db_prefix."content_link",array('link_url'=>$value,'content_id'=>$insert_content_id));
			}
		}
	}
	//插入内容附件
	$content_attachment=upload($_FILES['content_attachment'],true,get_channel_upload_ext($channel_id));
	foreach($content_attachment as $value){
		if(!empty($value)){
			$db->insert($db_prefix."content_attachment",array('attachment_name'=>$value,'content_id'=>$insert_content_id));
			if($config['image_text_open']=='yes'){
				make_watermark(ROOT_PATH.'/uploads/'.$value,ROOT_PATH.'/images/water.png',$config['image_pos']);
			}
		}
	}
	$attachment_list=empty($_POST['attachment_list'])?array():explode(",",$_POST['attachment_list']);
	if(count($attachment_list)>0){
		foreach($attachment_list as $value){
			if(!empty($value)){
				$db->insert($db_prefix."content_attachment",array('attachment_name'=>$value,'content_id'=>$insert_content_id));
			}
		}
	}
	admin_log('insert','content',$content_title);
	clear_cache();
	message(array('text'=>$language['content_insert_is_success'],'link'=>'?sort=game_flat&action=news&do=content_list&channel_id='.$channel_id));
}
//编辑内容
if($do=='content_edit'){
	check_permissions("content_write");
	$content_id=empty($_GET['content_id'])?0:intval($_GET['content_id']);
	$row=$db->getone("SELECT * FROM ".$db_prefix."content WHERE content_id='".$content_id."'");
	$content=array();
	$content['id']=$row['content_id'];
	$content['title']=$row['content_title'];
	$content['url']=$row['content_url'];
	$content['keywords']=$row['content_keywords'];
	$content['description']=$row['content_description'];
	$content['text']=$row['content_text'];
	$content['thumb']=$row['content_thumb'];
	if(substr($row['content_thumb'],0,4)=='http'){
		$content['thumb_http']=$row['content_thumb'];
	}
	$content['password']=$row['content_password'];
	$content['link']=get_content_link_list($content_id);
	$content['attachment']=get_content_attachment_list($content_id);
	$content['is_best']=$row['content_is_best'];
	$content['is_comment']=$row['content_is_comment'];
	$content['state']=$row['content_state'];
	$content['channel_id']=$row['channel_id'];
	$content['game_id']=0;
	$content['is_show_home']=1;
	
	$game_list = get_game_list();
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('content',$content);
	if(check_have_category($row['channel_id'])){
		$smarty->assign('category_list',category_option_list(0,$row['channel_id'],$row['category_id']));
	}else{
		$smarty->assign('category_list','');
	}
	$smarty->assign('game_list', $game_list);
	$smarty->assign('mode','update');
	$smarty->display('content_info.htm');
}
//更新内容
if($do=='content_update'){
	check_permissions("content_write");
	$content_id=empty($_POST['content_id'])?0:intval($_POST['content_id']);
	$content_title=empty($_POST['content_title'])?'':trim(addslashes($_POST['content_title']));
	$content_url=empty($_POST['content_url'])?'':trim(addslashes($_POST['content_url']));
	$content_keywords=empty($_POST['content_keywords'])?'':trim(addslashes($_POST['content_keywords']));
	$content_description=empty($_POST['content_description'])?'':trim(addslashes($_POST['content_description']));
	$content_text=empty($_POST['content_text'])?'':trim(addslashes($_POST['content_text']));
	$content_password=empty($_POST['content_password'])?'':trim(addslashes($_POST['content_password']));
	$content_is_best=empty($_POST['content_is_best'])?0:1;
	$content_is_comment=empty($_POST['content_is_comment'])?0:1;
	$content_state=empty($_POST['content_state'])?0:1;
	$channel_id=empty($_POST['channel_id'])?0:intval($_POST['channel_id']);
	$category_id=empty($_POST['category_id'])?0:intval($_POST['category_id']);
	$content_thumb_http=empty($_POST['content_thumb_http'])?'':trim(addslashes($_POST['content_thumb_http']));
	if($content_title==''){
		message(array('text'=>$language['insert_content_title_is_empty'],'link'=>''));
	}
	if($content_text==''){
		message(array('text'=>$language['insert_content_text_is_empty'],'link'=>''));
	}
	$content_thumb=upload($_FILES['content_thumb']);
	$content_thumb_old=empty($_POST['content_thumb_old'])?'':trim(addslashes($_POST['content_thumb_old']));
	$content_thumb_delete=empty($_POST['content_thumb_delete'])?'':trim(addslashes($_POST['content_thumb_delete']));
	//$game_id=empty($_POST['game_id'])?0:intval($_POST['game_id']);
	//$is_show_home=empty($_POST['is_show_home'])?0:intval($_POST['is_show_home']);
	
	$update=array();
	$update['content_title']=$content_title;
	$update['content_url']=$content_url;
	$update['content_keywords']=$content_keywords;
	$update['content_description']=$content_description;
	$update['content_text']=$content_text;
	$update['content_password']=$content_password;
	if(empty($content_thumb_http)||$content_thumb_http=='http://'){
		if(!empty($content_thumb)){
			if(!empty($content_thumb_old)){//If something thumbnail delete
				@unlink(ROOT_PATH."/uploads/".$content_thumb_old);
			}
			if($config['image_thumb_open']=='yes'){//If set to generate thumbnail is generated
				make_thumb(ROOT_PATH.'/uploads/'.$content_thumb,$config['image_thumb_width'],$config['image_thumb_height']);
			}
			$update['content_thumb']=$content_thumb;
		}
	}else{
		$update['content_thumb']=$content_thumb_http;
	}
	if(!empty($content_thumb_delete)){//If forced deletion shrinkage plan deleted
		@unlink(ROOT_PATH."/uploads/".$content_thumb_delete);
		$update['content_thumb']='';
	}

	$update['content_is_best']=$content_is_best;
	$update['content_is_comment']=$content_is_comment;
	$update['content_state']=$content_state;
	$update['category_id']=$category_id;
	//print_r($update);exit;
	$db->update($db_prefix."content",$update,"content_id='".$content_id."'");
	$content_link_count=empty($_POST['content_link_count'])?array():explode(",",$_POST['content_link_count']);
	foreach($content_link_count as $value){
		if(!empty($value)){
			$db->update($db_prefix."content_link",array('link_url'=>trim($_POST['content_link_'.$value])),"link_id='".$value."'");
		}
	}
	if(!empty($_POST['content_link_delete'])){//删除连接
		foreach($_POST['content_link_delete'] as $value){
			if(!empty($value)){
				$db->delete($db_prefix."content_link","link_id='".$value."'");
			}
		}
	}

	if(!empty($_POST['content_attachment_delete'])){//删除附件
		foreach($_POST['content_attachment_delete'] as $value){
			if(!empty($value)){
				$row=$db->getone("SELECT attachment_name FROM ".$db_prefix."content_attachment WHERE attachment_id='".$value."'");
				@unlink(ROOT_PATH."/uploads/".$row['attachment_name']);
				$db->delete($db_prefix."content_attachment","attachment_id='".$value."'");
			}
		}
	}
	if(!empty($_POST['content_link'])){//插入内容连接
		foreach($_POST['content_link'] as $value){
			if(!empty($value)){
				$db->insert($db_prefix."content_link",array('link_url'=>$value,'content_id'=>$content_id));
			}
		}
	}
	//插入内容附件
	$content_attachment=upload($_FILES['content_attachment'],true,get_channel_upload_ext($channel_id));
	//print_r($content_attachment);exit;
	foreach($content_attachment as $value){
		if(!empty($value)){
			$db->insert($db_prefix."content_attachment",array('attachment_name'=>$value,'content_id'=>$content_id));
			if($config['image_text_open']=='yes'){
				make_watermark(ROOT_PATH.'/uploads/'.$value,ROOT_PATH.'/images/water.png',$config['image_pos']);
			}
		}
	}
	$attachment_list=empty($_POST['attachment_list'])?array():explode(",",$_POST['attachment_list']);
	if(count($attachment_list)>0){
		foreach($attachment_list as $value){
			if(!empty($value)){
				$db->insert($db_prefix."content_attachment",array('attachment_name'=>$value,'content_id'=>$content_id));
			}
		}
	}
	admin_log('update','content',$content_title);
	clear_cache();
	message(array('text'=>$language['content_update_is_success'],'link'=>'?sort=game_flat&action=news&do=content_list&channel_id='.$channel_id));
}
//删除内容
if($do=='content_delete'){
	check_permissions("content_delete");
	$content_id=empty($_POST['content_id'])?array():$_POST['content_id'];
	$channel_id=empty($_POST['channel_id'])?array():$_POST['channel_id'];
	foreach($content_id as $value){
		if(!empty($value)){
			//判断内容是否有缩图，有就删除
			$row=$db->getone("SELECT content_thumb FROM ".$db_prefix."content WHERE content_id='".$value."'");
			if(!empty($row['content_thumb'])){
				@unlink(ROOT_PATH."/uploads/".$row['content_thumb']);
			}
			//提取该内容附属的附件文件名并删除
			$res=$db->getall("SELECT attachment_name FROM ".$db_prefix."content_attachment WHERE content_id='".$value."'");
			foreach($res as $row){
				@unlink(ROOT_PATH."/uploads/".$row['attachment_name']);
			}
			$db->delete($db_prefix."content_link","content_id=".$value."");
			$db->delete($db_prefix."content_attachment","content_id=".$value."");
			$db->delete($db_prefix."content_comment","content_id=".$value."");
			$db->delete($db_prefix."content","content_id=".$value."");
		}
	}
	admin_log('batch_delete','content','');
	clear_cache();
	message(array('text'=>$language['content_delete_is_success'],'link'=>'?sort=game_flat&action=news&channel_id='.$channel_id));
}
//批量设置推荐
if($do=='best_yes'){
	check_permissions("content_read");
	$content_id=empty($_POST['content_id'])?array():$_POST['content_id'];
	$channel_id=empty($_POST['channel_id'])?array():$_POST['channel_id'];
	foreach($content_id as $value){
		if(!empty($value)){
			$db->update($db_prefix."content",array('content_is_best'=>1),"content_id=".$value."");
		}
	}
	clear_cache();
	message(array('text'=>$language['batch_is_success'],'link'=>'?sort=game_flat&action=news&channel_id='.$channel_id));
}
//批量取消推荐
if($do=='best_no'){
	check_permissions("content_read");
	$content_id=empty($_POST['content_id'])?array():$_POST['content_id'];
	$channel_id=empty($_POST['channel_id'])?array():$_POST['channel_id'];
	foreach($content_id as $value){
		if(!empty($value)){
			$db->update($db_prefix."content",array('content_is_best'=>0),"content_id=".$value."");
		}
	}
	clear_cache();
	message(array('text'=>$language['batch_is_success'],'link'=>'?sort=game_flat&action=news&channel_id='.$channel_id));
}
//评论列表
if($do=='comment_list'){
	check_permissions("comment_read");
	$sql="SELECT * FROM ".$db_prefix."content_comment WHERE 1=1";
	if(!empty($_GET['content_id'])){
		$sql.=" AND content_id='".intval($_GET['content_id'])."'";
	}
	$sql.=" AND parent_id=0 ORDER BY comment_id DESC";
	$page_size=15;
	$page_current=isset($_GET['page'])&&is_numeric($_GET['page'])?intval($_GET['page']):1;
	$count=$db->getcount($sql);
	$res=$db->getall($sql." limit ".(($page_current-1)*$page_size).",".$page_size);
	$comment_list=array();
	if($count>0){
		foreach($res as $row){
			$comment_list[$row['comment_id']]['id']=$row['comment_id'];
			$comment_list[$row['comment_id']]['content']=encode_comment($row['comment_content']);
			$comment_list[$row['comment_id']]['reply']=$row['comment_reply'];
			$comment_list[$row['comment_id']]['ip']=$row['comment_ip'];
			$comment_list[$row['comment_id']]['agent']=$row['comment_agent'];
			$comment_list[$row['comment_id']]['time']=date("Y/m/d H:i:s",$row['comment_time']);
			$comment_list[$row['comment_id']]['content_id']=$row['content_id'];
			$comment_list[$row['comment_id']]['state']=$row['comment_state'];
		}
		$parameters="";
		$parameters.="action=content&";
		$parameters.="do=comment_list&";
		if(!empty($_GET['content_id'])){
			$parameters.="content_id=".intval($_GET['content_id'])."&";
		}
		$pagebar=pagebar(get_self(),$parameters,$page_current,$page_size,$count);
	}else{
		$pagebar="";
	}
	$smarty=new smarty();smarty_header();
	$smarty->assign('comment_list',$comment_list);
	$smarty->assign('pagebar',$pagebar);
	$smarty->display('content_comment_list.htm');
}
//编辑评论
if($do=='comment_edit'){
	check_permissions('comment_write');
	$comment_id=isset($_GET['comment_id'])?intval($_GET['comment_id']):'';
	$row=$db->getone("SELECT * FROM ".$db_prefix."content_comment WHERE comment_id='$comment_id'");
	$comment=array();
	$comment['id']=$row['comment_id'];
	$comment['content_title']=get_content_title($row['content_id']);
	$comment['ip']=$row['comment_ip'];
	$comment['ip_address']=get_ip_address($row['comment_ip']);
	$comment['content']=$row['comment_content'];
	$comment['reply']=$row['comment_reply'];
	$comment['time']=date("Y-m-d H:i:s",$row['comment_time']);
	$comment['state']=$row['comment_state'];
	$comment['content_id']=$row['content_id'];
	$comment_list=array();
	$sql="SELECT * FROM ".$db_prefix."content_comment WHERE parent_id=".$row['comment_id'];
	$res=$db->getall($sql);
	foreach($res as $row){
			$comment_list[$row['comment_id']]['id']=$row['comment_id'];
			$comment_list[$row['comment_id']]['content']=$row['comment_content'];
			$comment_list[$row['comment_id']]['reply']=$row['comment_reply'];
			$comment_list[$row['comment_id']]['ip']=$row['comment_ip'];
			$comment_list[$row['comment_id']]['agent']=$row['comment_agent'];
			$comment_list[$row['comment_id']]['time']=date("Y/m/d H:i:s",$row['comment_time']);
			$comment_list[$row['comment_id']]['content_id']=$row['content_id'];
		}
	$smarty=new smarty();smarty_header();
	$smarty->assign('comment',$comment);
	$smarty->assign('comment_list',$comment_list);
	$smarty->assign('mode','update');
	$smarty->display('content_comment_info.htm');
}
//更新评论
if($do=='comment_update'){
	check_permissions('comment_write');
	$comment_id=empty($_POST['comment_id'])?0:intval($_POST['comment_id']);
	$comment_content=empty($_POST['comment_content'])?'':addslashes(trim($_POST['comment_content']));
	$comment_reply=empty($_POST['comment_reply'])?'':addslashes(trim($_POST['comment_reply']));

	$comment_state=empty($_POST['comment_state'])?0:intval($_POST['comment_state']);
	$update=array();
	$update['comment_content']=$comment_content;
	$update['comment_reply']=$comment_reply;
	$update['comment_state']=$comment_state;
	$db->update($db_prefix."content_comment",$update,"comment_id=$comment_id");
	admin_log('update','comment','');
	clear_cache();
	message(array('text'=>$language['comment_update_is_success'],'link'=>'?sort=game_flat&action=news&do=comment_list'));
}
//删除内容
if($do=='comment_delete'){
	check_permissions("comment_delete");
	$comment_id=empty($_POST['comment_id'])?array():$_POST['comment_id'];
	foreach($comment_id as $value){
		if(!empty($value)){
			$row=$db->getone("SELECT * FROM ".$db_prefix."content_comment WHERE comment_id='$value'");
			$db->query("UPDATE ".$db_prefix."content SET content_comment_count=content_comment_count-1 WHERE content_id=".$row['content_id']."");
			$db->delete($db_prefix."content_comment","comment_id=".$value."");
		}
	}
	admin_log('batch_delete','comment','');
	clear_cache();
	message(array('text'=>$language['comment_delete_is_success'],'link'=>'?sort=game_flat&action=news&do=comment_list'));
}
?>