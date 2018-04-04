<?php
	header("content-type:text/html;charset=utf8");
    session_start();
    require_once("../public/config.php");
    $m = mysql_connect(HOST,USER,PASS);
    mysql_select_db(DBNAME);
    mysql_set_charset("utf8");
	@$id=$_GET['id'];
	@$a=$_GET['a'];
	@$a=$_POST['a'];
	var_dump($a);
	var_dump($_POST);
	if ($a=='del') {
		foreach (@$_SESSION['shoppingcar'] as $k => $v) {
			if ($v['id']==$id) {
				unset($_SESSION['shoppingcar'][$k]);
				header("location:shoppingcar.php");
			}
		}
	}elseif ($a=='orders') {
		$uid=$_POST['uid'];
		$gid=$_POST['gid'];
		$price=$_POST['price'];
		$name=$_POST['name'];
		$tel=$_POST['tel'];
		$address=$_POST['address'];
		$beizhu=$_POST['beizhu'];
		$order_num=$_POST['order_num'];
		$time=time();
		$sql="insert into orders values(id,'$uid','$gid',$price,'$name','$tel','$address','$beizhu','0',$order_num,$time)";
		$result=mysql_query($sql);
		if ($result) {
			echo "提交成功<a href='index.php'>返回</a>";
		}else{
			echo "系统错误，错误编号G-001<a href='index.php'>返回</a>";
		}
	}elseif ($a=='per') {
		$id=$_SESSION['id'];
		$nicheng=$_POST['nicheng'];
		$username=$_POST['username'];
		$sex=$_POST['sex'];
		$age=$_POST['age'];
		$tel=$_POST['tel'];
		$mail=$_POST['mail'];
		$password=$_POST['password'];
		$password=md5($password);
		$time=time();
		$sql="update users set username='{$username}',password='{$password}',tel={$tel},time={$time},nicheng='{$nicheng}',sex='{$sex}',age={$age},mail='{$mail}' where id=$id";
		var_dump($sql);
		$result=mysql_query($sql);
		if ($result) {
			echo "修改成功<a href='per.php'>返回</a>";
		}else{
			echo "系统错误，错误编号G-001<a href='per.php'>返回</a>";
		}
	}