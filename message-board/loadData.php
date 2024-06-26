<?php
include 'connect.php';

$stmt = $pdo->query("SELECT * FROM forum");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>
