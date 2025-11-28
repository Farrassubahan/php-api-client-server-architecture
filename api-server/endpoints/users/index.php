<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "../../config/database.php";
 
$db = new Database(); 
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT id, name, email, created_at FROM users");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "count" => count($data),
    "data" => $data
]);
