<?php
#向数据表中插入数据,包括,rul,writer,tags,category,time
header('Content-type: text/html; charset=utf-8');
include_once('../../backstage/commonFunc/ConnMysql.php');
$conn = ConnMysql('Myblog');
if($conn == false)
{
	die("<b>请求数据有误</b>");
}else
{
	$url = $_POST['url'];
	$category = $_POST['category'];
	$tags = $_POST['tags'];
	$title = $_POST['title'];
	$writer = $_POST['writer'];
	$publish_time = date('y-m-d');
	$sql = "insert into article(author,category,Content,publish_time,tag,title) values('".$writer."'".
	",'".$category."','".$url."','".$publish_time."','".$tags."','".$title."')";
//	echo $sql;
//	print_r($conn);
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if($result == true)
	{
		echo "succeed";
	}else
	{
		echo "failed";
	}
	$conn->close();
}
//$conn->close();
?>
