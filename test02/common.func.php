<?php
	function alertMes($mes,$url){
		echo "<script language='JavaScript'>alert('{$mes}');location.href='{$url}';</script>";
	}

	function getExt($filename){
		return strtolower(pathinfo($filename,PATHINFO_EXTENSION));
	}
	
	function getUniqidName($length=10){
	return substr(md5(uniqid(microtime(true),true)),0,$length);
}
//alertMes("123","index.php");
?>