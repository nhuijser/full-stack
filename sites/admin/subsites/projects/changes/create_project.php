<?php
$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');

// get the total number of projects
$sql = "SELECT count(idprojects) AS total FROM projects";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total = $row['total'];

// add one to the total number of projects to generate a new id
$new_id = $total + 1;
print_r($new_id);
$sql = "INSERT INTO projects (idprojects, project, description, deleted) VALUES ($new_id, 'New Project', 'New Project Description' , 0)";
$stmt = $dbh->prepare($sql);
$stmt->execute();


?>