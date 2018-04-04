<?php  
  session_start();
  if (empty($_SESSION['admin'])) {
    header("location:./login.php");
  }
  require_once("../../public/config.php");
  $m = mysql_connect(HOST,USER,PASS);
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
    <td width="99%" align="left" valign="top">您的位置：商品管理  >  查看下架商品</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="get" action="search.php">
           <span>商品：</span>
           <input type="text" name="keywords" value="" class="text-word">
           <input name="" type="submit" value="查询" class="text-but">
           </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增商品</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">商品类别</th>
        <th align="center" valign="middle" class="borderright">商品名字</th>
        <th align="center" valign="middle" class="borderright">关键词</th>
        <th align="center" valign="middle" class="borderright">商品图片</th>
        <th align="center" valign="middle" class="borderright">商品价格</th>
        <th align="center" valign="middle" class="borderright">商品库存</th>
        <th align="center" valign="middle" class="borderright">商品状态</th>
        <th align="center" valign="middle" class="borderright">商品销量</th>
        <th align="center" valign="middle" class="borderright">商品备注</th>
        <th align="center" valign="middle" class="borderright">商品添加时间</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      <?php
        $num = 10;
        $sql1 = "SELECT count(*) FROM goods where status='0'";
        $result1 = mysql_query($sql1);
        $count = mysql_result($result1,0,0);
        $pages = ceil($count/$num);
        $k = @$_GET['k'];
        if(empty($k) || $k<1){
          $k = 1;
        }elseif($k>$pages){
          $k = $pages;
        }
        $offset = ($k-1)*$num;
        $sql = "select a.id,b.name as pname,a.name,a.img,a.imgsrc,a.content,a.price,a.num,a.status,a.xiaoliang,a.time,a.keywords from goods a,type b where a.tid=b.id ORDER BY id ASC LIMIT {$offset},10";
        $result = mysql_query($sql);
        while($a = mysql_fetch_assoc($result)){
          switch ($a['status']) {
            case '0':
              $status='下架';
              break;
            case '1':
              $status='在售';
              break;
          }
          if ($status=='下架') {      
        $date = date("Y-m-d H:i:s",$a['time']);
        $str = <<<EOF
       <tr onMouseOut="this.style.backgroundColor='#ffffff'"
            onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{$a['id']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['pname']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['name']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['keywords']}</td>
        <td align="center" valign="middle" class="borderright borderbottom"><img src="../../public/goodsimg/{$a['imgsrc']}"></td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['price']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['num']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$status}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['xiaoliang']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$a['content']}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{$date}</td>
        <td align="center" valign="middle" class="borderbottom">
        <a href="action.php?a=sj&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">上架</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=xj&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">下架</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="edit.php?a=edit&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">修改</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="action.php?a=del&id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">删除</a>
        <br>
        <a href="editimg.php?id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">更新图片</a>
        <span class="gray">&nbsp;|&nbsp;</span>
        <a href="keywords.php?id={$a['id']}" target="mainFrame" onFocus="this.blur()" class="add">更新关键词</a>
        </td>
      </tr>
EOF;
      echo $str;
        }
    }
        mysql_free_result($result);
        mysql_close($m);
      ?>
    </table></td>
    </tr>
  <tr>
    <?php
    echo '<td align="left" valign="top" class="fenye">'.$count.'条数据 '.$k.'/'.$pages.' 页&nbsp;&nbsp;<a href="list2.php?k=1" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="list2.php?k='.($k-1).'" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="list2.php?k='.($k+1).'" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="list2.php?k='.$pages.'" target="mainFrame" onFocus="this.blur()">尾页</a></td>   ';
    ?>
  </tr>
</table>
</body>
</html>