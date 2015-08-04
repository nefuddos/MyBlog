<?php
#取得后台相应标签的信息
header('Content-type: text/html; charset=utf-8');
include_once('commonFunc/ConnMysql.php');
$conn = ConnMysql('Myblog');
$element = $_POST['element'];
if($conn == false)
{
	die("<b>请求数据有误</b>");
}else
{
	$sql = "select * from article where category = '$element'";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
    echo '<ul>';
	while($row = $result->fetch_row())
	{
	$filename = "$row[4]";#row[4]b表示文章的url
	$handle = fopen("http://localhost:81/$filename","rb");
	$content = fread($handle,filesize("../$filename"));
	fclose($handle);
	//	echo $row[0].'<br />'.$row[1].'<br />'.$row[2].'<br />'.$row[3].'<br />'.$row[4].'<br />'.$row[5].'<br />';	
    	echo <<<END
			<li class="content m-demo">
			<input type="hidden" value="$row[4]" id = "uid" />
		    <div class="biaoti">
		 		<h2 class="m-title">$row[2]</h2>
		    	<a class="a-title"><i>$row[0]</i></a>
		 	</div>
			<div class="article">
				<article>
					$content
				</article>
		    	<hr>
		    	<h2>评论：</h2>
		    	<textarea style="none"></textarea>
		    	<input type="button" class="s-btn" value="提交"></input>
		    	<hr><br>
		    	<img src="image/1.png" alt="">&nbsp;<h7>:楼主写的真好！</h7>
			</div>
			<div class="more">
		   		<span>author:<i>$row[3]</i>&nbsp;&nbsp;</span>
		   		<span>标签:<i>$row[1]</i></span>
		   		<a><span class="read" onclick = "getOneArticle('$filename')">Read More>></span></a>
			</div>
		</li>
END;
	}
	echo '</ul>';
	$result->close();
}
$conn->close();
?>
