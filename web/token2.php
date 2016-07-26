<?php
  define('BOT_TOKEN', '218027951:AAGFdVV7HssGRVn3WNA53BzPnozybS1NAaM');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  $chatID = $update["message"]["chat"]["id"]; 
  $messageText = $update["message"]["text"];
  //sql
  define('SQL_URL', '	MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a4c0_borbd');
  define('LOGIN','db_a0a4c0_borbd');
  define('PASS','0013boris');
  $mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);
  
  //$res = $mysqli->query("SELECT * FROM 	sqlupload");
  echo "123!";

  //$reply = ' Хорошего дня, ' . $update['message']['from']['first_name'] . $messageText;
  //$reply = $res;

  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
