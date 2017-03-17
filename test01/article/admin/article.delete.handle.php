<?php 
require_once('../connect.php');
$id = 0;
$id = $_REQUEST['id'];
if(isset($id)){
	echo "####".$id;
}else{
	echo "未获取到值";
}

$query = "delete from article where id = {$id};";
echo $query;
if(mysql_query($query)){
	echo "<script>alert('文件删除成功');window.location.href='article.manage.php'</script>";
}else{
	echo "文件删除失败"."<br>";
	echo mysql_error();
}

?>