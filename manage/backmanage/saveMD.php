<?php
#将content文件的内容保存为本地磁盘中的.md文件
	header("Content-type: text/html; charset=utf-8");
	include_once('../../backstage/commonFunc/getRandomChar.php');
	$randomStr = getRandomChar1(20);
	$content = $_POST['cont'];
	$handle = fopen("../resource/essay/v_$randomStr.md","wb");
	if($handle == true)
	{
		$handle_write = fwrite($handle,$content);
		if($handle_write == false)
		{
			die("写入失败");
		}
		else
		{
			echo $_SERVER['HTTP_HOST'].'/manage/resource/essay/v_'.$randomStr.'.md';
		}
	}
	fclose($handle);
?>
