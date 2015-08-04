<?php
	#连接mysql数据库,使用的是mysqli连接
function ConnMysql($database)
{
	// $mysqli = new mysqli('localhost', 'root' , 'nefu_ddos',$database);
	$mysqli = new mysqli('138.128.196.188', 'phper' , 'whatcanidoforyou',$database);
	if(mysqli_connect_error())
	{
	//$ifo = 'Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error();
	$ifo = false;
	}
	else
	{
	$ifo = $mysqli;
	}
	return $ifo;
}
?>
