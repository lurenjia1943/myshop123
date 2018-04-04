<?php
    $id=$_GET['id'];
    if (empty($id)) {
        header('location:index.php');
    }
    require_once("../public/config.php");
    $m = mysql_connect(HOST,USER,PASS);
    mysql_select_db(DBNAME);
    mysql_set_charset("utf8");
    $sql="select * from type where id={$id}";
    $result=mysql_query($sql);
    $a=mysql_fetch_assoc($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>家居建材首页</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/shopping-mall-index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>

<body>
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
        	<h1><a href="index.php" title="中林网站"><img src="images/logo.jpg" /></a></h1>
        </div>
        <div class="dianji f-r">
        	<div class="btn1">
            	<button class="btn1-l">注册</button>
                <button class="btn1-r">登录</button>
                <div style="clear:both;"></div>
            </div>
            <button class="btn2">商家入口    ></button>
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

    <!--nav 开始-->
    <div style="border-bottom:2px solid #F09E0B;">
    	<div class="nav w1200">
        <ul>
    <?php
             $sql1="select * from type where pid=1";
             $result1=mysql_query($sql1);
             while ( $b=mysql_fetch_assoc($result1)) {
             echo "<li><a href='list.php?id={$b['id']}'>{$b['name']}</a></li>";
        }
    ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    
    <!--banner 图-->
    <div class="style-banner">
    	<a href="#"><img src="images/banner-tu.gif" /></a>
    </div>
    
    <!--广告栏-->
    	<ul class="advertisement2">
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li style="border-right:none;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <div style="clear:both;"></div>
    </ul>
        
    <!--公司logo栏-->
    <div class="beaut-lg w1200">
    	<div class="beaut-left f-l">
        	<dl>
            	<dt><?php echo $a['name'];?></dt>
                <dd><?php
                    $sql="select * from type where path like '%,{$a['id']},%'";
                    $result=mysql_query($sql);
                    $aa=@mysql_result($result, 0,0);
                    if ($aa) {
                        mysql_data_seek($result, 0);
                        while ($d=mysql_fetch_assoc($result)) {
                        echo "<a href='list.php?id={$d['id']}'>{$d['name']}</a>";
                    }
                    }else{
                        echo "没有子分类";
                    }
                    ?>
                </dd>
            </dl>
        </div>
    	<ul class="f-r" style="width:902px;">
        	<li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        	<li style="width:155px; border-right:0;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        	<li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        	<li style="width:155px; border-right:0;"><a href="#"><img src="../public/goodsimg/logo.png"/></a></li>
            
        	<li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        	<li style="width:155px; border-right:0;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            
        	<li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        	<li style="width:155px; border-right:0;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    
    <!--广告栏-->
    <ul class="advertisement2">
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png"  /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li style="border-right:none;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <div style="clear:both;"></div>
    </ul>
        
    <!--内容页面-->
    <div class="shopping-content w1200">
    	<div class="sp-con-info">
        	<ul class="sp-info-r m-act beaut">
                <?php
                    $sql3="select * from type where path like '%,{$a['id']},%'";
                    $result3=mysql_query($sql3);
                    @$aaa=mysql_result($result3, 0,0);
                     $m=0;
                     $n=0;
                if (!empty($aaa)) {
                    mysql_data_seek($result3, 0);       
                    while ($c=mysql_fetch_assoc($result3)) {
                        $sql5="select count(*) from goods where tid={$c['id']}";
                        $result5=mysql_query($sql5);
                        $num=mysql_result($result5,0); 
                        $m=$num+$m;  //计算总共有多少商品
                    $sql4="select * from goods where tid={$c['id']}";
                    $result4=mysql_query($sql4);
                    while ($d=mysql_fetch_assoc($result4)) {
                        $li=<<<EOF
                        <li>
                    <div class="li-top">
                        <a href='./shops.php?oid={$d['id']}' class="li-top-tu"><img src="../public/goodsimg/{$d['img']}" /></a>
                        <p class="jiage"><span class="sp1">{$d['price']}</span></p>
                    </div>
                    <p class="miaoshu">{$d['name']}</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1"><a href="shops.php?id={$d['id']}">立即购买</a></button>
                            <button class="md-l-btn2"><a href="shoppingcar.php?id={$d['id']}">加入购物车</a></button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>
EOF;
                        echo $li;
                        $n++;
                        if($n==5){
                            break;
                        }
                    }
                    }
                    }else{
                        $sql4="select * from goods where tid=$id";
                        $result4=mysql_query($sql4);
                        $sql5="select count(*) from goods where tid=$id";
                        $result5=mysql_query($sql5);
                        $m=mysql_result($result5,0); 
                        while ($d=mysql_fetch_assoc($result4)) {
                        $li=<<<EOF
                            <li>
                        <div class="li-top">
                            <a href="./shops.php?oid={$d['id']}" class="li-top-tu"><img src="../public/goodsimg/{$d['img']}" /></a>
                            <p class="jiage"><span class="sp1">{$d['price']}</span></p>
                        </div>
                        <p class="miaoshu">{$d['name']}</p>
                        <div class="li-md">
                            <div class="md-l f-l">
                                <p class="md-l-l f-l" ap="">1</p>
                                <div class="md-l-r f-l">
                                    <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                    <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="md-r f-l">
                                <button class="md-l-btn1"><a href="shops.php?id={$d['id']}">立即购买</a></button>
                            <button class="md-l-btn2"><a href="shoppingcar.php?id={$d['id']}">加入购物车</a></button>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <p class="pingjia">88888评价</p>
                        <p class="weike">微克宅购自营</p>
                    </li>
EOF;
                        echo $li;
                        $n++;
                        if($n==5){
                            break;
                        }
                    }
                }
                ?>         
                <div style="clear:both;"></div>
            </ul>
            <!--分页-->
            <div class="paging">
            	<div class="pag-left f-l">
                	<a href="#" class="about left-r f-l"><</a>
                    <ul class="left-m f-l">
                    <?php
                        $pages = ceil($m/5);
                        for ($i=1; $i <=$pages ; $i++) {
                            echo "<li><a href='list.php'>$i</a></li>";
                        }
                    ?>
                        <div style="clear:both;"></div>
                    </ul>
                	<a href="#" class="about left-l f-l">></a>
                    <div style="clear:both;"></div>
                </div>
            	<div class="pag-right f-l">
                	<div class="jump-page f-l">
                        到第<input type="text" />页
                    </div>
                    <button class="f-l">确定</button>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
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
