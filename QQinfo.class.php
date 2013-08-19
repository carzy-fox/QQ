<?php
class QQinfo{
/*
Get_IP_Place($IP)    //获取IP地理位置
Get_QQ_name($QQ)    //获取QQ昵称
Get_QQ_pic_40($QQ)    //获取QQ头像40*40
Get_QQ_pic_100($QQ)    //获取QQ头像100*100
Get_QQ_pic_140($QQ)    //获取QQ头像140*140
Get_QQ_pic_HD($QQ)    //获取QQ头像高清(会员专享)
Get_Qzone_pic_30($QQ)    //获取QQ空间头像 30*30
Get_Qzone_pic_50($QQ)    //获取QQ空间头像 50*50
Get_Qzone_pic_100($QQ)    //获取QQ空间头像 100*100
Is_VIP($QQ)    //是否为QQ会员
By: Crazy Fox
*/
	public function Get_IP_Place($IP){//获取IP地理位置
		$source = file_get_contents("http://opendata.baidu.com/api.php?query=". $IP ."&resource_id=6006");
		$place = $this->Get_Mid_Str($source, 'location":"', '",');
		return $place;
	}
	public function Get_QQ_name($QQ){//获取QQ昵称
		$source = file_get_contents("http://base.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins=" . $QQ);
		$QQ_name = $this->Get_Mid_Str($source, ',"', '",');
		return $QQ_name;
	}
	public function Get_QQ_pic_40($QQ){//获取QQ头像40*40
		$source = file_get_contents("http://ptlogin2.qq.com/getface?appid=1006102&imgtype=2&uin=" . $QQ);
		$source = str_replace("\\/","/",$source);
		$QQ_pic_40 = $this->Get_Mid_Str($source, '":"', '"}');
		return $QQ_pic_40;
	}
	public function Get_QQ_pic_100($QQ){//获取QQ头像100*100
		$source = file_get_contents("http://ptlogin2.qq.com/getface?appid=1006102&imgtype=3&uin=" . $QQ);
		$source = str_replace("\\/","/",$source);
		$QQ_pic_100 = $this->Get_Mid_Str($source, '":"', '"}');
		return $QQ_pic_100;
	}
	public function Get_QQ_pic_140($QQ){//获取QQ头像140*140
		$source = file_get_contents("http://ptlogin2.qq.com/getface?appid=1006102&imgtype=4&uin=" . $QQ);
		$source = str_replace("\\/","/",$source);
		$QQ_pic_140 = $this->Get_Mid_Str($source, '":"', '"}');
		return $QQ_pic_140;
	}
	public function Get_QQ_pic_HD($QQ){//获取QQ头像高清
		$source = file_get_contents("http://ptlogin2.qq.com/getface?appid=1006102&imgtype=5&uin=" . $QQ);
		$source = str_replace("\\/","/",$source);
		$QQ_pic_HD = $this->Get_Mid_Str($source, '":"', '"}');
		return $QQ_pic_HD;
	}
	public function Get_Qzone_pic_30($QQ){//获取QQ空间头像 30*30
		$Qzone_pic_30 = "http://qlogo2.store.qq.com/qzone/" . $QQ . "/" . $QQ . "/30"; 
		return $Qzone_pic_30;
	}
	public function Get_Qzone_pic_50($QQ){//获取QQ空间头像 50*50
		$Qzone_pic_50 = "http://qlogo2.store.qq.com/qzone/" . $QQ . "/" . $QQ . "/50"; 
		return $Qzone_pic_50;
	}
	public function Get_Qzone_pic_100($QQ){//获取QQ空间头像 100*100
		$Qzone_pic_100 = "http://qlogo2.store.qq.com/qzone/" . $QQ . "/" . $QQ . "/100"; 
		return $Qzone_pic_100;
	}
	private function Get_Mid_Str($Str, $Beg_Str, $End_Str){//获取文本中的内容
		$Beg_Str_l = strlen($Beg_Str);
		$End_Str_l = strlen($End_Str);
		$Str_ks = stripos($Str, $Beg_Str);
		if ($Str_ks > 0)
				$Str_js = stripos($Str, $End_Str, $Str_ks);
		else
				return "Error";
		if ($Str_js > 0)
				return substr($Str, $Str_ks + $Beg_Str_l, $Str_js - ($Str_ks + $Beg_Str_l));
		else
				return "Error";
	}
}
?>
