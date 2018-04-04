<?php
    session_start();
    if (!empty($_SESSION['admin'])) {
        header("location:./index.php");
    }
    header("Content-type:text/html;Charset=utf8");
    require_once("../public/config.php");
    @$isfirst=$_POST['isfirst'];
    $ip=$_SERVER["REMOTE_ADDR"];
    if ($isfirst==1) {
        $user = @$_POST['user'];
        $pass = @$_POST['pass'];
        $code = @$_POST['code'];
        $pass=md5($pass);
        if ($code!=$_SESSION['YZM']) {
            echo "<script> alert('验证码错误')</script>";
                    }elseif(!empty($user) and !empty($pass)){
            $m = mysql_connect(HOST,USER,PASS);
            mysql_select_db(DBNAME);
            mysql_set_charset('utf8');
            $sql = "SELECT * FROM users WHERE username = '{$user}'";
            $result = mysql_query($sql);
            $a=mysql_fetch_assoc($result);
            if($result != NULL){
                if($a['password'] == $pass){
                    if ($a['status']>1) {
                        if ($a['zhuangtai']==1) {       
                        $_SESSION['lasttime']=$a['lasttime'];//获取最后一次登录时间
                        $_SESSION['ip']=$a['ip'];//获取最后一次登录ip
                        $num=$a['num'];
                        $num=$num+1;
                        $time = time();
                        $sql1 = "UPDATE users set lasttime = {$time},num={$num},ip='{$ip}' WHERE  username = '{$user}'";
                        mysql_query($sql1);
                        $_SESSION['admin_id']=$a['id'];
                        $_SESSION['num']=$num;
                        $_SESSION['username']=$user;
                        $_SESSION['admin']=1;
                        header("Location:index.php");
                    }else{
                        echo "<script> alert('账号被禁用，无法登录')</script>";
                    }
                    }else{
                        echo "<script> alert('权限不够，无法登录')</script>";
                    }
                }else{
                    echo "<script> alert('密码错误')</script>";
                }                
            }else{
                    echo "<script> alert('账号不存在')</script>";
            }
            mysql_close($m);
        } 
        }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理登录界面</title>
    <link href="css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form  action="login.php" method="post">
    <input type="hidden" name="isfirst" value="1">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span><img src="images/login/logo.gif" alt="" style="" /></span></li>
            <li class="topC"></li>
            <li class="topD">
                <ul class="login">
                    <li><span class="left login-text">用户名：</span> <span style="left">
                        <input id="Text1" type="text" class="txt" name="user"/>                   
                    </span></li>
                    <li><span class="left login-text">密码：</span> <span style="left">
                       <input id="Text2" type="password" class="txt" name="pass" />  
                    </span></li>			
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C"  >验证码：&nbsp&nbsp<input name="code" type="text"  style="width: 80px">&nbsp&nbsp<img src="code.php" onclick="this.src='code.php'">
            <br><br>
            </input><span class="btn"><input name="" type="image" src="images/login/btnlogin.gif" /></span></li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">网站后台管理系统&nbsp;&nbsp;www.php.com</li>
        </ul>
    </div>
    </form>
</body>
</html>