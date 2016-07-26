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
  //if ($mysqli->connect_errno) {
  //  echo ("Не удалось подключиться /n";
  //} 
  echo "123456789";
  //$mysqli->query('INSERT INTO sqlupload VALUES ("1","4","2","3")');
  //$reply = $mysqli->query("SELECT name FROM sqlupload LIMIT 10");
  //$reply = ' Хорошего дня, ' . $update['message']['from']['first_name'] . $messageText;


  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
