<?php
  define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
  // read incoming info and grab the chatID
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  $chatID = $update["message"]["chat"]["id"];

  $messageText = $update["message"]["text"];
  
  $username = $update["message"]["from"]["first_name"];
  if(($username=="Margarita")&&(strpos($messageText, "http") !== false)){
    $shedule=fopen($messageText);
  }
  
    $reply = $reply . ' Хорошего дня, ' . $username;

  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
