<?php
  header("Content-type:text/html;Charset=utf8");
  session_start();
  if (empty($_SESSION['id'])) {
    header("location:./login.php");
  }
  require_once("../public/config.php");
  $id = $_SESSION['id'];
  $username = $_SESSION['home_username'];
  $m = mysql_connect(HOST,USER,PASS) or die("数据库链接失败");
  mysql_select_db(DBNAME);
  mysql_set_charset("UTF8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的订单</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/shopping-mall-index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>

<body style="position:relative;">

	<!--top 开始-->
    <div class="top">
    	<div class="top-con w1200">
        	<p class="t-con-l f-l">您好，<?php echo $username;?>欢迎来到宅客微购</p>
            <ul class="t-con-r f-r">
            	<li><a href="#">我 (个人中心)</a></li>
            	<li><a href="#">我的购物车</a></li>
            	<li><a href="#">我的订单</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--logo search 开始-->
    <div class="hd-info1 w1200">
    	<div class="logo f-l">
        	<h1><a href="index.php" title="中林网站"><img src="images/logo.jpg" /></a></h1>
        </div>
        <div class="search f-r">
        	<ul class="sp">
            	<li class="current" ss-search="sp"><a href="JavaScript:;">商品</a></li>
                <li ss-search="dp"><a href="JavaScript:;">店铺</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div class="srh">
            	<div class="ipt f-l">
                	<input type="text" placeholder="搜索商品..." ss-search-show="sp" />
                    <input type="text" placeholder="搜索店铺..." ss-search-show="dp" style="display:none;" />
                </div>
                <button class="f-r">搜 索</button>
                <div style="clear:both;"></div>
            </div>
            <ul class="sp2">
                <li><a href="#">绿豆</a></li>
                <li><a href="#">大米</a></li>
                <li><a href="#">驱蚊</a></li>
                <li><a href="#">洗面奶</a></li>
                <li><a href="#">格力空调</a></li>
                <li><a href="#">洗发护发</a></li>
                <li><a href="#">葡萄 </a></li>
                <li><a href="#">脉动</a></li>
                <li><a href="#">海鲜水产</a></li>
                <div style="clear:both;"></div>
            </ul>
        </div>
        <div style="clear:both;"></div>
    </div>

    <!--内容开始-->
    <div class="personal w1200">
    	<div class="personal-left f-l">
            <div class="personal-l-tit">
                <h3>个人中心</h3>
            </div>
            <ul>
                <li class="per-li2"><a href="#">个人资料<span>></span></a></li>
                <li class="per-li3"><a href="#">我的订单<span>></span></a></li>
                <li class="per-li5"><a href="#">购物车<span>></span></a></li>
                <li class="per-li6"><a href="#">管理收货地址<span>></span></a></li>
                <li class="per-li8"><a href="#">购买记录<span>></span></a></li>
            </ul>
        </div>
    	<div class="order-right f-r">
        	<div class="order-hd">
            	<dl class="f-l">
                    <dd>
                    	<h3><a href="#"></a></h3>
                        <p><?php echo $username;?></p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="ord-dai f-l">
                	<p>待付款<span>1</span></p>
                	<p>待发货<span>1</span></p>
                	<p>待收货<span>1</span></p>
                	<p>待评价<span>1</span></p>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="order-md">
            	<div class="md-tit">
                	<h3>我的订单</h3>
                </div>
                <div class="md-hd">
                	<P class="md-p1"><input type="checkbox" name="hobby" value=""></input><span>全选</span></P>
                    <p class="md-p2">商品信息</p>
                    <p class="md-p3">规格</p>
                    <p class="md-p4">单价（元）</p>
                    <p class="md-p5">金额（元）</p>
                    <p class="md-p6">操作</p>
                </div>
                <div class="md-info">
                	<div class="dai">
                    	<input type="checkbox" name="hobby" value=""></input><span>待付款</span>
                    </div>
<?php
//                 $sql = "SELECT gid FROM orders where uid='{$username}'";
//                 $result = mysql_query($sql);
//                 while ($gid=mysql_result($result,0,0)) {
//                     $goods=$gid;
//                     $goods = trim($goods, "@");
//                     $goods = explode("@@", $goods);
//                     for ($i=0; $i < count($goods); $i=$i+2) {
//                       $sql2="select * from goods where id=$goods[$i]";
//                       $result2=mysql_query($sql2);
//                       $n=$goods[$i+1];
//                       while ($rel2=mysql_fetch_assoc($result2)) {
//                           $str=<<<EOF
//                     <div class="dai-con">
//                         <dl class="dl1">
//                             <dt>
//                                 <input type="checkbox" name="hobby" value="" class="f-l"></input>
//                                 <a href="#" class="f-l"><img src="../public/goodsimg/{$rel2['imgsrc']}" /></a>
//                                 <div style="clear:both;"></div>
//                             </dt>
//                             <dd>
//                                 <p>{$rel2['content']}</p>
//                                 <span>X {$n}</span>
//                             </dd>
//                             <div style="clear:both;"></div>
//                         </dl>
//                         <div class="dai-right f-l">
//                             <P class="d-r-p1">颜色：蓝色<br />尺码：XL</P>
//                             <p class="d-r-p2">¥ {$rel2['price']}</p>
//                             <p class="d-r-p3">¥ {$rel2['price']}</p>
//                             <p class="d-r-p4"><a href="#">移入收藏夹</a><br /><a href="#">删除</a><br /><a href="#">付款</a></p>
//                         </div>
// EOF;
//                     echo $str;
//                       }
//                     }
//              }
                
?>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                	<div class="dai">
                    	<input type="checkbox" name="hobby" value=""></input><span>待发货</span>
                    </div>
                    <div class="dai-con">
                    	<dl class="dl1">
                        	<dt>
                                <input type="checkbox" name="hobby" value="" class="f-l"></input>
                                <a href="#" class="f-l"><img src="images/dai.gif" /></a>
                                <div style="clear:both;"></div>
                            </dt>
                            <dd>
                            	<p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                        	<P class="d-r-p1">颜色：蓝色<br />尺码：XL</P>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4" style="margin-top:20px;"><a href="#">移入收藏夹</a><br /><a href="#">删除</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                	<div class="dai">
                    	<input type="checkbox" name="hobby" value=""></input><span>待收货</span>
                    </div>
                    <div class="dai-con">
                    	<dl class="dl1">
                        	<dt>
                                <input type="checkbox" name="hobby" value="" class="f-l"></input>
                                <a href="#" class="f-l"><img src="images/dai.gif" /></a>
                                <div style="clear:both;"></div>
                            </dt>
                            <dd>
                            	<p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                        	<P class="d-r-p1" style=" position:relative;top:-20px;">颜色：蓝色<br />尺码：XL</P>
                            <p class="d-r-p2" style="top:-43px;">¥ 66.00</p>
                            <p class="d-r-p3" style="top:-43px;">¥ 66.00</p>
                            <p class="d-r-p4"><a href="#">移入收藏夹</a><br /><a href="#">删除</a><br /><a href="#">确认收货</a><br /><a href="JavaScript:;" ckwl="">查看物流</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="md-info">
                	<div class="dai">
                    	<input type="checkbox" name="hobby" value=""></input><span>待评价</span>
                    </div>
                    <div class="dai-con">
                    	<dl class="dl1">
                        	<dt>
                                <input type="checkbox" name="hobby" value="" class="f-l"></input>
                                <a href="#" class="f-l"><img src="images/dai.gif" /></a>
                                <div style="clear:both;"></div>
                            </dt>
                            <dd>
                            	<p>登高阁紫菜肉松鸡蛋卷 海苔蛋卷 糕点江西特产小吃 休闲办公零食</p>
                                <span>X 1</span>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
                        <div class="dai-right f-l">
                        	<P class="d-r-p1">颜色：蓝色<br />尺码：XL</P>
                            <p class="d-r-p2">¥ 66.00</p>
                            <p class="d-r-p3">¥ 66.00</p>
                            <p class="d-r-p4" style="margin-top:20px;"><a href="#">移入收藏夹</a><br /><a href="#">删除</a></p>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <!--分页-->
                <div class="md-ft">
                	<P class="md-p1"><input type="checkbox" name="hobby" value=""></input><span>全选</span></P>
                    <a href="#">删除</a>
                    <a href="#">加入收藏夹<span>（此处始终在屏幕下方）</span></a>
                    <button>结算</button>
                </div>
            </div>
            
        </div>
        <div style="clear:both;"></div>
    </div>
    
    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
    
    <!--查看物流 弹窗-->
    <div class="view-logistics">
    	<div class="view-bg"></div>
        <div class="view-con">
        	<div class="view-tit">
            	<h3>物流信息</h3>
                <a href="JavaScript:;" guanbi="">
                	<img src="images/close-select-city.gif" />
                </a>
                <div style="clear:both;"></div>
            </div>
            <div class="view-bd">
            	<ul>
                	<li class="bd-pdl-li after"><span>1</span>2015-08-06　周四　　14:06:53您的订单开始处理</li>
                	<li class="after"><span>2</span>14:08:44您的订单待配货</li>
                	<li><span>3</span>14:16:04您的包裹已出库</li>
                	<li><span>4</span>14:16:03商家正通知快递公司揽件</li>
                	<li><span>5</span>21:47:54【惠州市】圆通速递 广东省惠州市惠东县收件员 已揽件</li>
                	<li class="bd-pdb-li"><span>6</span>22:13:51广东省惠州市惠东县公司 已发出</li>
                    <li class="bd-pdl-li"><span>7</span>2015-08-07　周五　　04:57:33广州转运中心公司 已收入</li>
                	<li><span>8</span>04:58:54广州转运中心公司 已发出</li>
                	<li><span>9</span>2015-08-08周六22:46:43重庆转运中心公司 已收入</li>
                	<li class="bd-pdb-li"><span>10</span>23:01:49【重庆市】重庆转运中心 已发出</li>
                    <li class="bd-pdl-li"><span>11</span>2015-08-09　周日　　00:57:11【重庆市】快件已到达 重庆市南岸区</li>
                	<li><span>12</span>11:14:52重庆市南岸区 已收入</li>
                	<li><span>13</span>11:14:52【重庆市】重庆市南岸区派件员：李天生 13330284757正在为您派件</li>
                	<li class="bd-bd-li"><span>14</span>15:53:14【重庆市】重庆市南岸区公司 已签收 签收人：保安，感谢使用圆通速递，期待再次为您服务</li>
                </ul>
                <p class="sign">您的包裹已被签收！</p>
            </div>
        </div>
    </div>
    
</body>
</html>
