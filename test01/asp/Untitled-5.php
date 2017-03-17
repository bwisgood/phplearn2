<?php
$d = 0;

if(isset($_REQUEST['d'])){
	$d = $_REQUEST['d'];
}

if($d==1){
header("content-type: application/octet-stream");
header("content-disposition:attachment;filename=Untitled-4.php");
header("content-length:".filesize("Untitled-4.php"));
readfile("Untitled-4.php");
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
	echo file_get_contents("Untitled-4.php");
	?>

	<a href="Untitled-5.php?d=1">download</a>

</body>
</html>