

<?php

$tArray = array(
	array("name"=>"白维","number"=>"8","sex"=>"male","job"=>"cto"),
	array("name"=>"老吉卯","number"=>"4","sex"=>"male","job"=>"coder"),
	array("name"=>"亦菲","number"=>"9","sex"=>"female","job"=>"ui")

);
$ab = 1;



function a(){
	global $tArray;
	global $ab;
	foreach($tArray as $value){
		echo $value['name']."<br>";
	}
	echo "\$ab=".$ab;
	
	var_dump($tArray);
}

a();
?>
