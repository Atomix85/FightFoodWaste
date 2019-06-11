<?php

ini_set('display_errors', 1);

require_once __DIR__ . '/utils/DatabaseManager.php';

$db = DatabaseManager::getManager();
$sql = '
INSERT INTO
Movie
(title, duration, releaseDate, description)
VALUES (?, ?, ?, ?)';
$affectedRows = $db->exec($sql, [
  'Captain Marvel',
  125,
  '2019-03-06',
  'Une superhéroïne chargée de sauver la destinée de la Terre...'
]);
echo $affectedRows;

echo '<br><br>';

$res = $db->getAll('SELECT * FROM Movie');
print_r($res);

echo '<br><br>';

$first = $db->findOne('SELECT * FROM Movie WHERE id > ?', [2]);
print_r($first);


 ?>
