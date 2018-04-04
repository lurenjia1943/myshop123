<?php
    session_start();
  $username=$_SESSION['username'];//获取登录的用户名
  $lasttime=$_SESSION['lasttime'];
  $ip=$_SESSION['ip'];
  $num=$_SESSION['num'];
  $lasttime1=date("Y-m-d H:i:s",$lasttime); //获取最后一次登录时间
  require_once("../public/config.php");
  $m = mysql_connect(HOST,USER,PASS);
  mysql_select_db(DBNAME);
  mysql_set_charset('utf8');
  $sql="select * from users where username='$username'";
  $result=mysql_query($sql);
  $a=mysql_fetch_assoc($result);
  switch ($a['status']) {
    case '2':
        $a['status']='高级会员';
      break;
    case '3':
        $a['status']='超级管理员';
    break;
  } 
  $sql1="select count(*) from users";
  $result1=mysql_query($sql1);
  $count=mysql_result($result1, 0,0);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#main{ font-size:12px;}
#main span.time{ font-size:14px; color:#528dc5; width:100%; padding-bottom:10px; float:left}
#main div.top{ width:100%; background:url(images/main/main_r2_c2.jpg) no-repeat 0 10px; padding:0 0 0 15px; line-height:35px; float:left}
#main div.sec{ width:100%; background:url(images/main/main_r2_c2.jpg) no-repeat 0 15px; padding:0 0 0 15px; line-height:35px; float:left}
.left{ float:left}
#main div a{ float:left}
#main span.num{  font-size:30px; color:#538ec6; font-family:"Georgia","Tahoma","Arial";}
.left{ float:left}
div.main-tit{ font-size:14px; font-weight:bold; color:#4e4e4e; background:url(images/main/main_r4_c2.jpg) no-repeat 0 33px; width:100%; padding:30px 0 0 20px; float:left}
div.main-con{ width:100%; float:left; padding:10px 0 0 20px; line-height:36px;}
div.main-corpy{ font-size:14px; font-weight:bold; color:#4e4e4e; background:url(images/main/main_r6_c2.jpg) no-repeat 0 33px; width:100%; padding:30px 0 0 20px; float:left}
div.main-order{ line-height:30px; padding:10px 0 0 0;}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
  <tr>
    <td colspan="2" align="left" valign="top">
    <span class="time"><strong>上午好！</strong><u>[<?php echo "{$a['status']}"; ?>]</u></span>
    <div class="top"><span class="left">您上次的登灵时间：<?php echo "$lasttime1";?>   登录IP：<?php echo "$ip";?></span> &nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时更改密码！</span><a href="index.html" target="mainFrame" onFocus="this.blur()">更改密码</a></div>
    <div class="sec">这是您第<span class="num"><?php echo "$num";?></span>次,登录！</div>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" width="50%">
    <div class="main-tit">网站信息</div>
    <div class="main-con">
    管理员个数：<font color="#538ec6"><strong><?php echo "$count";?></strong></font> 人<br/>
    登陆者IP：<?php echo $_SERVER["REMOTE_ADDR"]; ?><br/>
    </div>
    </td>
    <td align="left" valign="top" width="49%">
    <div class="main-tit">服务器信息</div>
    <div class="main-con">
    服务器软件：<?php echo apache_get_version(); ?><br/>
    PHP版本：<?php echo phpversion();?><br/>
    MYSQL版本：<?php echo mysql_get_server_info(); ?><br/>
    使用域名：<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?><br/>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
    <div class="main-corpy">系统提示</div>
    <div class="main-order">1=>如您在使用过程有发现出错请及时与我们取得联系；为保证您得到我们的后续服务，强烈建议您购买我们的正版系统或向我们定制系统！<br/>
2=>强烈建议您将IE7以上版本或其他的浏览器</div>
    </td>
  </tr>
</table>
</body>
</html>