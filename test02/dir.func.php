<?php
//读取目录
	function readDirectory($path){
		$handle = opendir($path);
		while(($item = readdir($handle)) !== false){
			if($item!="."&&$item!=".."){
				if(is_file($path."/".$item)){
					$arr["file"][] = $item;
				}
				if(is_dir($path."/".$item)){
					$arr["dir"][] = $item;
				}
			}
		}
		closedir($handle);
		return $arr;
		
	}
	function dirSize($path){
   // $sum = 0;
    //global $sum;
    $handle = opendir($path);
    while(($item = readdir($handle)) !== false){
        if($item != '.' && $item != '..'){
            if(is_file($path.'/'.$item)){
                $sum += filesize($path.'/'.$item);
            }
            if(is_dir($path.'/'.$item)){
                $func = __FUNCTION__;
                $sum+=$func($path.'/'.$item);
                //$sum += dirSize($path.'/'.$item);
            }
        }
    }
 
    closedir($handle);
    return $sum;
}
	//dirSize('file');


//	$path = "file";
//	print_r(readDirectory($path));
	
?>