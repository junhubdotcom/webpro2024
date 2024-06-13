<?php
header('Content-Type: application/json'); // Ensure JSON response
include '../connect.php';

// Disable error display and log errors instead
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'errors.log'); // Set a path for the error log

$data = array();
$sql = "SELECT * FROM `forum` ORDER BY id DESC";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $result->free();
} else {
    error_log("Database query failed: " . $conn->error);
    // Return an error in JSON format
    echo json_encode(array("status" => "error", "message" => "Database query failed"));
    exit;
}

echo json_encode($data);
$conn->close();
exit();
?>
