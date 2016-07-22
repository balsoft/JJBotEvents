<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
$mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);


echo 'Соединение установлено... ' . "\n";

echo 'Создаем таблицу'."\n";
$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT)");
echo 'Таблица создана'."\n";
/* Откл. автофиксацию изменений */
/* Вставить некоторые значения */
echo $mysqli->query('INSERT INTO Users VALUES ("Margarita","1337")')."\n";
echo 'Встаили значения';
/* Фиксировать транзакцию */
$result=$mysql->query("SELECT * FROM Users WHERE 1 LIMIT 0,25")."\n";
echo $result->num_rows."\n";
echo 'Тест';
/* Удалить таблицу */

$mysqli->close();
?>
