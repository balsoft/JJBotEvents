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
 $mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);
$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT)");
$mysqli->query('INSERT IGNORE INTO Users VALUES ("'.$username.'","'.$chatID.'")');
$result = $mysqli->query("SELECT * FROM Users WHERE 1 LIMIT 0,25");

  
    $reply = $reply . ' Хорошего дня, ' . $username;
$reply=$reply.'. Ваш номер в таблице:'.$result->num_rows;
  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
  $mysqli->close();
?>
