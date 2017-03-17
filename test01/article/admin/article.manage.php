<?php
require_once("../connect.php");
$query = "select * from article";
$res = mysql_query($query);

while($row = mysql_fetch_assoc($res)){
	$data[] = $row;
}
print_r($data);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>
<script>
//	function actEdit(){
//		document.form1.action = "article.modify.php";
//		document.form1.submit();
//	}
//	function actDelete(){
//		document.form1.action = "article.delete.handle.php";
//		document.form1.submit();
//	}
	
	
	</script>
<body>
<div>
	<div>文章后台管理系统</div>
	<?php
	if(!empty($data)){
	foreach($data as $key=>$value){
		echo $key."----".$value."<br>";
		//echo $value['id']."<br>";
		?>
		
		
		<div>
			<form name="form1" method="post" action="article.modify.php">
				<span><b>编号：<?php echo $value['id']; ?></b></span>
				<span title="<?php echo $value['description']; ?>">标题：<?php echo $value['title']; ?></span>
				<input type="hidden" name="id" value="<?php echo $value['id'];?>" />
				<input type = "submit" value="修改"/>
				<!--<input type="button" value="删除" onClick="actDelete()" /> -->
			</form>
			<form name="form2" method = "post" action="article.delete.handle.php">
				
				<input type="hidden" value="<?php echo $value['id'];?>" name="id" />
				<input type = "submit" value="删除"/>
			</form>
		</div>
	<?php 
	}
}
	
	?>
	
</div>
</body>
</html>