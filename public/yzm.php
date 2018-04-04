<?php
	/**
	 *验证码函数可以输出一个验证码，
	 *@param int $mod 有三种情况如果为1 则输出一个只有数字的验证码 如果为2则输出一个数字加小写字母的验证码 如果为3则输出一个数字加小写加大写字母的验证码 默认为1 
	 *@param int $len 验证码长度 默认为4
	 *@return resource 不返回直接输出验证码图片
	 */
	function code($mod=1,$len=4,$width=120,$height=40){
		//1、创建画布
		$im = imagecreatetruecolor($width,$height);
		//2、创建颜色
		$bg[0] = imagecolorallocate($im, 255, 0, 0); 
		$bg[1] = imagecolorallocate($im, 0, 255, 0); 
		$bg[2] = imagecolorallocate($im, 0, 0, 255); 
		$bg[3] = imagecolorallocate($im, 255, 255, 0); 
		$bg[4] = imagecolorallocate($im, 255, 0, 255); 
		$bg[5] = imagecolorallocate($im, 0, 255, 255); 
		$text[0] = imagecolorallocate($im, 120, 32, 33); 
		$text[1] = imagecolorallocate($im, 40, 99, 188); 
		$text[2] = imagecolorallocate($im, 77, 11, 11); 
		$text[3] = imagecolorallocate($im, 177, 122, 188); 
		$text[4] = imagecolorallocate($im, 22, 33, 75); 
		$text[5] = imagecolorallocate($im, 142, 99, 188);
		//3、将内容输出到画布
		imagefill($im,0,0,$bg[rand(0,5)]);
		//获取随机数
		$str = "";
		$a = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if($mod==1){
			for($i=0;$i<$len;$i++){
				$str .= $a[rand(0,9)];
			}
		}else if($mod==2){
			for($i=0;$i<$len;$i++){
				$str .= $a[rand(0,35)];
			}
		}else if($mod==3){
			for($i=0;$i<$len;$i++){
				$str .= $a[rand(0,61)];
			}
		}
		//随机输出验证码字符
		for($i=0;$i<$len;$i++){
			imagettftext($im,24,rand(-15,15),5+25*$i,30,$text[rand(0,5)],"./msyh.ttf",$str[$i]);
		}

		//随机输出100个像素点
		for($i=0;$i<100;$i++){
			imagesetpixel($im,rand(0,$width),rand(0,$height),imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255)));
		}

		//随机输出50条线段
		for($i=0;$i<10;$i++){
			imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255)));
		}	

		//4、输出
		header("Content-type:image/png");
		imagepng($im);
}		
