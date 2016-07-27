<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
  define('FILE','http://my-files.ru/Save/bz1b5t/Book1.csv');
  function translateToEpoch($time){
    return DateTime::createFromFormat('G:i',$time, new DateTimeZone('Europe/Moscow'))->getTimestamp();
  }
  function getTimeLeft($time){
    return translateToEpoch($time)-microtime(true);
  }
function cp1251_to_utf8($s) {
$tbl = $GLOBALS['cp1251_to_utf8_tbl'];
$r = "";
for($i = 0, $l = strlen($s); $i < $l; $i++) {
$c = $s{$i};
$b = ord($c);
if($b < 128) {
$r .= $c;
}
else {
$r .= @$tbl[$b];
}
}
return $r;
}
 
$unicode_to_cp1251_tbl = array(
0x0402 => "\x80",
0x0403 => "\x81",
0x201A => "\x82",
0x0453 => "\x83",
0x201E => "\x84",
0x2026 => "\x85",
0x2020 => "\x86",
0x2021 => "\x87",
0x20AC => "\x88",
0x2030 => "\x89",
0x0409 => "\x8A",
0x2039 => "\x8B",
0x040A => "\x8C",
0x040C => "\x8D",
0x040B => "\x8E",
0x040F => "\x8F",
0x0452 => "\x90",
0x2018 => "\x91",
0x2019 => "\x92",
0x201C => "\x93",
0x201D => "\x94",
0x2022 => "\x95",
0x2013 => "\x96",
0x2014 => "\x97",
0x2122 => "\x99",
0x0459 => "\x9A",
0x203A => "\x9B",
0x045A => "\x9C",
0x045C => "\x9D",
0x045B => "\x9E",
0x045F => "\x9F",
0x00A0 => "\xA0",
0x040E => "\xA1",
0x045E => "\xA2",
0x0408 => "\xA3",
0x00A4 => "\xA4",
0x0490 => "\xA5",
0x00A6 => "\xA6",
0x00A7 => "\xA7",
0x0401 => "\xA8",
0x00A9 => "\xA9",
0x0404 => "\xAA",
0x00AB => "\xAB",
0x00AC => "\xAC",
0x00AD => "\xAD",
0x00AE => "\xAE",
0x0407 => "\xAF",
0x00B0 => "\xB0",
0x00B1 => "\xB1",
0x0406 => "\xB2",
0x0456 => "\xB3",
0x0491 => "\xB4",
0x00B5 => "\xB5",
0x00B6 => "\xB6",
0x00B7 => "\xB7",
0x0451 => "\xB8",
0x2116 => "\xB9",
0x0454 => "\xBA",
0x00BB => "\xBB",
0x0458 => "\xBC",
0x0405 => "\xBD",
0x0455 => "\xBE",
0x0457 => "\xBF",
0x0410 => "\xC0",
0x0411 => "\xC1",
0x0412 => "\xC2",
0x0413 => "\xC3",
0x0414 => "\xC4",
0x0415 => "\xC5",
0x0416 => "\xC6",
0x0417 => "\xC7",
0x0418 => "\xC8",
0x0419 => "\xC9",
0x041A => "\xCA",
0x041B => "\xCB",
0x041C => "\xCC",
0x041D => "\xCD",
0x041E => "\xCE",
0x041F => "\xCF",
0x0420 => "\xD0",
0x0421 => "\xD1",
0x0422 => "\xD2",
0x0423 => "\xD3",
0x0424 => "\xD4",
0x0425 => "\xD5",
0x0426 => "\xD6",
0x0427 => "\xD7",
0x0428 => "\xD8",
0x0429 => "\xD9",
0x042A => "\xDA",
0x042B => "\xDB",
0x042C => "\xDC",
0x042D => "\xDD",
0x042E => "\xDE",
0x042F => "\xDF",
0x0430 => "\xE0",
0x0431 => "\xE1",
0x0432 => "\xE2",
0x0433 => "\xE3",
0x0434 => "\xE4",
0x0435 => "\xE5",
0x0436 => "\xE6",
0x0437 => "\xE7",
0x0438 => "\xE8",
0x0439 => "\xE9",
0x043A => "\xEA",
0x043B => "\xEB",
0x043C => "\xEC",
0x043D => "\xED",
0x043E => "\xEE",
0x043F => "\xEF",
0x0440 => "\xF0",
0x0441 => "\xF1",
0x0442 => "\xF2",
0x0443 => "\xF3",
0x0444 => "\xF4",
0x0445 => "\xF5",
0x0446 => "\xF6",
0x0447 => "\xF7",
0x0448 => "\xF8",
0x0449 => "\xF9",
0x044A => "\xFA",
0x044B => "\xFB",
0x044C => "\xFC",
0x044D => "\xFD",
0x044E => "\xFE",
0x044F => "\xFF",
);
$mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);
$users=$mysqli->query("SELECT * FROM Users WHERE 1");
  $scheduleRes=$mysqli->query('SELECT * FROM files WHERE 1');
  $fName=$scheduleRes->fetch_assoc()["filename"];
echo $fName."</br>";
echo cp1251_to_utf8(file_get_contents($fName));
while ($row = $users->fetch_assoc()){
  echo $row["name"]." ".$row["chatID"]."</br>";
}
$users=$mysqli->query("SELECT * FROM Users WHERE 1");
$file=fopen($fName,'r');
$schedule=fgetcsv($file,1000,';');
   while (($schedule=fgetcsv($file,1000,';')) !== FALSE) {
        $num = count($schedule);
        echo ((string)abs(getTimeLeft($schedule[0])-300)).' сек до '.$schedule[1]."</br>";
            if(abs(getTimeLeft($schedule[0])-300)<40.0){
              {
              echo 'notify';
                  while ($row = $users->fetch_assoc()){
                        $reply = ' Хорошего дня, ' . $row["name"].". Через 5 минут будет ". $schedule[1]. ". Место встречи: ".$schedule[2];
                         $sendto = API_URL . "sendmessage?chat_id=" . $row["chatID"] . "&text=" . $reply;
                         file_get_contents($sendto);
                  } 
              }
            }
        }
$mysqli->close();
?>
