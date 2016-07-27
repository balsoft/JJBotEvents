<?php
  define('BOT_TOKEN', '218027951:AAGFdVV7HssGRVn3WNA53BzPnozybS1NAaM');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  $chatID = $update["message"]["chat"]["id"]; 
  $messageText = $update["message"]["text"];
  $username = $update["message"]["from"]["first_name"];
  $date = $update["message"]["date"];
  //sql
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a4c0_borbd');
  define('LOGIN','a0a4c0_borbd');
  define('PASS','0013boris');
  $mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);

  echo "123456789\n";
  $users=$mysqli->query("SELECT * FROM sqlupload WHERE 1");
  while ($row = $users->fetch_assoc()){
    $num = $row["number"];
  }
  if(is_null($num)){ $num = "1"; }else{ $num = $num + 1; }
  settype($num, "string");
  $mysqli->query('INSERT INTO sqlupload VALUES ("'.$num.'","'.$username.'","'.$date.'","'.$messageText.'")');
  echo "987654321\n";
  
  if($messageText=="/sql"){
    $users=$mysqli->query("SELECT * FROM sqlupload WHERE 1");
    while ($row = $users->fetch_assoc()){
    $reply = $reply . $row["name"]." ".$row["text"]."<\n>";
    } 
  }

  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
