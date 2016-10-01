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
  function translateToEpoch($time){
    return DateTime::createFromFormat('G:i',$time, new DateTimeZone('Europe/Moscow'))->getTimestamp();
  }
  $messageText = $update["message"]["text"];
  
  $username = $update["message"]["from"]["first_name"];
  $user = $update["message"]["chat"]["username"];
   $mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);
if(strpos($messageText, 'сейчас'))$messageText='/now';
if(strpos($messageText, 'потом'))$messageText='/next';
if(strpos($messageText, 'расписание'))$messageText='/schedule';
 if($messageText=='/register'){
$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT)");
$mysqli->query('INSERT IGNORE INTO Users VALUES ("'.$username.'","'.$chatID.'")');
$reply = $reply.'Вы зарегистрировались. ';
}
if($messageText=="/unregister"){
  $mysqli->query("DELETE FROM TABLE Users WHERE chatID = '".$chatID."'");
  $reply='Регистрация отменена. ';
}
if($messageText=='/help'){
  $reply=urlencode("Бот для проекта Join the joy. Команды: \r\n /schedule - расписание \r\n /now - событие, которое идёт сейчас \r\n /next - событие, которое буде следующим  \r\n /register - подписатся на наличие обновлений. ");
}
if($messageText=="/next"){
    $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];
$file=fopen($fName,'r');
$schedule=fgetcsv($file,1000,',');
$reply='Через ';
   while (($schedule=fgetcsv($file,1000,',')) !== FALSE) {
          if(translateToEpoch($schedule[0])>microtime(true)){
$reply=$reply.round((translateToEpoch($schedule[0])-microtime(true))/60).' минут будет ';
            $reply=$reply.$schedule[1].'. ';
            break;
          }
        }
}

if($messageText=='/now'){
   $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];
$file=fopen($fName,'r');
$schedule=fgetcsv($file,1000,',');
$reply='Сейчас идет ';
   while (($schedule=fgetcsv($file,1000,',')) !== FALSE) {
          if(translateToEpoch($schedule[0])>microtime(true)){
            $reply=$reply.$prevSchedule[1].'. ';
            break;
          }
          $prevSchedule=$schedule;
        }
}
if(strpos($messageText, '/shout') !== false){
$users=$mysqli->query("SELECT * FROM Users WHERE 1");
while ($row = $users->fetch_assoc()){
                        $reply = explode('|',$messageText)[1];
                        $reply = $username . 'Сказал'.$reply;
                         $sendto = API_URL . "sendmessage?chat_id=" . $row["chatID"] . "&text=" . $reply;
                         file_get_contents($sendto);
                  } 
}
if($messageText=='/schedule'){
 $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];
    $file=fopen($fName,'r');
    $schedule=fgetcsv($file,1000,',');
   while (($schedule=fgetcsv($file,1000,',')) !== FALSE) {
     $reply=$reply.urlencode($schedule[0].' '.$schedule[1].PHP_EOL);
   }
}
$users=$mysqli->query("SELECT * FROM Users WHERE 1 LIMIT 0,25");

if(strpos($messageText, 'http') !== false)
{
	$admins = $mysqli->query('SELECT * FROM `admins`');
	
	while($adminname=  $admins->fetch_assoc()["name"]) {
		if($adminname == $user) {
  $mysqli->query('TRUNCATE files');
  $mysqli->query('INSERT INTO files VALUES ("'.$messageText.'")');
  $reply=$reply.'Имя добавлено в таблицу. ';
	break;  
  }}
}

    $reply = $reply . 'Удачи, ' . $username;
  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
  $mysqli->close();
?>
