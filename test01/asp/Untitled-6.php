<?
session_start();
if(isset($_COOKIE['vc'])){
	setcookie('vc',$_COOKIE['vc']++,time()+3600);
}else{
	
setcookie('vc',0,time()+3600);
}

if(isset($_SESSION['view'])){
	$_SESSION['view']++;
}else{
	$_SESSION['view']=1;
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	echo $_SESSION['view']; 
	echo $_COOKIE['vc'];
	?>
</body>
</html>