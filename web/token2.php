<?php
  define('BOT_TOKEN', '218027951:AAGFdVV7HssGRVn3WNA53BzPnozybS1NAaM');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  $chatID = $update["message"]["chat"]["id"]; 
  $messageText = $update["message"]["text"];
  $username = $update["message"]["from"]["first_name"];
  //sql
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a4c0_borbd');
  define('LOGIN','a0a4c0_borbd');
  define('PASS','0013boris');
  $mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);

  echo "123456789\n";
  $num = $mysqli->query("SELECT * FROM newraz ORDER BY id DESC LIMIT 1");
  $num = $num->fetch_assoc();
  $num = $num["number"];
  //$num = $num + 1;
  echo gettype($num);
  $mysqli->query("CREATE TABLE Users (numb TEXT, name TEXT, message TEXT)");
  $mysqli->query('INSERT INTO Users VALUES ("'.$num.'","'.$username.'","'.$messageText.'")');
  $users=$mysqli->query("SELECT * FROM Users WHERE 1");
  //$reply = $mysqli->query("SELECT * FROM 	Users");
  /*if($messageText=="/sql"){
    while ($row = $users->fetch_assoc()){
    $reply = $row["name"]." ".$row["chatID"]."</n>";
    } 
  }*/

  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
