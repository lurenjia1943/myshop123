<?php
    $id=$_GET['id'];
    session_start();
    require_once("../public/config.php");
    $m = mysql_connect(HOST,USER,PASS);
    mysql_select_db(DBNAME);
    mysql_set_charset("utf8");
    $sql="select * from goods where id=$id";
    $result=mysql_query($sql);
    $rel=mysql_fetch_assoc($result);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品详情</title>
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
            while ( $a=mysql_fetch_assoc($result1)) {
            echo "<li><a href='list.php?id={$a['id']}'>{$a['name']}</a></li>";
        }
    ?>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    </div>
    
    <!--内容开始-->
    <div class="details w1200">
    	<div class="deta-info1">
        	<div class="dt-if1-l f-l">
            	<div class="dt-if1-datu">
                	<ul qie-da="">
                    <?php
                    echo 
                      "<li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-tuda1.jpg' /></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-tuda2.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-tuda3.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-tuda4.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-tuda5.jpg'/></a></li>";
                    ?>   
                       <div style="clear:both;"></div>
                    </ul>
                </div>
                <div class="dt-if1-qietu">
                	<a class="dt-qie-left f-l" href="JavaScript:;"><img src="images/dt-if1-qietu-left.gif" /></a>
                    <div class="dt-qie-con f-l">
                    	<ul qie-xiao="">
                    <?php        
                      echo "
                       <li><a href='' class='current'><img src='../public/goodsimg/{$id}/dt-if1-l-qietu1.jpg' /></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-qietu2.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-qietu3.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-qietu4.jpg'/></a></li>
                       <li><a href=''><img src='../public/goodsimg/{$id}/dt-if1-l-qietu5.jpg'/></a></li>";
                    ?>  
            				<div style="clear:both;"></div>
                        </ul>
                    </div>
                	<a class="dt-qie-right f-r" href="JavaScript:;"><img src="images/dt-if1-qietu-right.gif" /></a>
                </div>
                <div class="dt-if1-fx">
                	<span>商品编码:128618586</span>
                    <p>分享到：<a href="#"><img src="images/dt-xl.gif" /></a><a href="#"><img src="images/dt-kj.gif" /></a><a href="#"><img src="images/dt-wx.gif" /></a></p>
                </div>
            </div>
            
        	<div class="dt-if1-m f-l">
            	<div class="dt-ifm-hd">
                	<h3><a href="#"><?php echo "{$rel['name']}";?></a></h3>
                	<p><?php echo "{$rel['content']}";?></p>
                </div>
                <div class="dt-ifm-gojia">
                	<dl>
                    	<dt>宅购价</dt>
                        <dd>
                        	<p class="p1">
                               <span class="sp1"><?php echo "{$rel['price']}";?></span>
                            </p>
                            <p class="p2">
                            	<span class="sp1"><img src="images/dt-ifm-sp1-img.gif" />5分</span><span class="sp2">共有 2 条评价</span>
                            </p>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                </div>
                <dl class="dt-ifm-spot">
                	<dt>活动</dt>
                    <dd>
                    	<P><span>包邮</span>本店满50.00元免运费</P>
                    	<P><span>满赠</span>本店满500.00元赠300.00元礼品（随机赠送）</P>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <dl class="dt-ifm-box1">
                	<dt>送时</dt>
                    <dd>
                    	<select>
                        	<option>请选择配送日期</option>
                        	<option>2015-8-31</option>
                        	<option>2015-8-32</option>
                        </select>
                    	<select>
                        	<option>请选择配送时段</option>
                        	<option>上午</option>
                        	<option>下午</option>
                        </select>
                        <p>每天会有4个时间段统一配送，还有一个加急送，如果提前两天预定，还可以享受折扣哦！</p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <dl class="dt-ifm-box2">
                	<dt>送至</dt>
                    <dd>
                    	<select>
                        	<option>新疆   乌鲁木齐</option>
                        	<option>新疆   乌鲁</option>
                        	<option>新疆   木齐</option>
                        </select>
                    	<span>请选择配送地址</span>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="dt-ifm-box4">
                <?php
                $str=<<<EOF
                	<button class="btn1"><a href="./orders.php?id={$id}">立即购买</a></button>
                	<button class="btn2"><a href="./shoppingcar.php?id={$id}">加入购物车</a></button>
