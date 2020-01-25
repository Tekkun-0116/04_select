<?php

define('DSN', 'mysql:host=mysql;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
  $dbh = new PDO(DSN, USER, PASSWORD);
  echo '接続に成功しました！' . '<br>';
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}

$sql = "select * from animals";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($animals as $animal)
{
  echo $animal['type'] .  ' の ' . $animal['classifcation'] . ' ちゃん ' .' <br> ' . $animal['description'] . ' <br> ' . $animal['birthday'] . ' 生まれ ' . ' <br> ' . ' 出身地 ' . $animal['birthplace'] . ' <hr> ';
} 