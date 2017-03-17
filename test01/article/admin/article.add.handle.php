<?php
require_once('../connect.php');
//参数校验
if(!(isset($_POST['title'])&&!empty($_POST['title']))){
	echo "<script>alert('您输入的标题为空');window.location.href='article.add.php';</script>";
}
	$title = $_POST['title'];
	$author = $_POST['author'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$dateline = time();
	$query = "insert into article(title,author,description,content,dateline) values('$title','$author','$description','$content','$dateline');";
	//echo $query;
	if(mysql_query($query)){
		echo "<script>alert('文章发布成功');window.location.href='article.add.php';</script>";
	}else{
		echo mysql_error();
		//echo "<script>alert('文章发布失败');window.location.href='article.add.php';</script>";
	}
?>