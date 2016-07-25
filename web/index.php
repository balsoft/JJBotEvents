<?php
define('BOT_TOKEN', '264455520:AAE0uvEd-Ic5Qo25vgpdGY9NydnTYqAvSnI');
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  define('SQL_URL', 'MYSQL5012.Smarterasp.net');
  define('DB_NAME','db_a0a1cf_jj');
  define('LOGIN','a0a1cf_jj');
  define('PASS','1q2w3e4r');
  define('FILE','http://my-files.ru/Save/bz1b5t/Book1.csv');
$mysqli = new mysqli(SQL_URL, LOGIN, PASS, DB_NAME);


$mysqli->query("CREATE TABLE Users (name TEXT, chatID TEXT)");


$result = $mysqli->query("SELECT * FROM Users WHERE 1 LIMIT 0,25");
 while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["name"], $row["chatID"]);
    }
  
/* Удалить таблицу */

$mysqli->close();
$row = 1;
if (($handle = fopen(FILE, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        echo "<p> $num полей в строке $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}

?>
