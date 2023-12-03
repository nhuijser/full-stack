<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    print_r($_SESSION);
    header("location: ../login/login.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = $_POST["project-name"];
    $projectDesc = $_POST["project-desc"];
    $projectLink = $_POST["project-link"];

    $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');

    $sqlselect = "SELECT idprojects FROM projects";

    $resultselect = $dbh->query($sqlselect);

    $id = $resultselect->rowCount() + 1;

    $sql = "INSERT INTO projects (idprojects, project, `desc`, github) VALUES ('$id', '$projectName', '$projectDesc', '$projectLink')";

    $result = $dbh->query($sql);

    if ($result->rowCount() > 0) {
        echo "<script>alert('Project added')</script>";
    } else {   
        echo "<script>alert('Project not added')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Admin - Nathan Portfolio</title>
</head>

<body>
    <div class="user">
    <a href="../logout/logout.php"><i class="fa-regular fa-user fa-2xl" style="color: #ffffff;"></i>
    <p>
            <?php
                echo $_SESSION["username"];
            ?>
        </p>
    </div>

    <add-project-section>
        <header id="project"><strong>Add Project</strong></header>
        <hr>
        <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="project">Project Name:</label>
            <input type="text" id="project-name" name="project-name" required>
            <label for="project">Project Description:</label>
            <input type="text" id="project-desc" name="project-desc" required>
            <label for="project">Project GitHub Link:</label>
            <input type="text" id="project-link" name="project-link" required>
            <button class="btn" type="submit">Add Project</button>
        </form>
        <arrow-down><a href="#skill"><i class="fa-sharp fa-solid fa-arrow-down fa-2xl" style="color: #6d63f7"></i></arrow-down></a>
    </add-project-section>
    <add-skill-section>
        <arrow-up><a href="#"><i class="fa-sharp fa-solid fa-arrow-up fa-2xl" style="color: #6d63f7"></i></arrow-up></a>
        <header id="skill"><strong>Add Skill</strong></header>
        <hr>
        <form class="form">
            <label for="skill">Skill Name:</label>
            <input type="text" id="skill-name" name="skill-name" required>
            <label for="skill">Skill Description:</label>
            <input type="text" id="skill-desc" name="skill-desc" required>
            <button class="btn" type="submit">Add Skill</button>
        </form>
        
</body>
</html>

<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>

<?php


?>