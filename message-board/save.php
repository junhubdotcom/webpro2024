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

// include 'database.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $id = $_POST['id'];

//     $stmt = $pdo->prepare("DELETE FROM forum WHERE id = :id");
//     $stmt->bindParam(':id', $id);

//     if ($stmt->execute()) {
//         echo json_encode(array("statusCode" => 200));
//     } else {
//         echo json_encode(array("statusCode" => 201));
//     }
// }
?>


