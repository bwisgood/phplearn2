<?php
//require_once('common.func.php');
function downFile($filename){
		header('Content-Type: application/octet-stream');
		header("Content-Disposition:attachment;filename=".$filename);
		header("content-length:".filesize($filename));
		readfile($filename);
	}
//转换字节大小
	function getSize($fileSize){
		$i = 0;
		$arr = array("Byte","KB","MB","GB","TB","EB");
		while($fileSize>=1024){
			$fileSize /= 1024;
			$i++;
		}
		return round($fileSize,2).$arr[$i];
	}


	function createFile1($filename){
		$partten = "/[\/,\*,<>,\|,\?]/";
		if(!preg_match($partten,basename($filename))){
			if(!file_exists($filename)){
				if(touch(($filename))){
					return "Build file success";
				}else{
					return "Build file faild";
				}
			}else{
				return "There have a same name file in this directory, Please rename it.";
			}
		}else{
			return "Some characters in the name is invalid, Please check the name and modify it.";
		}
	}

	function filereName($filename,$newname){

		$path = dirname($filename);
		if(checkName($newname)){
			if(!file_exists($path."/".$newname)){

				if(rename($filename,$path."/".$newname)){
					return "文件名修改成功";
				}else{
					return "文件名修改失败";
				}
			}else{
				return "文件名重复 请重新输入";
			}
		}else{
			return "文件名不合法 请重新输入";
		}
	}

	function checkName($filename){
		$partten = "/[\/,\*,<>,\|,\?]/";
		if(!preg_match($partten,basename($filename))){
			return true;
		}else{
			return false;
		}
	}

	function delFile($filename){
		if(unlink($filename)){
			$mes = "文件删除成功";
		}else{
			$mes = "文件删除失败";
		}
		return $mes;
	}
	function uploadFile($fileInfo,$path,$allowExt=array("gif","jpeg","jpg","png","txt","doc","ppt","docx","pptx"),$maxSize=10485760){
	//判断错误号
	if($fileInfo['error']==UPLOAD_ERR_OK){
		//文件是否是通过HTTP POST方式上传上来的
		if(is_uploaded_file($fileInfo['tmp_name'])){
			//上传文件的文件名，只允许上传jpeg|jpg、png、gif、txt的文件
			//$allowExt=array("gif","jpeg","jpg","png","txt");
			$ext=getExt($fileInfo['name']);
			$uniqid=getUniqidName();
			$destination=$path."/".pathinfo($fileInfo['name'],PATHINFO_FILENAME)."_".$uniqid.".".$ext;
			if(in_array($ext,$allowExt)){
				if($fileInfo['size']<=$maxSize){
					if(move_uploaded_file($fileInfo['tmp_name'], $destination)){
						$mes="文件上传成功";
//						echo $ext."--ext<br>";
//						echo $uniqid."--uniqid<br>";
//						echo $destination."--des<br>";
//						echo $fileInfo['name']."--fileinfo";
					}else{
						$mes="文件移动失败";
					}
				}else{
					$mes="文件过大";
				}
			}else{
				$mes="非法文件类型";
			}
		}else{
			$mes="文件不是通过HTTP POST方式上传上来的";
		}
	}else{
		switch($fileInfo['error']){
			case 1:
				$mes="超过了配置文件的大小";
				break;
			case 2:
				$mes="超过了表单允许接收数据的大小";
				break;
			case 3:
				$mes="文件部分被上传";
				break;
			case 4:
				$mes="没有文件被上传";
				break;
		}
	}
	
	return $mes;
	
}

//	function copyFile($filename,$path){
//		if(file_exists($path)){
//			
//			
//		}
//	}


?>