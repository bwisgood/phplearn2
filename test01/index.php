<?php 
	header("Content-type:text/html;charset:GBK12345");
	$host = "localhost";
	$user = "root";
	$password = "qwe12345";
	$con = mysql_connect($host,$user,$password);
	$db = "my_db";
	$link = mysql_select_db($db,$con);
	$set = mysql_query("set names utf8");
	
//连接数据库
	if($con){
		if($link){
			echo "mysql and sheet connect success!";
		}else{
			echo "连接数据表失败";
		}
	}else{
		echo "连接数据库失败";
	}
	$da = $_REQUEST['dbact'];
	if($da=="关闭数据库连接"){
		mysql_close($con);
		echo "数据库连接已关闭";
	}elseif($da=="打开数据库连接"){
		
		echo "数据库连接已打开";
		$con = mysql_connect($host,$user,$password);
	}

/*	if(mysql_query('insert into persons(Firstname,Lastname,Age) values("ABC","def","10")')){
		echo "插入成功";
	}else{
		echo mysql_error();
		echo "插入失败";
	}
*/

$res1 = mysql_query('update persons set FirstName = "rr"; update persons set LastName = "ee";');

echo mysql_affected_rows($con);

//$res = mysql_query('select * from persons');
//
//if($res && mysql_num_rows($res)){
//	while($row = mysql_fetch_object($res)){
//		echo mysql_num_rows($res)."<br />";
//		echo $row->FirstName,$row->LastName."<br />";
//	}
//}



//mysql_result()
//mysql_affected_rows()
	

//	$arr = mysql_fetch_array($res);
//	var_dump($arr);
//mysql_fetch_array($resource[,options])

/*options=>MYSQL_ASSOC 显示关联数组
		=>MYSQL_NUM 输出索引数组
		=>MYSQL_BOTH 输出关联数组和索引数组
		默认情况下 第二个参数为MYSQL_ASSOC
*/
//	$arr1 = mysql_fetch_array($res,MYSQL_ASSOC);
//	print_r($arr1);
//	echo "<br>";
//	mysql_fetch_array($res,MYSQL_NUM);
//	echo "<br>";
//	mysql_fetch_array($res,MYSQL_BOTH);
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
</head>

<body>
	<form action="index.php" method="post">
		
		<input type="submit" name="dbact" value="关闭数据库连接" /></br>
	</form>
	<form action="index.php" method="post">
		
		<input type="submit" name="dbact" value="打开数据库连接" /></br>
	</form>

</body>
</html>