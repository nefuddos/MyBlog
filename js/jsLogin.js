$(function(){
	$("#login").click(function(){
		var $username=$("#username");
		var	$pwd=$("#pwd");
		if ($username.val()!="" && $pwd.val()!="" ) {
			UserLogin($username.val(),$pwd.val());
			//alert("登录成功！");
		}else {
			if ($username.val()=="") {
				alert("用户名不能为空！");
				return false;
			}else{
				alert("密码不能为空！");
				$pwd.focus();
				return false;
			}
		}
	})
	$("#cancle").click(function(){
		$("#username").val("");
		$("#pwd").val("");
	})
});

//ajax请求登录
function UserLogin(name,pass){
   var param = "&name="+name+"&passwd="+pass;
    $.ajax({
		type:"POST",
		url:"../backstage/login.php", 
		data:param,
        async:true, //异步请求
        dataType:"json",
		success:succ,
        error:wr
	});
}

function wr()
{
      $("#divMes").html("there is wrong<br />");
}
function succ(data){
         //$("#divMes").html(data.name);
         if(data.tag){
             window.location="MyMarkdown/index.html";
         }
         else
         $("#divMes").html("用户名或密码错误<br />");
}
