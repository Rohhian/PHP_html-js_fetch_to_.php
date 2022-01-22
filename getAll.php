<?php

//header("Content-Type: application/json; charset=UTF-8");

$connection = new PDO("mysql:host=localhost;dbname=test", "root", "");
$preparedSql = $connection->prepare("SELECT id, nimi FROM inimene ORDER BY id");
$preparedSql->execute();
$arr = $preparedSql->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($arr);