
<?php 
	session_start();
	ob_clean();
	
	header('content-type: image/png');
	$image = imagecreatetruecolor(100,30);
	$bgcolor = imagecolorallocate($image,242,156,177);
	imagefill($image,0,0,$bgcolor);
/*
for($i = 0;$i<4;$i++){
	
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image,rand(30,150),rand(30,150),rand(30,150));
	$fontnum = rand(0,9);
	
	$x = ($i*100/4)+rand(5,10);
	$y = rand(5,10);
	
	imagestring($image,$fontsize,$x,$y,$fontnum,$fontcolor);
}*/
$code = '';
for($i = 0;$i<4;$i++){
	
	$fontsize = 6;
	$fontcolor = imagecolorallocate($image,rand(30,150),rand(30,150),rand(30,150));
	$data = "qwertyuioplkjhgfdsazxcvbnm3456789";
	$fontcontent = substr($data,rand(0,strlen($data)-1),1);
	$code.=$fontcontent;
	$x = ($i*100/4)+rand(5,10);
	$y = rand(5,10);
	
	imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
$_SESSION['authcode'] = $code;

for($i=0;$i<200;$i++){
	$pointcolor = imagecolorallocate($image,rand(160,230),rand(160,230),rand(160,230));
	$x = rand(0,100);
	$y = rand(0,30);
	imagesetpixel($image,$x,$y,$pointcolor);
}
for($i = 0;$i<3;$i++){
	$linecolor = imagecolorallocate($image,rand(130,200),rand(130,200),rand(130,200));
	$x = rand(0,100);
	$y = rand(0,30);
	imageline($image,rand(0,100),rand(0,30),rand(0,100),rand(0,30),$linecolor);
}


	
	imagepng($image);
	imagedestroy($image);


?>
