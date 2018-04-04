<?php
	session_start();
	  if (empty($_SESSION['admin'])) {
	    header("location:./login.php");
	  }
	require_once("../../public/config.php");
	$a = empty($_POST['a'])?$_GET['a']:$_POST['a'];
	$m = mysql_connect(HOST,USER,PASS);
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
	if($a == "add"){
		$name = $_POST['name'];
		if (empty($name)) {
			echo "类名不能为空,<a href='add.php'>返回</a>";
			die();
		}
		$pid = $_POST['pid'];
		$sql1 = "SELECT path FROM type WHERE id={$pid}";
		$result1 = mysql_query($sql1);
		$path = mysql_result($result1,0,0);
		$path = $path."{$pid},";
		$sql2 = "INSERT INTO type values(id,{$pid},'{$name}','{$path}')";
		$result2 = mysql_query($sql2);
		if($result2){
			echo "添加成功，<a href='add.php'>返回</a>";
		}else{
			echo "系统错误，请联系管理员，错误编号T-001,<a href='add.php'>返回</a>";
		}
		mysql_free_result($result1);
	}elseif ($a=="del") {
		$id = empty($_POST['id'])?$_GET['id']:$_POST['id'];
		$sql1="select * from type where pid=$id"; 
		@$res1=mysql_query($sql1);
		@$result1=mysql_result($res1,0,0);
		if ($result1>0) {
			echo "请先删除目标的子类目录，<a href='list.php'>返回</a>";
	}else{
		$sql="delete from type where id='$id'";
		$result=mysql_query($sql);
		if ($result) {
			echo "删除成功，<a href='list.php'>返回</a>";
		}else{
			echo "系统错误，请联系管理员，错误编号T-002，<a href='list.php'>返回</a>";
		}
	}
	}if ($a=='edit') {
		$id=$_POST['pid'];
		$name=$_POST['name'];
		$sql="update type set name='$name' where id='$id'";
		$result=mysql_query($sql);
		if ($result) {
			echo "修改成功，<a href='edit.php'>返回</a>";
		}else{
			echo "系统错误，请联系管理员，错误编号T-003，<a edit='del.php'>返回</a>";
		}
	}
			mysql_close($m);