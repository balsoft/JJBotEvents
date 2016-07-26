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
 if($messageText=='/register'){
$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT)");
$mysqli->query('INSERT IGNORE INTO Users VALUES ("'.$username.'","'.$chatID.'")');
$reply = $reply.'Вы зарегистрировались. ';
}
if($messageText=="/unregister"){
  $reply='Функция будет добавлена позже. ';
}
if($messageText=='/schedule'){
   $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];
$file=fopen($fName,'r');
   while (($schedule=fgetcsv($file,1000,';')) !== FALSE) {
          $reply=$reply.$schedule[0].' '.$schedule[1].' '.$schedule[2].'\n';
        }
}
$users=$mysqli->query("SELECT * FROM Users WHERE 1 LIMIT 0,25");
if(strpos($messageText, 'http') !== false)
{
  $mysqli->query('TRUNCATE files');
  $mysqli->query('INSERT INTO files VALUES ("'.$messageText.'")');
  $reply=$reply.'Имя добавлено в таблицу. ';
}

    $reply = $reply . 'Хорошего дня, ' . $username;
  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
  $mysqli->close();
?>
