<?php
	function C($name, $method){
		require_once('/libs/Controller/'.$name.'Controller.class.php');
		$controller = $name.'Controller';
		$obj = new $controller();
		//var_dump($obj);
		$obj->show();
		
//		eval('$obj = new '.$name.'Controller;$obj->method();');
	}
	function M($name){
		require_once('/libs/Model/'.$name.'Model.class.php');
		$model = $name.'Model';
		$obj = new $model();
		//var_dump($obj);
		return $obj;
	}
	function V($name){
		require_once('/libs/View/'.$name.'View.class.php');
		$view = $name.'View';
		$obj = new $view();
		//	var_dump($obj);
		return $obj;
	}

	function daddslashes($str){
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}
?>