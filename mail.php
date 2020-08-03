<?php

$project_name = "WrdSite";
$admin_email = "order@wrd.ru";
$subject = "Новый заказ";
$subject = "=?utf-8?B?" . base64_encode($subject) . "?=";
$from = $_POST["email"];
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$list1 = $_POST['list1'];
$list2 = $_POST['list2'];

  $arr = array(
    'Имя: ' => $name,
    'Email: ' => $email,
    'Пакет: ' => $list1,
    'Тип сайта: ' => $list2,
    'Сообщение: ' => $message,
  );
  
  $arr2 = array(
    'Имя: ' => $name,
    'Email: ' => $email,
    'Пакет: ' => $list1,
    'Тип сайта: ' => $list2,
    'Сообщение: ' => $message,
  );
  
$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/html; charset=utf-8\r\n";

$token = "1139026076:AAEXYImaNrLyhS6IF4OtjoUy1QQUg28DuJ4";
$chat_id = "-432118680";


  foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b> ".$value."%0A";
  };
  
    foreach($arr2 as $key => $value) {
    $txt2 .= "<b>".$key."</b> "."<p>".$value."</p>";
  };
  
  mail($admin_email, $subject, $txt2, $headers);
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}", "r");
