<?php
	/**
	 *验证码函数可以输出一个验证码，
	 *@param int $mod 有三种情况如果为1 则输出一个只有数字的验证码 如果为2则输出一个数字加小写字母的验证码 如果为3则输出一个数字加小写加大写字母的验证码 默认为1 
	 *@param int $len 验证码长度 默认为4
	 *@return resource 不返回直接输出验证码图片
	 */
	function code($len=3,$width=90,$height=40){
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
		$b=rand(0,9);
		$c=rand(0,9);
		$str="$b+$c";
		$a=$b+$c;
		$_SESSION['YZM']=$a;
		//随机输出验证码字符
		for($i=0;$i<$len;$i++){
			imagettftext($im,24,0,5+25*$i,30,$text[rand(0,5)],"./msyh.ttf",$str[$i]);
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

		
	/**
	 *统计目录大小函数
	 *@param str $path 传入路径
	 *@return int $size 返回目录大小
	 */
	function dirsize($path){
		//第一步判断传入参数是否为文件夹
		$path = rtrim($path,"/");
		if(is_dir($path) != 1 ){
			die("dirsize()只能用来统计文件夹大小!");
		}
		//第二步打开文件夹
		$dir = opendir($path);
		//第三步过滤.和..
		// readdir($dir);
		// readdir($dir);
		//遍历统计目录大小
		$size = 0;
		while ($file = readdir($dir)) {
			if($file == "." or $file == ".."){
				continue;
			}
			if(is_file($path."/".$file)){
				$size += filesize($path."/".$file);
			}else{
				$size += dirsize($path."/".$file);

			}
		}

		return $size;
	}
	/**
	 *验证码函数可以输出一个验证码，
	 *@param array $name 用户上传文件得到的全局数组$_FILES['name'] 
	 *@param array $arr 用户上传的文件类型组成的数组
	 *@param str $path 上传以后的文件保存的路径
	 *@param int $size 上传文件大小
	 *@return string 如果上传成功则返回上传的文件名，上传失败则返回0
	 */
	function fileupload($name,$arr,$path,$size=1024){
		$size = 1024*$size;
		$path = rtrim($path,"/");

		header("Content-type:text/html;Charset=utf8");
		$file = $name;
		if($file['error']==4){
			die("请选择文件后上传");
		}

		if($file['error']!=0){
			die("系统错误");
		}
		if($file['size']>$size){
			die("上文件过大,应该限制在10k以内");
		}


		if(!in_array($file['type'],$arr)){
			die("上文件类型不符合");
		}

		$filename = time().rand(111111,999999);
		$houzhui = explode("/", $file['type']);
		while(is_file($path.$filename.".".$houzhui[1])){
			$filename = time().rand(111111,999999);
		}
		if(is_uploaded_file($file['tmp_name'])){
			$re = move_uploaded_file($file['tmp_name'],$path."/".$filename.".".$houzhui[1]);
			if($re){
				return $filename.".".$houzhui[1];
			}else{
				return 0;
			}
		}else{
			die("非法入侵!该次操作信息已记录日志");

		}
		
	}
	/**
	 *验证码函数可以输出一个验证码，
	 *@param string $tupain 用户要缩小的图片
	 *@param int $width 设置缩放后的最大宽高
	 *@param string $path 设置缩放后的图片的存储路径
	 *@return string 如果缩放成功则返回缩放后的文件名，如果缩放失败则返回0
	 */	
	function suoimg($tupian,$size,$path){




		$info = getimagesize($tupian);

		if($info[0]>=$info[1]){
			$width = $size;
			$height = $size*($info[1]/$info[0]);
		}else{
			$height = $size;
			$width = $size*($info[0]/$info[1]);			
		}
		$im = imagecreatetruecolor($width,$height);

		switch ($info[2]) {
			case 1:
				$img = imagecreatefromgif($tupian);
				break;
			case 2:
				$img = imagecreatefromjpeg($tupian);
				break;
			case 3:
				$img = imagecreatefrompng($tupian);
				break;			
			default:
				die("类型不符合！");
				break;
		}
		imagecopyresampled($im,$img,0,0,0,0,$width,$height,$info[0],$info[1]);

		$path = rtrim($path,"/")."/";
		$name = time().rand(111,999);
		while (is_file($path.$name."jpg")) {
			$name = time().rand(111,999);
		}

		$re = imagejpeg($im,$path.$name.".jpg");

		if($re)
			return $name.".jpg";
		else
			return 0;

		imagedestroy($im);
		imagedestroy($img);

	}