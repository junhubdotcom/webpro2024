<?php
header('Content-Type: application/json'); // Ensure JSON response
include '../connect.php';

// Disable error display and log errors instead
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'errors.log'); // Set a path for the error log

$id = $_POST['id'];

if($id != "") {
    $sql = $conn->query("DELETE FROM forum WHERE id='$id' OR parent_comment='$id'");
    if ($sql) {
        echo json_encode(array("statusCode"=>200));
    } else {
        error_log("Database query failed: " . $conn->error);
        echo json_encode(array("statusCode"=>201, "message" => "Database query failed"));
    }
} else {
    echo json_encode(array("statusCode"=>201, "message" => "Invalid request"));
}

$conn->close();
exit();

?>




