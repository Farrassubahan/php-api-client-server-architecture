<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "../../config/database.php";

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["status" => "error", "message" => "ID required"]);
    exit;
}

$stmt = $conn->prepare("SELECT id, name, email, created_at FROM users WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "data" => $data
]);