EOF;
                echo $str;
                ?>
                </div>
            </div>
            
        	<div class="dt-if1-r f-r">
                <div class="dt-ifr-fd">
                	<div class="dt-ifr-tit">
                    	<h3>同类推荐</h3>
                    </div>
                    <?php
                        $sql2="select tid from goods where id=$id";
                        $result2=mysql_query($sql2);
                        $rel2=mysql_result($result2,0);
                        $sql3="select * from goods where tid=$rel2";
                        $result3=mysql_query($sql3);
                        $n=0;
                        while ($rel3=mysql_fetch_assoc($result3)) {
                            $str=<<<EOF
                        <dl>
                            <dt><a href="shops.php?id={$rel3['id']}"><img src="../public/goodsimg/{$rel3['imgsrc']}" /></a></dt>
                            <dd>
                                <a href="#">{$rel3['name']}</a>
                                <p>¥{$rel3['price']}</p>
                            </dd>
                            <div style="clear:both;"></div>
                       </dl>
EOF;
                        $n++;
                        echo $str;
                        if($n==3){
                                break;
                            }
                     }
                    ?>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        
        <div class="deta-info2">
        	<div class="dt-if2-l f-l">
            	<div class="if2-l-box1">
                	<div class="if2-tit">
                    	<h3>浏览记录</h3>
                    </div>
                    <ul>
                    	<li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li style="border-bottom:0;">
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                    </ul>
                </div>
                <div class="if2-l-box1" style="margin-top:18px;">
                	<div class="if2-tit">
                    	<h3>看了又看</h3>
                    </div>
                    <ul>
                    	<li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li style="border-bottom:0;">
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a class="if2-li-tit" href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="dt-if2-r f-r">
                <ul class="if2-tit2">
                    <li class="current" com-det="dt1"><a href="JavaScript:;">产品信息</a></li>
                    <li com-det="dt2"><a href="JavaScript:;">商品评论</a></li>
                    <li com-det="dt3"><a href="JavaScript:;">商家信息</a></li>
                    <div style="clear:both;"></div>
                </ul>
                <div style="border:1px solid #DBDBDB;" com-det-show="dt1">
                	<div class="if2-tu1">
                    <?php
                        echo "<img src='../public/goodsimg/{$id}/if2-tu1.jpg' />";
                    ?>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="if2-tu2">
                      <?php
                        echo "<img src='../public/goodsimg/{$id}/if2-tu2.jpg' />";
                    ?>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="if2-tu3">
                        <?php
                        echo "<img src='../public/goodsimg/{$id}/if2-tu3.jpg' />";
                    ?>
                    </div>
                    <ul class="if2-tu4">
                        <?php
                        echo "<img src='../public/goodsimg/{$id}/if2-tu4.jpg' />";
                    ?>
                        <div style="clear:both;"></div>
                    </ul>
                </div>
                <div style="display:none;" com-det-show="dt2">
                	<dl class="if2-r-box2">
                	<dt>
                    	<p class="box2-p1">好评率</p>
                    	<p class="box2-p2">96.5%</p>
                    	<p class="box2-p3">共539人评论</p>
                    </dt>
                    <dd>
                    	<P>买过的人觉得</P>
                        <ul>
                        	<li><a href="#">香脆可口(198)</a></li>
                        	<li><a href="#">口感不错(160)</a></li>
                        	<li><a href="#">分量足(84)</a></li>
                        	<li><a href="#">味道不错(47)</a></li>
                        	<li><a href="#">价格便宜(34)</a></li>
                        	<li><a href="#">包装不错(30)</a></li>
                        	<li><a href="#">吃货必备(26)</a></li>
                        	<li><a href="#">送货快(14)</a></li>
                        	<li><a href="#">孩子喜欢(4)</a></li>
            				<div style="clear:both;"></div>
                        </ul>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                	<div class="if2-r-box3">
                	<ul>
                    	<li class="current-li"><a href="#">全部（539）</a></li>
                    	<li><a href="#">好评（536）</a></li>
                    	<li><a href="#">中评（2）</a></li>
                    	<li><a href="#">差评（1）</a></li>
                    	<li><a href="#">图片（1）</a></li>
                    	<li><a href="#">追加评论（1）</a></li>
                        <div style="clear:both;"></div>
                    </ul>
                    <dl>
                    	<dt>
                        	<a href="#"><img src="images/box3-dt-tu.gif" /></a>
                        </dt>
                        <dd>
                        	<a href="#">胡**</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！！！！！！</p>
                            <p class="b3-p2">2015-12-12    16:57:22  </p>
                        </dd>
            			<div style="clear:both;"></div>
                    </dl>
                    <dl>
                    	<dt>
                        	<a href="#"><img src="images/box3-dt-tu.gif" /></a>
                        </dt>
                        <dd>
                        	<a href="#">胡**</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！！！！！！</p>
                            <p class="b3-p2"><span></span><span></span>2015-12-12    16:57:22</p>
                            <div style="clear:both;"></div>
                            <div class="b3-zuijia">
                            	<p class="zj-p1">追加评论：</p>
                            	<p class="zj-p2">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！！！！！！</p>
                            	<p class="zj-p3">2015-12-12    16:57:22</p>
                            </div>
                        </dd>
            			<div style="clear:both;"></div>
                    </dl>
                    
                    <!--分页-->
           			<div class="paging">
            	<div class="pag-left f-l">
                	<a href="#" class="about left-r f-l"><</a>
                    <ul class="left-m f-l">
                    	<li><a href="#">1</a></li>
                        <li class="current"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">100</a></li>
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
                <div class="if2-r-box4" style="display:none;" com-det-show="dt3">
                	<div class="b4-tit">
                    	<h3>店铺所有商品</h3>
                    </div>
                    <div class="b4-con1">
                    	<a href="#">饼干糕点</a>
                    	<a href="#">坚果果仁</a>
                    	<a href="#">海味肉食</a>
                    	<a href="#">糖果巧克力</a>
                    	<a href="#">豆干炒货</a>
                    	<a href="#">休闲膨化</a>
                    	<a href="#">饮品冲调</a>
                    	<a href="#">蜜饯果脯</a>
                    	<a href="#">方便速食</a>
                    	<a href="#">饼干糕点</a>
                    	<a href="#">坚果果仁</a>
                    	<a href="#">海味肉食</a>
                    	<a href="#">糖果巧克力</a>
                    	<a href="#">豆干炒货</a>
                    	<a href="#">休闲膨化</a>
                    	<a href="#">饮品冲调</a>
                    	<a href="#">蜜饯果脯</a>
                    	<a href="#">方便速食</a>
                    </div>
                	<div class="b4-tit">
                    	<h3>店铺热销商品</h3>
                    </div>
                    <ul>
                    	<li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
                        <li>
                        	<a href="#"><img src="images/if2-l-box1-tu1.gif" /></a>
                            <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                            <p>¥6.90</p>
                        </li>
            			<div style="clear:both;"></div>
                    </ul>
                </div>
            </div>
            <div style="clear:both;"></div>
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
