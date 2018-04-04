<?php
  session_start();
  if (empty($_SESSION['admin'])) {
    header("location:./login.php");
  }
	require_once("../../public/config.php");
	$m=mysql_connect(HOST,USER,PASS) or die();
	mysql_select_db(DBNAME);
	mysql_set_charset('utf8');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../css/css.css" type="text/css" rel="stylesheet" />
<link href="../css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(../images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理  >  浏览用户</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="search.php">
	         <span>会员查询：</span>
	         <input type="text" name="keywords" value="" class="text-word">
	         <input name="" type="submit" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增会员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">会员账号</th>
        <th align="center" valign="middle" class="borderright">账号状态</th>
        <th align="center" valign="middle" class="borderright">权限</th>
        <th align="center" valign="middle" class="borderright">手机号</th>
        <th align="center" valign="middle" class="borderright">最后登录</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      <?php
        $keywords = $_GET['keywords'];
        switch ($keywords) {
          case '普通会员':
            $status = '1';
            break;
          case '高级会员':
            $status = '2';
            break;
          case '超级管理员':
            $status = '3';
            break;
        }
        $keywords = $_GET['keywords'];
        switch ($keywords) {
          case '禁用中':
            $zhuangtai = '0';
            break;
          case '正常':
            $zhuangtai = '1';
            break;
        }
        @$sql1 = "SELECT count(*) FROM users where username like '%{$keywords}%' or tel like '%{$keywords}%' or status='{$status}' or zhuangtai='{$zhuangtai}'";
        $result1 = mysql_query($sql1);
        $count = mysql_result($result1,0,0);
        @$sql = "SELECT * FROM users where username like '%{$keywords}%' or tel like '%{$keywords}%' or status='{$status}' or zhuangtai='{$zhuangtai}'";
        $result = mysql_query($sql);
        while($a = mysql_fetch_assoc($result)){
        switch ($a['status']) {
          case 1:
            $status = '普通会员';
            break;
          case 2:
            $status = '高级会员';
            break;
          case 3:
            $status = '超级管理员';
            break;
        }
        switch ($a['zhuangtai']) {
          case '0':
            $zhuangtai = '禁用中';
            break;
          case '1':
            $zhuangtai = '正常';
            break;
        }
        $date = date("Y-m-d H:i:s",$a['lasttime']);
        $str = <<<EOF
      <tr onMouseOut="this.style.backgroundColor='#ffffff'"
            onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{$a['id']}</td>
         <td align="center" valign="middle" class="borderright borderbottom">{$a['username']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$zhuangtai}</td>
         <td align="center" valign="middle" class="borderright borderbottom">{$status}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['tel']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$date}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="edit.php?id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">修改</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=del&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=jy&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">禁用</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=hf&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">恢复正常</a>
        </td>
      </tr>
EOF;
        echo $str;
        }
        mysql_free_result($result);
        mysql_close($m);
      ?>
    </table></td>
    </tr>
  <tr>
     <td align='left' valign='top' class='fenye'>共<?php echo "$count";?>条数据</td>;
  </tr>
</table>
</body>
</html>