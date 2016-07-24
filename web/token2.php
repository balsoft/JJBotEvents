<?php
  define('BOT_TOKEN', '218027951:AAGFdVV7HssGRVn3WNA53BzPnozybS1NAaM');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

  // read incoming info and grab the chatID
  $content = file_get_contents("php://input");
  $update = json_decode($content, true);
  $chatID = $update["message"]["chat"]["id"];

  $messageText = $update["message"]["text"];

  //if ($messageText == '/now') {
  //    $reply = 'Идёт занятие по ботам.';
 // }

  //if ($messageText == '/next') {
  //    $reply = 'Спорт.';
  //}

 // $reply = $reply . $messa

  $reply = ' Хорошего дня, ' . $update['message']['from']['first_name'] . $messageText;

  $sendto = API_URL . "sendmessage?chat_id=" . $chatID . "&text=" . $reply;
  file_get_contents($sendto);
?>
