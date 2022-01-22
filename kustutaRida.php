<?php

$json = file_get_contents('php://input');
$obj = json_decode($json);
$connection = new PDO("mysql:host=localhost;dbname=test", "root", "");

$preparedSql = $connection->prepare("DELETE FROM inimene WHERE id = :indeks");
$preparedSql->execute([':indeks' => $obj]);
