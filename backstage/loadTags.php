<?php
#加载标签云
header('Content-type: text/html; charset=utf-8');
include_once('commonFunc/ConnMysql.php');
$conn = ConnMysql('Myblog');
if($conn == false)
{
	die("<b>请求数据有误</b>");
}else
{
	$sql = "select tag from article";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
    echo '<ul>';
	while($row = $result->fetch_row())
	{
	//	echo $row[0].'<br />'.$row[1].'<br />'.$row[2].'<br />'.$row[3].'<br />'.$row[4].'<br />'.$row[5].'<br />';	
					echo "<li><a>$row[0]</a></li>";
	}
	echo '</ul>';
	$result->close();
}
$conn->close();
?>
