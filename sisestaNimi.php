<?php

$json = file_get_contents('php://input');
$obj = json_decode($json);
$connection = new PDO("mysql:host=localhost;dbname=test", "root", "");

try {
    $preparedSql = $connection->prepare("INSERT INTO inimene (nimi) VALUES (:name)");
    $preparedSql->execute([':name' => $obj]);
} catch (Exception $e) {
    if ($e->errorInfo[1] === 1062) echo json_encode("Duplicate entry");
}
