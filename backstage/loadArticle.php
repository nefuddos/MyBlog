<?php
#取得后台相应标签的信息
header('Content-type: text/html; charset=utf-8');
include_once('commonFunc/ConnMysql.php');
$conn = ConnMysql('Myblog');
$url = $_POST['uid'];
if($conn == false)
{
	die("<b>请求数据有误</b>");
}else
{
	$sql = "select * from article where content = '$url'";
	$conn->set_charset("utf8");
	$result = $conn->query($sql);
	if($row = $result->fetch_row())
	{
	$filename = "$row[4]";#row[4]b表示文章的url
	$handle = fopen("http://localhost:81/$filename","rb");
	$content = fread($handle,filesize("../$filename"));
	fclose($handle);
	//	echo $row[0].'<br />'.$row[1].'<br />'.$row[2].'<br />'.$row[3].'<br />'.$row[4].'<br />'.$row[5].'<br />';	
    	echo <<<END
		    <div class="biaoti">
		 		<h2 class="m-title">$row[2]</h2>
		    	<a class="a-title"><i>$row[0]</i></a>
		 	</div>
				<article>
					<div id="md-view">
					<textarea id = "append-test" style="display:none;">$content</textarea>
					</div>
				</article>
        <script type="text/javascript">//显示.md文件的内容
			var  testEditormdView2;

            $(function() {

                    
                testEditormdView2 = editormd.markdownToHTML("md-view", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,              // 默认不解析
                    flowChart       : true,         // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                });
            });
        </script>
		    	<hr>
		    	<h2>评论：</h2>
		    	<textarea style="none"></textarea>
		    	<input type="button" class="s-btn" value="提交"></input>
		    	<hr><br>
		    	<img src="image/1.png" alt="">&nbsp;<h7>:楼主写的真好！</h7>
			<div class="more">
		   		<span>author:<i>$row[3]</i>&nbsp;&nbsp;</span>
		   		<span>标签:<i>$row[1]</i></span>
		   		<a><span class="read" id="readmore">Read More>></span></a>
			</div>
END;
}
$result->close();
$conn->close();
}
?>
