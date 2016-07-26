<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
  define('FILE','http://my-files.ru/Save/bz1b5t/Book1.csv');
  function getTimeLeft($time){
    return DateTime::createFromFormat('G:i',$time, new DateTimeZone('Europe/Moscow'))->getTimestamp()-microtime(true);
  }
$mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);

  $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];

$file=fopen($fName,'r');
$schedule=fgetcsv($file,1000,';');
   while (($schedule=fgetcsv($file,1000,';')) !== FALSE) {
        $num = count($schedule);
        echo ((string)abs(getTimeLeft($schedule[0]))).' сек до '.$schedule[1]."\n";
            if(abs(getTimeLeft($schedule[0]))<60.0){
              {
              echo 'notify';
                  while ($row = $users->fetch_assoc()){
                        $reply = ' Хорошего дня, ' . $row["name"].". Через 1 минут будет ". $schedule[1]. ". Место встречи: ".$schedule[2];
                         $sendto = API_URL . "sendmessage?chat_id=" . $row["chatID"] . "&text=" . $reply;
                         file_get_contents($sendto);
                  } 
              }
            }
        }
$mysqli->close();
?>
