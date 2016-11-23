<?php
/*
 * provider 2 database settings
 */
$host = "localhost";
$database = "ksiegarnia2";
$dbusername = "client";
$dbpassword = "localhost";


$pdo = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8mb4', $dbusername, $dbpassword);
$stmt = $pdo->query("SELECT * FROM diebucher");
$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($results);