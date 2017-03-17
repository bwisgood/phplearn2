
<?php
	require_once("../connect.php");
	$id = $_POST['id'];
	if(isset($id)){
		echo "id的值为:".$id;
	}

	$res = mysql_query("select * from article where id = {$id};");
	$data = mysql_fetch_assoc($res);
	print_r($data);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>

	<table width="100%" height="100%" cellpadding="5" cellspacing="0" border="1px solid black">
		<tr height="50px">
			
			<td>文章修改系统</td>
		</tr>
		<tr height="500px">
			<td>
				<input type="button" name="act" value="manage" /><br>
				<input type="submit" name="act" value="upload" />
			</td>
			
			<!-- 表单 -->
<form method="post" action="article.modify.handle.php">
			<td>
				修改文章
				<br>
				标题<input type="text" maxlength="20" name="title" value="<?php echo $data['title'];?>" /><br>
				作者<input type="text" maxlength="20" name="author" value="<?php echo $data['author'];?>" /><br>
				简介<textarea rows="5" cols="20" name="description"><?php echo $data['description'];?></textarea><br>
				内容<textarea rows="20" cols="50" name="content"><?php echo $data['content'];?></textarea>
				<br><input type="submit" name="act" value="修改" />
			</td>
		</tr>
	</table>
</form>
</body>
</html>