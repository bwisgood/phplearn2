<!DOCTYPE html>
<html>
	<head>
		<title>
			none
		</title>
	</head>
	<body>
		<div>
			<span>请输入要查询的员工编号</span><br>
			<input type="text" id="stext" />
			<input type="button" onClick="search()" value="Query" />
			<p id="sResult">这里显示查询结果</p>
		</div>
		
		<div>
			<span>
				请输入员工信息
			</span><br>
			name:<input type="text" id="name" /><br>
			number:<input type="text" id="number" /><br>
			sex:<input type="text" id="sex" /><br>
			job:<input type="text" id="job" /><br>
			<input type="button" id="add" value="Add" />
			<p id="rAdd">这里放置插入结果</p>
		</div>
		<script type="text/javascript">
			function search(){
				var request = new XMLHttpRequest();
				request.open("GET","aServer.php?number="+document.getElementById('stext').value);
				request.send();
				request.onreadystatechange = function(){
					if(request.readyState===4){
						if(request.status===200){
							document.getElementById("sResult").innerHTML = request.responseText;
						}
						
					}
				}
			}
			document.getElementById('add').onclick = function(){
				var request = new XMLHttpRequest();
				request.open("POST","aServer.php");
				request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				var data = "name="+document.getElementById('name').value+"&number="+document.getElementById('number').value+"&sex="+document.getElementById('sex').value+"&job="+document.getElementById('job').value;
				request.send(data);
				request.onreadystatechange = function(){
				if(request.readyState === 4){
					if(request.status === 200){
						alert(123);
						document.getElementById('rAdd').innerHTML = request.responseText;
					}
				}
			}
			}
		</script>
		
	</body>
</html>