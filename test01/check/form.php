<?php
session_start();

if(isset($_REQUEST['usercode'])){
	if($_SESSION['authcode']==strtolower($_REQUEST['usercode'])){
		echo "验证通过";
		
	}else{
		echo "验证失败";
	}
	exit();
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<form action="form.php" method="post">
		<p>验证码：<img id="codeimg" src="check.php?r=<?php echo rand();?>" />
			<a href="" onClick="document.getElementById('codeimg').src = 'check.php?r='+Math.random()">换一个？</a>
		</p>
		<p>请输入图片中的内容<input type="text" name = "usercode" maxlength="4"/></p>
		<input type="submit" value="提交"/>
		
		
	</form>


</body>
</html>