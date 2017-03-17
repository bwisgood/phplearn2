<?PHP
$act = null;
header("Content-Type: text/html; charset=utf-8");
	require_once('dir.func.php');
	require_once('file.func.php');
	require_once('common.func.php');
	
	//$path = "file";
$path = $_REQUEST['path']?$_REQUEST['path']:"file";
	$info = readDirectory($path);
	$redirect = "index.php?path={$path}";
	//print_r($info);
	if(isset($_REQUEST['act'])){
		$act=$_REQUEST['act'];
	}
	if(isset($_REQUEST['filename'])){
		$filename=$_REQUEST['filename'];
	}
	
	if($act == 'createFile'){
//		echo $path,"--";
//		echo $filename;
		
		//创建文件
		
		$mes = createFile1($path."/".$filename);

		alertMes($mes,"index.php");
		//		print_r($redirect);
//		var_dump($mes);
//		var_dump($redirect);
//		alertMes($mes,$redirect);
		
	}elseif($act == 'showContent'){
		
		//查看文件
//		echo "123";
		$content = file_get_contents($filename);
		if(strlen($content)){
		$str = highlight_string($content,true);
		echo "<br>";
		highlight_string($content);
		echo "<br>";
		echo "<textarea cols = '100' rows='10'>{$str}</textarea>";
		echo "<br>";
		echo "<table width='80%' cellpadding='5' cellspacing='0' bgcolor='pink'><tr><td>{$str}</td></tr></table>";
		}else{
			alertMes("该文件为空 请编辑后重新打开",$redirect);
		}
	}elseif($act == 'editContent'){
		//echo 456;
		//编辑文件doEdit
		$content = file_get_contents($filename);
		echo "<form action='index.php?act=doEdit' method='post'><textarea name='c' rows='10' cols='1000'>{$content}</textarea></br><input type='hidden' name='filename' value='{$filename}' /><input type='submit' value='提交修改' /></form>";
	}elseif($act == ''){
		$content=$_REQUEST['c'];
		$filename=$_REQUEST['filename'];
		//echo $filename;
		echo $content;
		if(file_put_contents($filename,$content)){
			$mes = "文件修改成功";
		}else{
			$mes = "文件修改失败";
		}
		alertMes($mes,$redirect);
	}elseif($act == 'reName'){
		//echo $filename;
		echo "重命名";
		echo "<form action='index.php?act=doRename' method='post'><input type='text' name='newName' placeholder='重命名' /><input type='submit' value='提交新名字'><input type='hidden' name='filename' value='{$filename}'></form>";
	}elseif($act=='doRename'){
		
		$newName = $_REQUEST['newName'];
		
		$mes = filereName($filename,$newName);
		alertMes($mes,$redirect);
	}elseif($act=='delFile'){
		$mes = delFile($filename);
		alertMes($mes,$redirect);
	}elseif($act=='downFile'){
		$mes = downFile($filename);
	}elseif($act=='copyFile'){
		
		echo "copy file";
		echo "<form action='index.php?act=docopyFile' method='post'><input type='text' name='pathname' placeholder='复制路径' /><input type='submit' value='提交路径'><input type='hidden' name='filename' value='{$filename}'></form>";
	}elseif($act=='docopyFile'){
		$pathname = $_REQUEST['pathname'];
		$filename = $_REQUEST['filename'];
		echo "copyFile";
		echo $filename,$pathname,$path;
	}elseif($act=='uploadFile'){
		//print_r($_FILES);
		$fileInfo=$_FILES['myFile'];
		$mes=uploadFile($fileInfo,$path);
		alertMes($mes, $redirect);
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<style>
	
	li{padding:0;margin: 0;list-style: none;}
	ul{background: #999999;padding:0;margin: 0;list-style: none;}
	li{display:block; width: 80px; height: 20px;float: left; border: 1px solid black;text-align: center;}
	a{text-decoration:none;}
	</style>
<script>
	function showTable(fn1){
		document.getElementById(fn1).style.display = 'block';


	}
	function delFile(filename){
		if(window.confirm("您确定要删除吗？")){
			location.href="index.php?act=delFile&filename="+filename;
		}
	}
	function goBack(path){
		location.href="index.php?path="+path;
	}
	
	
	</script>
</head>

<body>

<div style="clear: both;">
	<ul>
		
		<li><a href="index.php">主目录</a></li>
		<li><a href="#" onClick="showTable('createFile')">创建</a></li>
		<?php
		$back =($path=="file")?"file":dirname($path);
		?>
		
		<li><a href="#" onClick="goBack('<?php echo $back;?>')">返回上一级</a></li>
		<li><a href="#" onClick="showTable('uploadFile')">上传文件</a></li>
		<li><a href="#">5</a></li>
		<li><a href="#">6</a></li>
	</ul>
</div>

<form action="index.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1px" align="center" cellspacing="0" cellpadding="5" bgcolor="#ABCDDF">
	<tr id="createFile" style="display: none;">
		<td>新建文件</td>
		<td>请输入文件名
			<input type="text" name="filename" />
			<input type="hidden" name="path" value="<?php echo $path; ?>" />
			<input type="hidden" name="act" value="createFile" />
			<input type="submit" value="创建文件" />
		</td>
	</tr>
	
	<tr id="uploadFile" style="display: none;">
		<td>上传文件</td>
		<td>
		<input type="file" name="myFile" />
		<input type="submit" value="uploadFile" name="act" /></td>
	</tr>
	
	<tr>
		<td>编号</td>
		<td>名称</td>
		<td>类型</td>
		<td>大小</td>
		<td>可读</td>
		<td>可写</td>
		<td>可执行</td>
		<td>创建时间</td>
		<td>修改时间</td>
		<td>访问时间</td>
		<td>操作</td>
	</tr>
	<?php
		if($info['file']){
			$i = 1;
			foreach($info['file'] as $val){
				$p = $path."/".$val;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $val; ?></td>
					<td><?php echo filetype($p); ?></td>
					<td><?php echo getSize(filesize($p)); ?></td>
					<td><?php if(is_readable($path."/".$val)){echo "可读";}else{echo "不可读";} ?></td>
					<td><?php if(is_writable($p)){echo "可写";}else{echo "不可写";} ?></td>
					<td><?php if(is_executable($p)){echo "可执行";}else{echo "不可执行";} ?></td>
					<td><?php echo date("Y-m-d H-i-s",filectime($p)); ?></td>
					<td><?php echo date("Y-m-d H-i-s",filemtime($p)); ?></td>
					<td><?php echo date("Y-m-d H-i-s",fileatime($p)); ?></td>
					<td>
						<a href="index.php?act=showContent&path=<?php echo $path;?>&filename=<?php echo $p; ?>">查看</a>
						<a href="index.php?act=editContent&filename=<?php echo $p; ?>">修改</a>
						<a href="index.php?act=reName&filename=<?php echo $p; ?>">重命名</a>
						<a href="index.php?act=copyFile&filename=<?php echo $p;?>">复制</a>
						<a href="#">剪切</a>
						<a href="#" onClick="delFile('<?php echo $p;  ?>')">删除</a>
						
						<a href="index.php?act=downFile&filename=<?php echo $p; ?>">下载</a>
					</td>
				</tr>
				<?php
				$i++;
			}
			
		}
	?>
	<!-- 文件夹显示操作 -->
		<?php
		if($info['dir']){
			foreach($info['dir'] as $val){
				$p = $path."/".$val;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $val; ?></td>
					<td><?php echo filetype($p); ?></td>
					<td><?php echo getSize(dirSize($path."/".$val)); ?></td>
					<td><?php if(is_readable($path."/".$val)){echo "可读";}else{echo "不可读";} ?></td>
					<td><?php if(is_writable($p)){echo "可写";}else{echo "不可写";} ?></td>
					<td><?php if(is_executable($p)){echo "可执行";}else{echo "不可执行";} ?></td>
					<td><?php echo date("Y-m-d H-i-s",filectime($p)); ?></td>
					<td><?php echo date("Y-m-d H-i-s",filemtime($p)); ?></td>
					<td><?php echo date("Y-m-d H-i-s",fileatime($p)); ?></td>
					<td>
						<a href="index.php?path=<?php echo $p;?>">查看</a>
						<a href="index.php?act=reName&filename=<?php echo $p; ?>">重命名</a>
						<a href="#">复制</a>
						<a href="#">剪切</a>
						<a href="#" onClick="delFile('<?php echo $p;  ?>')">删除</a>
						
						<a href="index.php?act=downFile&filename=<?php echo $p; ?>">下载</a>
					</td>
				</tr>
				<?php
				$i++;
			}
			
		}
	?>
	
</table>
</form>




</body>
</html>