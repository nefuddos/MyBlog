$(function(){
	$("#submit").click(function(){
		form();
	})
	$("#cancle").click(function(){
		$("#category").val("");
		$("#tags").val("");
		$("#writer").val("");
		$("#title").val("");
	})
});
function form()
{
    var content = $("#content").val();
	//save the .md文件,转化为html格式,然后存储在服务器中的目录中
	//在数据库中直接存放对应的 链接地址,访问的时候,直接通过js加载相应的html文件
    var param = "&cont="+content;
    $.ajax({
	type:"POST",
	url:"../backmanage/saveMD.php", 
	data:param,
    async:true, //异步请求
    dataType:"html",
	success:succeed,
    error:wr
	});	
}

function wr()
{
	alert("提交失败!!!");
}

function succeed(data)
{
	alert(data);
	$.post("../backmanage/uploadForm.php",
			{
				 url: data,
				 category : $("#category").val(),
				 tags : $("#tags").val(),
				 writer : $("#writer").val(),
				 title : $("#title").val()
			},
			function(data,status)
			{
				if(status=="success")
				{
					alert("保存成功\n");
					window.location="../../index.html";
				}else
				{
					alert("保存失败\n");
				}
			});

}
