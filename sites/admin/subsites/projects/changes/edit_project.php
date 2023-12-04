<?php
$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
$id = $_POST['id'];
$desc = $_POST['description'];
$sql = "UPDATE projects SET description = :desc WHERE idprojects = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':desc', $desc);
$stmt->execute();
?>