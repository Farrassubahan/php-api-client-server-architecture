<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, PATCH");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../../config/database.php";

$db = new Database();
$conn = $db->getConnection();

$id = $_GET['id'] ?? null;

if (!$id) {
    echo json_encode(["status" => "error", "message" => "ID required"]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?");
$stmt->execute([
    $data['name'] ?? null,
    $data['email'] ?? null,
    $data['password'] ?? null,
    $id
]);

echo json_encode([
    "status" => "success",
    "message" => "User updated"
]);
