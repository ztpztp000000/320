<?php
if($do=='')
{
	$smarty=new smarty();smarty_header();
	$smarty->display('game_flat.html');
}
// 平台管理, 默认显示站点参数
if($do=='info')
{
	check_permissions('config');
	$tempdate_dir=$language_dir=array();
	if($handle=opendir("../templates")){
		$i=1;
		while(false!==($dir=readdir($handle))){
			if ($dir!="."&&$dir!=".."&&$dir!="admin"){
				if(is_dir("../templates/".$dir)){
					$tempdate_dir[$i]['no']=$i;
					$tempdate_dir[$i]['folder']=$dir;
					$tempdate_dir[$i]['thumb']="../templates/".$dir."/thumb.png";
					$tempdate_dir[$i]['info']=file_get_contents("../templates/".$dir."/info.txt");
					$i++;
				}
			}

		}
		closedir($handle);
	}
	if($handle=opendir("../languages")){
		$i=1;
		while(false!==($dir=readdir($handle))){
			if ($dir!="."&&$dir!=".."){
				if(is_dir("../languages/".$dir)){
					$language_dir[$i]['no']=$i;
					$language_dir[$i]['folder']=$dir;
					$language_dir[$i]['info']=file_get_contents("../languages/".$dir."/info.txt");
					$i++;
				}
			}
		}
		closedir($handle);
	}
	$smarty=new smarty();smarty_header();
	//var_dump($language_dir);exit;
	$smarty->assign("config",$config);
	$smarty->assign("template_dir",$tempdate_dir);
	$smarty->assign("language_dir",$language_dir);
	
	$smarty->display('config.html');
}
//更新系统配置处理
if($do=='config_update'){
	check_permissions('config');
	$site_name=empty($_POST['site_name'])?'':trim($_POST['site_name']);
	$update=array();
	//基本设置
	$update['site_name']=$site_name;
	$update['site_icp']=empty($_POST['site_icp'])?'':trim($_POST['site_icp']);
	$update['site_keywords']=empty($_POST['site_keywords'])?'':addslashes(trim($_POST['site_keywords']));
	$update['site_description']=empty($_POST['site_description'])?'':addslashes(trim($_POST['site_description']));
	$update['site_notice']=empty($_POST['site_notice'])?'':trim($_POST['site_notice']);
	$update['site_state']=empty($_POST['site_state'])?'no':trim($_POST['site_state']);
	$update['site_close_text']=empty($_POST['site_close_text'])?'':trim($_POST['site_close_text']);
	$update['site_ip']=empty($_POST['site_ip'])?'':trim($_POST['site_ip']);
	$update['site_badwords']=empty($_POST['site_badwords'])?'':trim($_POST['site_badwords']);
	$update['site_language']=empty($_POST['site_language'])?'chinese':$_POST['site_language'];
	$update['site_template']='kele';//empty($_POST['site_template'])?'default':$_POST['site_template'];
	//控制设置
	$update['online_time']=empty($_POST['online_time'])?30:intval($_POST['online_time']);
	$update['rewrite_state']=empty($_POST['rewrite_state'])?'no':trim($_POST['rewrite_state']);
	$update['feedback_state']=empty($_POST['feedback_state'])?'no':trim($_POST['feedback_state']);
	$update['feedback_size']=empty($_POST['feedback_size'])?'no':trim($_POST['feedback_size']);
	$update['comment_state']=empty($_POST['comment_state'])?'no':trim($_POST['comment_state']);
	$update['member_state']=empty($_POST['member_state'])?'no':trim($_POST['member_state']);
	$update['member_validation_state']=empty($_POST['member_validation_state'])?'no':$_POST['member_validation_state'];
	//显示设置
	$update['index_comment_size']=empty($_POST['index_comment_size'])?10:intval($_POST['index_comment_size']);
	$update['index_comment_content_size']=empty($_POST['index_comment_content_size'])?18:intval($_POST['index_comment_content_size']);	$update['content_hot_size']=empty($_POST['content_hot_size'])?10:intval($_POST['content_hot_size']);
	$update['content_hot_title_size']=empty($_POST['content_hot_title_size'])?18:intval($_POST['content_hot_title_size']);
	$update['content_best_size']=empty($_POST['content_best_size'])?10:intval($_POST['content_best_size']);
	$update['content_best_title_size']=empty($_POST['content_best_title_size'])?18:intval($_POST['content_best_title_size']);
	$update['comment_size']=empty($_POST['comment_size'])?10:intval($_POST['comment_size']);
	$update['search_size']=empty($_POST['search_size'])?10:intval($_POST['search_size']);

	//邮件服务器设置
	$update['smtp_server']=empty($_POST['smtp_server'])?'':addslashes(trim($_POST['smtp_server']));
	$update['smtp_port']=empty($_POST['smtp_port'])?'':addslashes(trim($_POST['smtp_port']));
	$update['smtp_user']=empty($_POST['smtp_user'])?'':addslashes(trim($_POST['smtp_user']));
	$update['smtp_password']=empty($_POST['smtp_password'])?'':addslashes(trim($_POST['smtp_password']));
	//水印缩图设置
	$update['image_thumb_open']=empty($_POST['image_thumb_open'])?'no':addslashes(trim($_POST['image_thumb_open']));
	$update['image_thumb_width']=empty($_POST['image_thumb_width'])?100:intval($_POST['image_thumb_width']);
	$update['image_thumb_height']=empty($_POST['image_thumb_height'])?100:intval($_POST['image_thumb_height']);
	$update['image_text_open']=empty($_POST['image_text_open'])?'no':addslashes(trim($_POST['image_text_open']));
	$update['image_pos']=empty($_POST['image_pos'])?1:intval($_POST['image_pos']);
	if($update['rewrite_state']=='yes'){
		if(strpos(strtolower($_SERVER['SERVER_SOFTWARE']),'microsoft-iis/7')){
			$rewrite='<?xml version="1.0" encoding="UTF-8"?>
<configuration>
    <system.webServer>
        <rewrite>
            <rules>
                <rule name="index">
                    <match url="^index.html$" />
                    <action type="Rewrite" url="index.php" />
                </rule>
                <rule name="index">
                    <match url="^sitemap.xml$" />
                    <action type="Rewrite" url="sitemap.php" />
                </rule>
                <rule name="content">
                    <match url="^content-([0-9]+).html$" />
                    <action type="Rewrite" url="content.php?id={R:1}" />
                </rule>
                <rule name="content-page">
                    <match url="^content-([0-9]+)-([0-9]+).html$" />
                    <action type="Rewrite" url="content.php?id={R:1}&amp;page={R:2}" />
                </rule>
                <rule name="page">
                    <match url="^page-([0-9]+).html$" />
                    <action type="Rewrite" url="page.php?id={R:1}" />
                </rule>
                <rule name="channel">
                    <match url="^channel-([0-9]+).html$" />
                    <action type="Rewrite" url="channel.php?id={R:1}" />
                </rule>
                <rule name="channel-page">
                    <match url="^channel-([0-9]+)-p([0-9]+).html$" />
                    <action type="Rewrite" url="channel.php?id={R:1}&amp;page={R:2}" />
                </rule>
                <rule name="channel-category">
                    <match url="^channel-([0-9]+)-([0-9]+).html$" />
                    <action type="Rewrite" url="channel.php?id={R:1}&amp;category_id={R:2}" />
                </rule>
                <rule name="channel-category-page">
                    <match url="^channel-([0-9]+)-([0-9]+)-p([0-9]+).html$" />
                    <action type="Rewrite" url="channel.php?id={R:1}&amp;category_id={R:2}&amp;page={R:3}" />
                </rule>
                <rule name="feedback">
                    <match url="^feedback.html$" />
                    <action type="Rewrite" url="feedback.php" />
                </rule>
                <rule name="feedback-page">
                    <match url="^feedback-([0-9]+).html$" />
                    <action type="Rewrite" url="feedbackphp?page={R:1}" />
                </rule>
            </rules>
        </rewrite>
    </system.webServer>
</configuration>';
		@file_put_contents('./web.config',$rewrite);
		}else{
			if(!file_exists('.htaccess')){
				$rewrite="RewriteEngine On\n";
				/*$rewrite.="RewriteRule ^sitemap.xml\$ sitemap.php\n";
				$rewrite.="RewriteRule ^index.html\$ index.php\n";
				$rewrite.="RewriteRule ^content-([0-9]+).html\$ content.php?id=\$1\n";
				$rewrite.="RewriteRule ^content-([0-9]+)-([0-9]+).html\$ content.php?id=\$1&page=$2\n";
				$rewrite.="RewriteRule ^page-([0-9]+).html\$ page.php?id=\$1\n";
				$rewrite.="RewriteRule ^channel-([0-9]+).html\$ channel.php?id=\$1\n";
				$rewrite.="RewriteRule ^channel-([0-9]+)-p([0-9]+).html\$ channel.php?id=\$1&page=\$2\n";
				$rewrite.="RewriteRule ^channel-([0-9]+)-([0-9]+).html\$ channel.php?id=\$1&category_id=\$2\n";
				$rewrite.="RewriteRule ^channel-([0-9]+)-([0-9]+)-p([0-9]+)\.html\$ channel.php?id=\$1&category_id=\$2&page=\$3\n";
				$rewrite.="RewriteRule ^feedback.html\$ feedback.php\n";
				$rewrite.="RewriteRule ^feedback-([0-9]+).html\$ feedback.php?page=\$1";*/
				
				$rewrite.="RewriteRule ^index.html\$ index.php\n";
				$rewrite.="RewriteRule ^game.html\$ game.php\n";
				$rewrite.="RewriteRule ^news-([0-9]+).html\$ news.php?id=\$1\n";
				$rewrite.="RewriteRule ^news-([0-9]+)-p([0-9]+).html\$ news.php?id=\$1&page=\$2\n";
				$rewrite.="RewriteRule ^content-([0-9]+).html\$ content.php?id=\$1\n";
				$rewrite.="RewriteRule ^content-([0-9]+)-([0-9]+).html\$ content.php?id=\$1&page=$2\n";
				$rewrite.="RewriteRule ^user.html\$ user.php\n";
				$rewrite.="RewriteRule ^pay.html\$ pay.php\n";
				$rewrite.="RewriteRule ^card.html\$ card.php\n";
				$rewrite.="RewriteRule ^reg.html\$ reg.php\n";
				$rewrite.="RewriteRule ^login.html\$ login.php";
				@file_put_contents('./.htaccess',$rewrite);
				@chmod('./.htaccess',0644);
			}
		}
	}else{
		if(file_exists('.htaccess')){
			@unlink("./.htaccess");
		}
	}
	$config_value=base64_encode(serialize($update));
	$db->update($db_prefix."config",array('config_value'=>$config_value),"config_type='config'");
	clear_cache();
	admin_log('update','config','');
	message(array('text'=>$language['config_update_is_success'],'link'=>'?sort=game_flat'));
}
?>