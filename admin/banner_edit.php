<?php
if (empty($action))
{
	check_permissions('channel_read');
	
	$xml = simplexml_load_file(ROOT_PATH.'/slideshow.xml');

	$banner_list = array();
	$n = 0;
	foreach($xml->slideshow as $slideshow)
	{
		$banner_list[$n]['id'] = $n;
		$banner_list[$n]['website'] = $slideshow->web_address;
		$banner_list[$n]['pic'] = $slideshow->picture_path;
		$banner_list[$n]['pic_mini'] = $slideshow->picture_path2;
		++$n;
	}
	
	$smarty=new smarty();smarty_header();
	$smarty->assign('banner_list', $banner_list);
	$smarty->display('banner_edit.html');
}

if ('update' == $action)
{
	$id = intval($_GET['id']);
	$webiste = empty($_POST['website_'.$id])?'':addslashes(trim($_POST['website_'.$id]));
	$pic = banner_pic_upload($_FILES['pic_'.$id], $id);
	$pic_mini = banner_pic_upload($_FILES['pic_mini_'.$id], $id, 1);
	
	if (!empty($pic))
	{
		$pic = "/uploads/banner/".$pic;
	}
	if (!empty($pic_mini))
	{
		$pic_mini = "/uploads/banner/".$pic_mini;
	}
	
	save_banner($id, $webiste, $pic, $pic_mini);
	
	message(array('text'=>'更新成功！','link'=>'?sort=banner'));
}
function save_banner($id, $website, $pic, $pic_mini)
{
	$xml = simplexml_load_file(ROOT_PATH.'/slideshow.xml');
	if (!empty($pic))
	{
		$xml->slideshow[$id]->picture_path = $pic;
	}
	if (!empty($pic_mini))
	{
		$xml->slideshow[$id]->picture_path2 = $pic_mini;
	}
	if (!empty($website))
	{
		$xml->slideshow[$id]->web_address = $website;
	}
	$xml->asXML(ROOT_PATH.'/slideshow.xml');
}

function banner_pic_upload($upload, $id, $mini=0)
{
	$ext='jpg,gif,png';
	$get_ext=get_ext($upload['name']);
	
	$filename = "";
	if(!check_ext($get_ext,$ext))
	{
		return $filename;
	}
	if (1 == $mini)
	{
		$name = "pic_mini_".$id.".".$get_ext;
	}
	else
	{
		$name = "pic_".$id.".".$get_ext;
	}
	if (upload_move_file($upload['tmp_name'],ROOT_PATH.'/uploads/banner/'.$name))
	{
		$filename=$name;
	}
	
	return $filename;
}
?>