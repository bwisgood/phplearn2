<?php
	
	class testController{
		function show(){
			//$testModel = new testModel();
			$testModel = M('test'); 
			$data = $testModel->get();
			
			$testView = V('test');
			$testView->display($data);
		}
		function index(){
			echo $_GET['controller'].$_GET['method'];
		}
	}

?>