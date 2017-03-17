<?php
	require("../libs/Smarty.class.php");

	$smarty = new Smarty();
	//开始配置 五配置    
//		设置界定符 
	$smarty->right_delimiter = "}";
	$smarty->left_delimiter = "{";
//设置功能文件保存路径
	$smarty->template_dir = "tpl";
	$smarty->compile_dir = "compile_c";
	$smarty->cache_dir = "cache";

	$smarty->caching = true;
	$smarty->cache_lifetime = 120;
//两方法 


$smarty->assign("time",time());
$smarty->display("test.tpl");
?>