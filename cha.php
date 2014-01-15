<?
if(!$_POST){
$data="请输入账号密码进行查询。";
}
$zjh=$_POST['zjh'];
$mm=$_POST['mm'];
$url='http://202.194.48.11:9004/loginAction.do';
$post="zjh=$zjh&mm=$mm";
$cookie_file=tempnam('./tmp','cookie');
$ch = curl_init($url) ;
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
curl_setopt($ch, CURLOPT_POST,1) ; 
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookie_file);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post); 
curl_exec($ch);
curl_close($ch);

$url='http://202.194.48.11:9004/bxqcjcxAction.do';
$ch = curl_init() ;  
curl_setopt($ch, CURLOPT_URL,$url) ; 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookie_file);
$data=curl_exec($ch);
$nodata="/\/img\/icon\/alert.gif/";
if (preg_match($nodata, $data)) {
    $data="密码输入错误，或服务器繁忙，请稍后再试！";
}

curl_close($ch); 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
 <meta http-equiv="keywords" content="鲁东大学查成绩,鲁东大学校外成绩查询,鲁东大学成绩" />
 <meta http-equiv="description" content="鲁东大学校外成绩查询系统,是鲁大学生网为更好的服务鲁大师生而开发的校外成绩查询系统,用户可使用非校内网络查询成绩。">
 </head>
 <body>
 <? echo $data ?>
  <div style="display:none"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5796710'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D5796710' type='text/javascript'%3E%3C/script%3E"));</script></div>
 </body>
 </html>