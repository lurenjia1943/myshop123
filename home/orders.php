<?php
    header("content-type:text/html;charset=utf8");
    session_start();
    require_once("../public/config.php");
    if (empty($_SESSION['home_username'])) {
        header("location:index.php");
    }
    $m = mysql_connect(HOST,USER,PASS);
    mysql_select_db(DBNAME);
    mysql_set_charset("utf8");
    @$num = $_POST['num'];
    $orders=$_SESSION['shoppingcar'];
    $time=time();
    $uid=$_SESSION['home_username'];
    $oid=$_SESSION['id'];
    $order_num="$oid$time";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>确认订单</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/shopping-mall-index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>

<body style="position:relative;">
	<!--top 开始-->
    <div class="top">
    	<div class="top-con w1200">
        	<p class="t-con-l f-l">您好，欢迎来到宅客微购</p>
            <ul class="t-con-r f-r">
            	<li><a href="#">我 (个人中心)</a></li>
            	<li><a href="#">我的购物车</a></li>
            	<li><a href="#">我的订单</a></li>
            	<li class="erweima">
                	<a href="#">扫描二维码</a>
                    <div class="ewm-tu">
                    	<a href="#"><img src="images/erweima-tu.jpg" /></a>
                    </div>
                </li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--logo search 开始-->
    <div class="hd-info1 w1200">
    	<div class="logo f-l">
        	<h1><a href="#" title="中林网站"><img src="images/logo.jpg" /></a></h1>
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

    <div class="payment-interface w1200">
        <div class="pay-info">
        	<div class="info-tit" style="border-bottom:0;">
            	<h3>订单信息</h3>
            </div>
        </div>
        <div class="cart-con-info">
        	<div class="cart-con-tit" style="margin:20px 0 5px;">
                <p class="p1" style="width:270px;">
                    <span></span>
                </p>
                <p class="p4" style="width:130px;">数量</p>
                <p class="p5">单价（元）</p>
                <p class="p6" style="width:173px;">金额（元）</p>
            </div>
<?php
        $m=0;
        $n=0;
        foreach ($orders as $k => $v) {
        $str=<<<EOF
            <div class="info-mid">
                <div class="mid-tu f-l" >
                	<a href="#"><img src="../public/goodsimg/{$v['imgsrc']}" /></a>
                </div>
                <div class="mid-font f-l" style="margin-right:40px;" style="width:150px;">
                	<a href="#">{$v['content']}</a>
                </div>
                <div class="mid-sl f-l" style="margin:10px 54px 0px 0px;" style="width:100px;">
                    <input type="text" readonly value="{$num[$n]}" />
                </div>
                <p class="mid-dj f-l">¥ {$v['price']}</p>
                <p class="mid-je f-l" style="margin:10px 120px 0px 0px;">¥ {$v['price']}</p>
                <div style="clear:both;"></div>
            </div>
EOF;
        echo $str;
        $a=$v['price']*$num[$n];
        $m=$m+$a;
        @$gid = $gid."@@".$v['id']."@@".$num[$n];
        $n++;
        }
?>
            <div class="info-heji">
                <p class="f-r">店铺合计(含运费)：<span>¥ <?php echo $m; ?></span></p>
                <h3 class="f-r">订单号：<?php echo $order_num;?></h3>
            </div>
<form action="action.php" method="POST">
            <div class="info-tijiao">
                收件人：<input type="text" name="name" value="">
                电话：<input type="text" name="tel" value="">
                地址：<input type="text" name="address" value="">
                备注：<input type="text" name="beizhu" value="">
                <p class="p1">实付款：<span>¥ <?php echo $m; ?></span></p>
                <button class="btn" type="submit">提交订单</button>
            </div>
            <input type="hidden" name="a" value="orders">
            <input type="hidden" name="uid" value="<?php echo $uid;?>">
            <input type="hidden" name="gid" value="<?php echo $gid;?>">
            <input type="hidden" name="price" value="<?php echo $m;?>">
            <input type="hidden" name="uid" value="<?php echo $uid;?>">
            <input type="hidden" name="order_num" value="<?php echo $order_num;?>">
</form>
        </div>
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
    
</body>
</html>
