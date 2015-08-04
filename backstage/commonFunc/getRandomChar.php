<?php
function getRandomChar1($length)
{
	$str = null;
	$token = "QWWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm1234567890";
	$max = strlen($token)-1;
	for($i=0;$i<$length;$i++)
	{
		$str.=$token[rand(0,$max)];
	}
	return $str;
}
?>
