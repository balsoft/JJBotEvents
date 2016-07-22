<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
$link = mysqli_connect(SQL_URL, LOGIN, PASS, DB_NAME);

if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Соединение установлено... ' . mysqli_get_host_info($link) . "\n";
echo 'Создаем таблицу';
$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT");
echo 'Таблица создана';
/* Откл. автофиксацию изменений */
$mysqli->autocommit(FALSE);
echo 'Откл. автофиксацию изменений';
/* Вставить некоторые значения */
$mysqli->query("INSERT INTO Users VALUES ('Margarita','1337')");
echo 'Встаили значения';
/* Фиксировать транзакцию */
if (!$mysqli->commit()) {
    print("Не удалось зафиксировать транзакцию\n");
    exit();
}
 echo $mysqli->query("SELECT * FROM Users");
/* Удалить таблицу */
$mysqli->query("DROP TABLE Language");

mysqli_close($link);
?>
