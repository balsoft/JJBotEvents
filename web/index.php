<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
  define('FILE','http://my-files.ru/Save/bz1b5t/Book1.csv');
$mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);
echo DateTime::createFromFormat('G:i',$schedule[0])->sub(new DateInterval('PT5M'))->getTimestamp();

/*  $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];*/
  $fName=FILE;
/* Удалить таблицу */
$users=$mysqli->query("SELECT * FROM Users WHERE 1 LIMIT 0,25");
$schedule=fgetcsv($file,1000,';');
$file=fopen($fName,'r');
   while (($schedule=fgetcsv($file,1000,';')) !== FALSE) {
        $num = count($data);
            if(DateTime::createFromFormat('G:i',$schedule[0])->sub(new DateInterval('PT5M'))->getTimestamp()<time()){
              {
                  while ($row = $users->fetch_assoc()){
                        $reply = $reply . ' Хорошего дня, ' . $row["name"]."Через 5 минут будет ". $schedule[1]. ". Место встречи: ".$schedule[2];
                         $sendto = API_URL . "sendmessage?chat_id=" . $row["chatID"] . "&text=" . $reply;
                         file_get_contents($sendto);
                  } 
              }
            }
        }
   
    $mysqli->close();
?>
