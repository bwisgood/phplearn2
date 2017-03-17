<?php 
require_once("../connect.php");
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$content = $_POST['content'];
$query = "update article set title = '$title',author = '$author',description = '$description',content = '$content' where id = 3";
if(mysql_query($query)){
	echo "<script> alert('文章修改成功');window.location.href='article.modify.php';</script>"."修改行数".mysql_affected_rows($con);
}else{
	echo mysql_error();
	//echo "<script> alert('文章修改失败');window.location.href='article.modify.php';</script>";
}
?>