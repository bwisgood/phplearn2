


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php  
	
	$un = $_GET['un'];
	$psword = $_GET['psword'];
	if($un=="bai"&&$psword=="wei"){
		echo "欢迎";
	}elseif($un == null||$un == null){
			echo "参数未填写完整";
	}else{
		echo "用户名或密码填写错误";
	}
	
	?>
<button onClick="location.href='Untitled-3.php'">
	back
</button>
</body>
</html>