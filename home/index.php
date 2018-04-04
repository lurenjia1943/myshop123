<?php
    session_start();
    require_once("../public/config.php");
    $m = mysql_connect(HOST,USER,PASS);
    mysql_select_db(DBNAME);
    mysql_set_charset("utf8");
    $sql = "SELECT * FROM goods";
    $result = mysql_query($sql);
    @$username=$_SESSION['home_username'];
    $sql2="select name from type where pid=1";
    $result2=mysql_query($sql2);
    $f1=mysql_result($result2, 1);
    $f2=mysql_result($result2, 2);
    $f3=mysql_result($result2, 3);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>中林-首页</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>
<body>
    <!--top 开始-->
    <div class="top">
        <div class="top-con w1200">
            <p class="t-con-l f-l">您好<?php echo "$username";?>，欢迎来到宅客微购</p>
            <ul class="t-con-r f-r">
                <li><a href="per.php">我 (个人中心)</a></li>
                <li><a href="shoppingcar.php">我的购物车</a></li>
                <li><a href="#">我的订单</a></li>
                <?php
                    if (!empty($_SESSION['home'])) {
                        echo "<li><a href='logout.php'>注销</a></li>";
                    }
                ?>
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
               <?php
                    if (empty($_SESSION['home'])) {
                        echo "<div class='btn1'>
                              <button class='btn1-l'><a href='reg.php'>注册</a></button>
                              <button class='btn1-r'><a href='login.php'>登录</a></button>
                              <div style='clear:both;'></div>
                              </div>";
                    }
                ?>    
            <button class="btn2">商家入口    ></button>
        </div>
        <div class="search f-r">
            <ul class="sp">
                <li class="current" ss-search="sp"><a href="JavaScript:;">商品</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div class="srh">
              <form method="get" action="search.php">
                <div class="ipt f-l">
                    <input type="text" placeholder="搜索商品..." ss-search-show="sp"  name="keywords" />
                </div>
                <button class="f-r">搜索</button>
                <div style="clear:both;"></div>
               </form>
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
    <div class="nav w1200">
        <ul>
    <?php
            $sql1="select * from type where pid=1";
            $result1=mysql_query($sql1);
            while ( $a=mysql_fetch_assoc($result1)) {
            echo "<li><a href='list.php?id={$a['id']}'>{$a['name']}</a></li>";
        }
    ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    
    <!--banner 开始-->
    <div class="banner-box">
        <div class="banner w1200">
            <ul>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/1.jpg"/></a></li>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/2.jpg"/></a></li>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/3.jpg"/></a></li>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/4.jpg"/></a></li>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/5.jpg"/></a></li>
                <li><a href="JavaScript:;"><img src="../public/goodsimg/index/1.jpg"/></a></li>
                <div style="clear:both;"></div>
            </ul>
            <a href="JavaScript:;" class="bnr bnr-left"style="left: 10px;"><</a>
            <a href="JavaScript:;" class="bnr bnr-right">></a>
        </div>
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
    
    <!--热门推荐-->
    <div class="hot-recommend w1200">
        <h3>热门推荐</h3>
        <ul class="">
            <li class="ys1">
                <a href="#"><img src="images/hot-tu1.jpg" /></a>
                <div class="ys1-opt"></div>
                <div class="ys1-ft">
                    <p>最唯美<br /><span>时尚酒店</span></p>
                    <a href="#">点击有实惠</a>
                </div>
            </li>
            <li class="ys2">
                <p>汽车保养</p>
                <a href="#" class="ys2-a1" style="margin-bottom:25px;">上门汽车保养1一元钱</a>
                <a href="#"><img src="images/hot-tu2.jpg" /></a>
            </li>
            <li class="ys2">
                <p>汽车保养</p>
                <a href="#" class="ys2-a1">上门汽车保养1一元钱</a>
                <a href="#"><img src="images/hot-tu3.jpg" /></a>
            </li>
            <li class="ys2" style=" width:298px;">
                <p>汽车保养</p>
                <a href="#" class="ys2-a1">上门汽车保养1一元钱</a>
                <a href="#"><img src="images/hot-tu4.jpg" /></a>
            </li>
            <li class="ys1">
                <a href="#"><img src="images/hot-tu5.jpg" /></a>
                <div class="ys1-opt"></div>
                <div class="ys1-ft">
                    <p>最实惠KTV<br /><span>最佳组合</span></p>
                    <a href="#">点击有实惠</a>
                </div>
            </li>
            <li class="ys1">
                <a href="#"><img src="images/hot-tu6.jpg" /></a>
                <div class="ys1-opt"></div>
                <div class="ys1-ft">
                    <p>最贴心家政<br /><span>包您满意</span></p>
                    <a href="#">点击有实惠</a>
                </div>
            </li>
            <li class="ys2">
                <p>汽车保养</p>
                <a href="#" class="ys2-a1" style="margin-bottom:12px;">上门汽车保养1一元钱</a>
                <a href="#"><img src="images/hot-tu7.jpg" /></a>
            </li>
            <li class="ys2" style="width:298px;">
                <p>汽车保养</p>
                <a href="#" class="ys2-a1" style="margin-bottom:15px;">上门汽车保养1一元钱</a>
                <a href="#"><img src="images/hot-tu8.jpg" /></a>
            </li>
            <div style="clear:both;"></div>
        </ul>
    </div>
    
    <!--广告栏-->
    <ul class="advertisement2">
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li style="border-right:none;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <div style="clear:both;"></div>
    </ul>
    
    <!--1 在线商城-->
    <div class="mall w1200 mt20">
        <div class="title1">
            <h3><span>1F </span><?php echo $f1;?></h3>
            <div style="clear:both;"></div>
        </div>
        <div class="ma-con">
            <div class="ma-con-l f-l">
                <div class="ma-l-t">
                    <a href="#"><img src="images/ma-l-tu.gif" /></a>
                </div>
                <div class="ma-l-b">
                <?php
                     $sql1="select * from type where pid=31";
                     $result1=mysql_query($sql1);
                     while ( $a=mysql_fetch_assoc($result1)) {
                     echo "<a href='list.php?id={$a['id']}' class='lm'>{$a['name']}</a>";
                  }
                 ?>
                </div>
            </div>
            <ul class="ma-con-r f-l">
                <?php
                    $n = 0;
                    while ($a = mysql_fetch_assoc($result)){
                        $production = mb_substr($a['content'],0,16,"utf-8")."...";
                        $li = <<<EOF
                        <li style="border-bottom:none;border-right:none;">
                            <h3><a href="#">{$a['name']}</a></h3>
                            <p><a href="#">{$production}</a></p>
                            <a href="shops.php?id={$a['id']}"><img src="../public/goodsimg/{$a['img']}"/></a>
                        </li>
EOF;
                            if ($a['tid']==33||$a['tid']==35||$a['tid']==36||$a['tid']==37||$a['tid']==38) {
                            echo $li;
                            $n++;
                            if($n==8){
                                break;
                            }
                            }
                    }
                    mysql_data_seek($result,8);
                ?>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    <!--广告栏 二-->
    <ul class="advertisement2">
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <li style="border-right:none;"><a href="#"><img src="../public/goodsimg/logo.png" /></a></li>
        <div style="clear:both;"></div>
    </ul>
    
    <!--2 餐饮娱乐-->
    <div class="dining w1200">
        <div class="title1">
            <h3><span style="color:#FDA30C;">2F </span><?php echo $f2;?></h3>
            <div style="clear:both;"></div>
        </div>
        <div class="din-con">
            <div class="lin-l f-l">
                <div class="lin-l-t">
                    <a href="#"><img src="images/din-l-tu.gif" /></a>
                </div>
                <div class="lin-l-b">
                <?php
                     $sql1="select * from type where pid=39";
                     $result1=mysql_query($sql1);
                     while ( $a=mysql_fetch_assoc($result1)) {
                     echo "<a href='list.php?id={$a['id']}' class='lm'>{$a['name']}</a>";
                  }
                 ?>
                </div>
            </div>
            <div class="lin-m f-l">
            <?php
                    mysql_data_seek($result,0);
                    $n = 0;
                    while ($a = mysql_fetch_assoc($result)){
                        $production = mb_substr($a['content'],0,16,"utf-8")."...";
                        $dl=<<<EOF
                        <dl>
                            <dt class="f-l"><a href="shops.php?id={$a['id']}"><img src="../public/goodsimg/{$a['img']}"/></a></dt>
                            <dd class="f-l">
                                <h3><a href="#">{$a['name']}</a></h3>
                                <p class="p1">{$production}</p>
                                <p class="p2"><span>{$a['price']}</span>  起</p>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
EOF;
                        if ($a['tid']==42) {
                            echo $dl;
                            $n++;
                            if($n==3){
                                break;
                            }
                            }
                    }
                ?>
            </div>
            <div class="lin-r f-l">
                <?php
                    $n = 0;
                    while ($a = mysql_fetch_assoc($result)){
                        $production = mb_substr($a['content'],0,16,"utf-8")."...";
                        $dl=<<<EOF
                        <dl style="border-right:none;">
                            <dt class="f-l"><a href="shops.php?id={$a['id']}"><img src="../public/goodsimg/{$a['img']}"/></a></dt>
                            <dd class="f-l">
                                <h3><a href="#">{$a['name']}</a></h3>
                                <p class="p1">包邮爆款低至{$a['price']}</p>
                                <p class="p2">买一赠一</p>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl>
EOF;
                        if ($a['tid']==43) {
                            echo $dl;
                            $n++;
                            if($n==8){
                                break;
                            }
                        }
                    }
                ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--广告栏 二-->
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
    
    <!--3 家政服务-->
    <div class="service w1200">
        <div class="title1">
            <h3><span style="color:#6995D8;">3F </span><?php echo $f3;?></h3>
            <div style="clear:both;"></div>
        </div>
        <div class="sv-con">
            <div class="sv-con-l f-l">
                <div class="sv-l-t">
                    <p>想找好家政，到宅客微购，<br />花样家政类型任你选，</p>
                    <a href="#"><img src="images/sv-con-l-tu.gif" /></a>
                </div>
                <div class="sv-l-b">
                    <div class="leiming" hover="rc">
                    <?php
                     $sql1="select * from type where pid=40";
                     $result1=mysql_query($sql1);
                     while ( $a=mysql_fetch_assoc($result1)) {
                     echo "<a href='list.php?id={$a['id']}' class='lm'>{$a['name']}</a>";
                  }
                 ?>         
                    </div>
                </div>
            </div>
            <ul class="sv-con-r f-r">
                <?php
                    $n = 0;
                    while ($a = mysql_fetch_assoc($result)){
                        $production = mb_substr($a['content'],0,16,"utf-8")."...";
                        $li = <<<EOF
                        <li style="margin-right:0; margin-bottom:0;">
                            <a href="shops.php?id={$a['id']}"><img src="../public/goodsimg/{$a['img']}"/></a>
                            <p>商家：{$a['name']}</p>
                            <p>类型：幼儿看护、日常家务、月嫂服务...</p>
                            <p>好评：<img src="images/sv-con-r-xx.gif" /></p>
                        </li>
EOF;
                        if($a['tid']==44 ){
                            echo $li;      
                            $n++;
                            if($n==8){
                                break;
                            }                      
                        }
                    }
                ?>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    <!--广告栏 二-->
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