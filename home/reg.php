<?php
    session_start();
    require_once('../public/config.php');
    $m = mysql_connect(HOST,USER,PASS) or die("系统错误，请联系管理员，错误编号001");
    mysql_select_db(DBNAME);
    mysql_set_charset('utf8');
    $reg1="/^[a-zA-Z_][0-9a-zA-Z_]{5,}/";//密码正则
    $reg2 ="/^1[34578]\d{9}$/";//手机号正则
    @$username = $_POST['username'];
    @$password1 = $_POST['password1'];
    @$password1=md5($password1);
    @$password2 = $_POST['password2'];
    @$tel = $_POST['tel'];
    @$code=$_POST['code'];
    $status = 1;
    @$hobby=$_POST['hobby'];
    @$isfirst=$_POST['isfirst'];
    $a=$b=$c=$d=$e=0;
    $YZM=@$_SESSION['YZM'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/shopping-mall-index.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/zhonglin.js"></script>
</head>
<body>
    <form action="reg.php" method="post">
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
    <div class="password-con registered">
    	<div class="psw">
        	<p class="psw-p1">用户名</p>
            <input type="text" name="username" placeholder="HR了" />
            <?php 
            if (empty($username)) {
                echo "<span class='cuo'>请填写账号</span>";
            $a='cuo';
            } else{
                echo "<span class='dui'></span>";
             $a='dui';
            }
        ?>
        </div>
    	<div class="psw">
        	<p class="psw-p1">输入密码</p>
            <input type="text" name="password1" placeholder="请输入密码" />
            <?php 
            if (empty($password1) || preg_match($reg1,$password1)==0) {
                echo "<span class='cuo'>密码必须是6位以上,由字母开头.</span>";
            $b='cuo';
            } else{
                echo "<span class='dui'></span>";
             $b='dui';
            }
        ?>
        </div>
    	<div class="psw">
        	<p class="psw-p1">确认密码</p>
            <input type="text" name="password2" placeholder="请再次确认密码" />
            <?php 
            if ($password1 !=$password2) {
               echo "<span class='cuo'>两次密码不一致</span>";
            $c='cuo';
            } else{
                echo "<span class='dui'></span>";
             $c='dui';
            }?>
        </div>
    	<div class="psw psw2">
        	<p class="psw-p1">手机号</p>
            <input type="text" name="tel" placeholder="请输入手机号" />
        <?php 
            if (empty($tel)||preg_match($reg2, $tel)==0) {
                echo "<span class='cuo'>请填写正确的手机号</span>";
            }else{
                $sql1 = "SELECT id FROM users WHERE tel={$tel}";
                $result1 = mysql_query($sql1);
                $re1 = @mysql_result($result1,0,0);
                 if($re1>1){
                       echo "<span class='cuo'>手机号码已存在，请换个手机号</span>";
                    mysql_free_result($result1);
                    $d='cuo';
                  }else{
                        echo "<span class='dui'></span>";
                        $d='dui';
                        }
                        
            }?>
        </div>
    	<div class="psw psw3">
        	<p class="psw-p1">验证码</p>
            <input type="text" name="code" placeholder="请输入验证码" />
            <?php  
            if ($code!=$YZM) {
                echo "<span class='cuo'>验证码错误</span>";
            $e='cuo';
        }else{
                echo "<span class='dui'></span>";
            $e='dui';
            }?>
        </div>
        <div class="yanzhentu">
        	<div class="yz-tu f-l">
            	<img src="code.php" style="width:163px;height: 64px;" onclick="this.src='code.php'">
            </div>
            <p class="f-l">看不清？<a href="#">换张图</a></p>
            <div style="clear:both;"></div>
        </div>
        <div class="agreement">
        	<input type="checkbox" name="hobby"></input>
            <p>我有阅读并同意<span>《宅客微购网站服务协议》</span></p>
        </div>
        <button class="psw-btn">立即注册</button>
        <p class="sign-in">已有账号？请<a href="#">登录</a></p>
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
    <input type="hidden" name="old" value="1"></input>
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
    <input type="hidden" name="isfirst" value="1">
    </form>
</body>
</html>
<? 
    if ($isfirst==1) {
        if (empty($hobby)) {
            echo "<script>alert('请同意网站协议！')</script>";
        }
        if ($a=='dui'&&$b=='dui'&&$c=='dui'&&$d=='dui'&&$e=='dui'&&!empty($hobby)){
            $time = time();
            $sql2 = "INSERT INTO users(username,password,tel,status,time) values('{$username}','{$password1}',{$tel},'{$status}',{$time})";
            $result2 = mysql_query($sql2);
        if($result2){
            echo "<script>alert('注册成功！')</script>";
        }
     }
    }
?>