<?php
	session_start();
	if (empty($_SESSION['admin'])) {
		header("location:./login.php");
	}
	require_once("../../public/config.php");
	$a=empty($_GET['a'])?$_POST['a']:$_GET['a'];
	$m=mysql_connect(HOST,USER,PASS) or die();
	mysql_select_db(DBNAME);
	mysql_set_charset("utf8");
	if ($a=='edit') {
		$id=$_POST['id'];
		$status=$_POST['status'];
		$sql="update orders set status='{$status}' where id=$id";
		$result=mysql_query($sql);
		if ($result) {
			echo "更新成功,<a href='list.php'>返回</a>";
		}else{
			echo "更新失败,<a href='list.php'>返回</a>";
		}	
	}elseif($a == 'del'){
        $id = $_GET['id'];
        $sql = "DELETE FROM orders WHERE id = {$id}";
        $result = mysql_query($sql);
        if($result){
            echo "删除成功,<a href='list.php'>返回</a>";
        }else{
            echo "系统错误,<a href='list.php'>返回</a>";
        }
    }