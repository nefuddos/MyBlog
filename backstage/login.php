<?php
#验证登录是否正确
#使用commonFunc中的ConnMysql函数
header('Content-type: application/json');
include_once('commonFunc/ConnMysql.php');
$array_ifo = array(
"tag"=>false,
);
$conn = ConnMysql('Myblog');
if($conn == false)
{
//	die($conn);
	$array_ifo["tag"] = false;
}else
{
	$name =$_POST['name'];
	$passwd =$_POST['passwd'];
//$name = 'rjg';
//$passwd = '12345';

$sql ="select 1 from writer where name = '".$name."' and passwd = md5('".$passwd."')";
$result = $conn->query($sql);
$row = $result->fetch_row();
//print_r($row);
if($row[0] != "1")
{
	$array_ifo["tag"] = false;
}else
{
		$now_login_time = date('y-m-d');
		if(!$conn->query("update writer set last_login_time = date('$now_login_time') where name = '$name'"))
		$array_ifo["tag"] = false;
		else
		$array_ifo["tag"] = true;
}
	$result->close();
	$conn->close();
}
echo json_encode($array_ifo);
?>

