<?php
include '../connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$msg = $_POST['msg'];
if($name != "" && $msg != ""){
	$sql = $conn->query("INSERT INTO forum (parent_comment, student, post)
			VALUES ('$id', '$name', '$msg')");
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
$conn = null;

// session_start();
// include '../connect.php';

// // Check if the user is an admin
// if ($_SESSION['role'] !== 'admin') {
//     echo json_encode(array("statusCode" => 403, "message" => "Forbidden"));
//     exit;
// }

// $id = $_POST['id'];
// $name = $_POST['name'];
// $msg = $_POST['msg'];

// if ($name != "" && $msg != "") {
//     $sql = $conn->query("INSERT INTO forum (parent_comment, student, post) VALUES ('$id', '$name', '$msg')");
//     echo json_encode(array("statusCode" => 200));
// } else {
//     echo json_encode(array("statusCode" => 201, "message" => "Error occurred"));
// }

// $conn = null;


?>