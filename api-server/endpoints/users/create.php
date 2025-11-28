<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../../config/database.php";

$db = new Database();
$conn = $db->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || empty($data['name']) || empty($data['email']) || empty($data['password'])) {
    echo json_encode(["status" => "error", "message" => "name, email, password required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->execute([$data['name'], $data['email'], $data['password']]);

echo json_encode([
    "status" => "success",
    "message" => "User created",
    "id" => $conn->lastInsertId()
]);
