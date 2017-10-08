<?php
	header("content-type:application/json;charset=utf-8");
	@$msg = $_REQUEST['msg'] or die('{"code":-2,"msg":"用户名不能为空"}');
	$conn = mysqli_connect('127.0.0.1','root','','test01','3306');
	mysqli_query($conn,"SET NAMES UTF8");
	$sql = "INSERT INTO list VALUES(NULL,'$msg')";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo '{"code":1,"msg":"成功"}';
	}else{
		echo '{"code":-1,"msg":"失败"}';
	}
?>