function pageload(element)
{
	//直接根据element响应到后台,提取数据好了
	    $.ajax({
		type:"POST",
		url:"backstage/getArticle.php",
		data:"element="+element,
        async:true, //异步请求
        dataType:"html",
		success:succGetArticle,
        error:wrGetArticle
	});
}

function succGetArticle(data)
{
$("#rjg").html(data);
}

function wrGetArticle()
{
	$("#rjg").html("服务器错误");
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//load the Title
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function loadTitle()
{
	 $.ajax({
		type:"POST",
		url:"backstage/loadTitle.php",
		//data:"element="+element,
        async:true, //异步请求
        dataType:"html",
		success:succGetTitle,
        error:wrGetTitle
	});
}

function succGetTitle(data)
{
$("#Title").html(data);
}

function wrGetTitle()
{
	$("#Title").html("服务器错误");
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//load the catagory
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function loadCategory()
{
	 $.ajax({
		type:"POST",
		url:"backstage/loadCategory.php",
		//data:"element="+element,
        async:true, //异步请求
        dataType:"html",
		success:succGetCategory,
        error:wrGetCategory
	});
}

function succGetCategory(data)
{
$("#catagory").html(data);
}

function wrGetCategory()
{
	$("#catagory").html("服务器错误");
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//load the newest comment
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

function loadComment()
{
	 $.ajax({
		type:"POST",
		url:"backstage/loadComment.php",
		//data:"element="+element,
        async:true, //异步请求
        dataType:"html",
		success:succGetComment,
        error:wrGetComment
	});
}

function succGetComment(data)
{
$("#comment").html(data);
}

function wrGetComment()
{
	$("#comment").html("服务器错误");
}

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//load the tags
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
function loadTags()
{
	 $.ajax({
		type:"POST",
		url:"backstage/loadTags.php",
		//data:"element="+element,
        async:true, //异步请求
        dataType:"html",
		success:succGetTags,
        error:wrGetTags
	});
}

function succGetTags(data)
{
$("#tags").html(data);
}

function wrGetTags()
{
	$("#tags").html("服务器错误");
}


function getOneArticle(filename){
		    $.ajax({
				type:"POST",
				url:"backstage/loadArticle.php",
				data:"uid="+filename,
				async:true, //异步请求
				dataType:"html",
				success:succLoadArticle,
				error:wrLoadArticle
			});
}

function succLoadArticle(data)
{
$("#rjg").html(data);
}
function wrLoadArticle()
{
		$("#rjg").html("服务器错误");
}