<?php
	session_start();
	if (empty($_SESSION['admin'])) {
		header("location:./login.php");
	}
	require_once("../../public/config.php");
	require_once("../../public/function.php");
	$a=empty($_GET['a'])?$_POST['a']:$_GET['a'];
	$m=mysql_connect(HOST,USER,PASS) or die();
	mysql_select_db(DBNAME);
	mysql_set_charset("utf8");
	if ($a=='add') {
		$tid=$_POST['tid'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$num=$_POST['num'];
		$status=$_POST['status'];
		$content=$_POST['content'];
		$imgsrc=$_FILES['imgsrc'];
		$arr=array("image/jpg","image/png","image/gif","image/jpeg");
		$path="../../public/goodsimg/";
		$img=fileupload($imgsrc,$arr,$path,$size=1024);
		$imgsrc = suoimg($path.$img,200,$path);
		$keywords=$_POST['keywords'];
		$time=time();
		$sql = "INSERT INTO goods values(id,{$tid},'{$name}','{$img}','{$imgsrc}','{$content}',{$price},{$num},'{$status}',0,{$time},'{$keywords}')";
		$result=mysql_query($sql);
		if ($result) {
			echo "添加成功<a href='add.php'>返回</a>";
		}else{
			echo "系统错误，错误编号G-001<a href='add.php'>返回</a>";
		}
	}else if ($a=='sj') {
		$id=$_GET['id'];
		$sql="update goods set status='1' where id={$id}";
		$result=mysql_query($sql);
		if ($result) {
			echo "上架成功<a href='list.php'>返回</a>";
		}else{
			echo "上架失败，错误编号G-002<a href='list.php'>返回</a>";
		}
	}elseif ($a=='xj') {
		$id=$_GET['id'];
		$sql="update goods set status='0' where id={$id}";
		$result=mysql_query($sql);
		if ($result) {
			echo "下架成功<a href='list.php'>返回</a>";
		}else{
			echo "下架失败，错误编号G-003<a href='list.php'>返回</a>";
		}
	}elseif ($a=='edit') {
		$id=$_POST['id'];
		$tid=$_POST['tid'];
		$name=$_POST['name'];
		$price=$_POST['price'];
		$num=$_POST['num'];
		$status=$_POST['status'];
		$content=$_POST['content'];	
		$time=time();
		$sql="update goods set tid={$tid},name='{$name}',price={$price},num={$num},status='{$status}',content='{$content}',time={$time} where id={$id}";
		$result=mysql_query($sql);
		if ($result) {
			echo "修改成功<a href='list.php'>返回</a>";
		}else{
			echo "修改失败，错误编号G-004<a href='list.php'>返回</a>";
		}		
	}elseif($a == 'del'){
        $id = $_GET['id'];
        $sql1="select * from goods where id={$id}";
        $result1=mysql_query($sql1);
        $a = mysql_fetch_assoc($result1);
        unlink("../../public/goodsimg/{$a['imgsrc']}");
        unlink("../../public/goodsimg/{$a['img']}");
        $sql = "DELETE FROM goods WHERE id = {$id}";
        $result = mysql_query($sql);
        if($result){
            echo "删除成功,<a href='list.php'>返回</a>";
        }else{
            echo "系统错误,请联系管理员,错误编号G-005<a href='list.php'>返回</a>";
        }
    }elseif ($a=='editimg') {
    	$id=$_POST['id'];
    	$imgsrc=$_FILES['imgsrc'];		//更新商品图片
		$sql1="select * from goods where id={$id}";
   		$result1=mysql_query($sql1);
  		$a = mysql_fetch_assoc($result1);
   		unlink("../../public/goodsimg/{$a['imgsrc']}");
        unlink("../../public/goodsimg/{$a['img']}");
        $arr=array("image/jpg","image/png","image/gif","image/jpeg");
		$path="../../public/goodsimg/";
		$img=fileupload($imgsrc,$arr,$path,$size=1024);
		$imgsrc = suoimg($path.$img,50,$path);
		$time=time();
		$sql="update goods set imgsrc='{$imgsrc}',img='{$img}',time={$time} where id={$id}";
		$result=mysql_query($sql);
		if ($result) {
			echo "更新成功<a href='list.php'>返回</a>";
		}else{
			echo "更新失败，错误编号G-006<a href='list.php'>返回</a>";
		}	
    }elseif ($a=='keywords') {
    	$id=$_POST['id'];
    	$keywords=$_POST['keywords'];
		$time=time();
		$sql="update goods set keywords='{$keywords}',time={$time} where id={$id}";
		$result=mysql_query($sql);
		if ($result) {
			echo "更新成功<a href='list.php'>返回</a>";
		}else{
			echo "更新失败，错误编号G-007<a href='list.php'>返回</a>";
		}	
    }