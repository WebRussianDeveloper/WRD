<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
 
  // Build POST request
  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
  $recaptcha_secret = '6LdAOMMZAAAAAOx3nm-0_OWzqpgMN4qimRvWLk5p';
  $recaptcha_response = $_POST['recaptcha_response'];

  // Make and decode POST request
  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
  $recaptcha = json_decode($recaptcha);
  if ($recaptcha->score >= 0.5) {
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
    'Тип сайта: ' => $list1,
    'Сообщение: ' => $message,
  );
  
  $arr2 = array(
    'Имя: ' => $name,
    'Email: ' => $email,
    'Тип сайта: ' => $list1,
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
  }
  else {
    echo "ХУЙ";
  }
}