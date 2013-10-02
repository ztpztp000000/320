<?php
/**
 * �ļ�������
*/
class fileoperate{
	var $path;// �ļ�·��
	var $name;//�ļ���
	var $result;//���ļ�������Ľ��
	
	/**
	* ��ȡĿ¼���ļ��б�
	* switchΪ2ֻ�г�Ŀ¼��switchΪ3ֻ�г��ļ�
	*/
	function list_file($path, $switch) {
		if (file_exists($path)) {
			$result=array();
			$dir = scandir($path);
			if ($switch == 1) {
				for ($i = 0; $i < count($dir); $i++) {
					if ($dir[$i] != "." && $dir[$i] != "..") {
						//echo "<div>".$dir[$i]."</div>";
						$result[]=$dir[$i];
					}
				}
			}
			if ($switch == 2) {
				for ($i = 0; $i < count($dir); $i++) {
					$x = is_dir($path.$dir[$i]);
					if ($dir[$i] != "." && $dir[$i] != ".." && $x == true) {
						//echo "<div>".$dir[$i]."</div>";
						$result[]=$dir[$i];
					}
				}
			}
			if ($switch == 3) {
				for ($i = 0; $i < count($dir); $i++) {
					$x = is_dir($path.$dir[$i]);
					if ($dir[$i] != "." && $dir[$i] != ".." && $x == false) {
						//echo "<div>".$dir[$i]."</div>";
						$result[]=$dir[$i];
					}
				}
			}
			return $result;
		}
	}
	
	/**
	* ��ȡ�ļ�����
	*/
	function read_file($path) {
		if (file_exists($path)) {
			$content = file_get_contents($path);
			return $content;
		}
	}

	/**
	* �޸��ļ�����
	*/
	function write_file($path, $content) {
		if (file_exists($path)) {
			$handle = fopen($path, 'w');
			if (fwrite($handle, $content));
			return true;
		}
	}
}
?>