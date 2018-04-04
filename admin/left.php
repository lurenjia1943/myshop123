<?php
  session_start();
  $username=$_SESSION['username'];
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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
  // <![CDATA[
  var myMenu;
  window.onload = function() {
    myMenu = new SDMenu("my_menu");
    myMenu.init();
  };
  // ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
  <div><img src="images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo "$username"; ?><br>角色：<?php echo "{$a['status']}"; ?></span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户管理</span>
        <a href="huiyuan/list.php" target="mainFrame" onFocus="this.blur()">浏览用户</a>
        <a href="huiyuan/add.php" target="mainFrame" onFocus="this.blur()">添加用户</a>
      </div>
      <div>
        <span>商品类别</span>
        <a href="type/list.php" target="mainFrame" onFocus="this.blur()">查看类别</a>
        <a href="type/add.php" target="mainFrame" onFocus="this.blur()">增加类别</a>
        <a href="type/del.php" target="mainFrame" onFocus="this.blur()">删除类别</a>
      </div>
      <div>
        <span>商品管理</span>
        <a href="goods/add.php" target="mainFrame" onFocus="this.blur()">增加商品</a>
        <a href="goods/list.php" target="mainFrame" onFocus="this.blur()">查看所有商品</a>
        <a href="goods/list1.php" target="mainFrame" onFocus="this.blur()">查看在售商品</a>
        <a href="goods/list2.php" target="mainFrame" onFocus="this.blur()">查看下架商品</a>
      </div>
      <div>
        <span>订单管理</span>
        <a href="orders/list.php" target="mainFrame" onFocus="this.blur()">查看订单</a>
      </div>
    </div>
</body>
</html>