<?php
    session_start();
    if (empty($_SESSION['admin'])) {
    header("location:./login.php");
    }
    require_once("../../public/config.php");
    header("Content-type:text/html;Charset=utf8");
    $a = empty($_POST['a'])?$_GET['a']:$_POST['a'];
    $m = mysql_connect(HOST,USER,PASS) or die("系统错误，请联系管理员，错误编号001");
    mysql_select_db(DBNAME);
    mysql_set_charset('utf8');
    $oid=$_SESSION['admin_id'];
    if($a == "add"){
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $tel = $_POST['tel'];
        $account = $_POST['account'];
        $status = $_POST['status'];
        $sql1="select * from users where id={$oid}";
        $result1=mysql_query($sql1);
        $a=mysql_fetch_assoc($result1);
        if ($a['status']!=3) {
            echo "权限不足,无法添加。<a href='add.php'>返回</a>";
        die();
        }
         if (empty($username)) {
            echo "请填写账号<a href='add.php'>返回</a>";
        die();
         }
         if (empty($password1) || empty($password2)) {
          echo "请填写密码<a href='add.php'>返回</a>";
        die();
          }
         if ($password1 != $password2) {
         echo "两次密码填写不一致<a href='add.php'>返回</a>";
        die();
         }
         if (empty($tel)) {
            echo "请填写手机号码<a href='add.php'>返回</a>";
        die();
         }
        if (empty($status)) {
            echo "没有选择权限<a href='add.php'>返回</a>";
            die();
        }
        if(empty($username) or empty($password1) or empty($password2) or empty($tel) or empty($status) or $account<0){
            echo "所有选项都是必填项，<a href='add.php'>返回</a>";
            die;
        }
        if($password1 != $password2){
            echo "两次密码不一样，<a href='add.php'>返回</a>";
            die;            
        }
        $sql1 = "SELECT id FROM users WHERE tel={$tel}";
        $result1 = mysql_query($sql1);
        $re1 = @mysql_result($result1,0,0);
        if($re1>1){
            echo "手机号码已存在，请换个手机号，<a href='add.php'>返回</a>";
            mysql_free_result($result1);
        }else{
            $password1=md5($password1);
            $time = time();
            $sql2 = "INSERT INTO users(username,password,tel,status,account,time) values('{$username}','{$password1}',{$tel},'{$status}',{$account},{$time})";
            $result2 = mysql_query($sql2);
            if($result2){
                echo $username.",添加成功，<a href='add.php'>返回</a>";                
            }else{
                die("系统错误，请联系管理员，错误编号002");
            }
        }
    }elseif($a == 'del'){
        $id = $_GET['id'];
        if ($id==$oid) {
            echo "无法删除自身。<a href='list.php'>返回</a>";
            die();
        }
        $sql1="select * from users where id={$oid}";
        $result1=mysql_query($sql1);
        $a=mysql_fetch_assoc($result1);
        if ($a['status']!=3) {
            echo "权限不足,无法删除。<a href='list.php'>返回</a>";
        die();
        }
        $sql = "DELETE FROM users WHERE id = {$id}";
        $result = mysql_query($sql);
        if($result){
            echo "用户ID:{$id},删除成功,<a href='list.php'>返回</a>";
        }else{
            die("系统错误，请联系管理员，错误编号003");
        }
    }elseif($a == "edit"){
        $id = $_POST['id'];
        @$password = $_POST['password'];
        @$password=md5($password);
        $tel = $_POST['tel'];
        $account = $_POST['account'];
        $status = $_POST['status'];
        if(empty($password)){
            $sql = "UPDATE users SET tel = {$tel},account = {$account},status = '{$status}' WHERE id = {$id}";
        }else{
            $sql = "UPDATE users SET tel = {$tel},account = {$account},status = '{$status}',password = '{$password}' WHERE id = {$id}";
        }
        $result = mysql_query($sql);
        if($result){
            echo "用户".$id.",修改成功，<a href='list.php'>返回</a>";                
        }else{
            echo "用户".$id.",修改失败，<a href='list.php'>返回</a>";                
        }
    }elseif($a == "jy"){
        $id = $_GET['id'];
        $sql1="select * from users where id={$oid}";
        $result1=mysql_query($sql1);
        $a=mysql_fetch_assoc($result1);
        if ($id!=$oid) {
            if ($a['status']==3) {
                $sql2="select * from users where id={$id}";
                $result2=mysql_query($sql2);
                $b=mysql_fetch_assoc($result2);
                if ($b['zhuangtai']=='0') {
                        echo "用户".$id.",不要重复操作，<a href='list.php'>返回</a>";  
                    }else{
                    $sql = "UPDATE users SET zhuangtai = '0' WHERE id = {$id}";
                    $result = mysql_query($sql);
                        if($result){
                            echo "用户".$id.",禁用成功，<a href='list.php'>返回</a>";                
                        }else{
                            echo "用户".$id.",禁用失败，<a href='list.php'>返回</a>";                
                        }
                      }
                             }else{
                                echo "用户".$id.",权限不足，无法修改，<a href='list.php'>返回</a>"; 
                            }
        }
        else{
            echo "用户".$id.",无法对自己进行操作，<a href='list.php'>返回</a>"; 
        }
    }elseif($a == "hf"){
        $id = $_GET['id'];
        $sql1="select * from users where id={$oid}";
        $result1=mysql_query($sql1);
        $a=mysql_fetch_assoc($result1);
        if ($id!=$oid) {
            if ($a['status']==3) {
                $sql2="select * from users where id={$id}";
                $result2=mysql_query($sql2);
                $b=mysql_fetch_assoc($result2);
                if ($b['zhuangtai']=='1') {
                        echo "用户".$id.",不要重复操作，<a href='list.php'>返回</a>";  
                    }else{
                    $sql = "UPDATE users SET zhuangtai = '1' WHERE id = {$id}";
                    $result = mysql_query($sql);
                        if($result){
                            echo "用户".$id.",状态恢复成功，<a href='list.php'>返回</a>";                
                        }else{
                            echo "用户".$id.",状态恢复失败，<a href='list.php'>返回</a>";                
                        }
                      }
                             }else{
                                echo "用户".$id.",权限不足，无法修改，<a href='list.php'>返回</a>"; 
                            }
        }
        else{
            echo "用户".$id.",无法对自己进行操作，<a href='list.php'>返回</a>"; 
        }
    }
    mysql_close($m);    
