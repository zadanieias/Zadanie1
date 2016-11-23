<?php
/*
 * provider 1 database settings
 */
$host = "localhost";
$database = "ksiegarnia1";
$dbusername = "client";
$dbpassword = "localhost";


$pdo = new PDO('mysql:host='.$host.';dbname='.$database.';charset=utf8mb4', $dbusername, $dbpassword);
$stmt = $pdo->query("SELECT * FROM books");
$results =  $stmt->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($results);