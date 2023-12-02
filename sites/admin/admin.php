<?php 

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    print_r($_SESSION);
    header("location: ../login/login.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="admin.css" rel="stylesheet" type="text/css">
    <title>Admin - Nathan Portfolio</title>
</head>

<body>
    <div class="back-button">
        <a href="../../index.html">Back to portfolio</a>
    </div>
    <div class="user">
    <i class="fa-regular fa-user fa-2xl" style="color: #ffffff;"></i>
    <p>
            <?php
                echo $_SESSION["username"];
            ?>
        </p>
    </div>

    <add-project-section>
        <header id="project"><strong>Add Project</strong></header>
        <hr>
        <form class="form">
            <label for="project">Project Name:</label>
            <input type="text" id="project-name" name="project-name" required>
            <label for="project">Project Description:</label>
            <input type="text" id="project-desc" name="project-desc" required>
            <label for="project">Project Image:</label>
            <input type="text" id="project-link" name="project-link" required>
            <button class="btn" type="submit" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">Add Project</button>
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

if($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_SERVER["REQUEST_METHOD"]);
      
}

?>