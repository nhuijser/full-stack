<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="admin-new.css" rel="stylesheet" type="text/css">
    <title>Admin - Nathan Portfolio</title>
    <script src="admin-new.js"></script>
</head>
<welcome-page>
<div class="user-box">
    <i class="fa-regular fa-user fa-2xl" style="color: #ffffff;"></i>
    <a href="../logout/logout.php"><button>Log out</button></a>
</div>
<div class="projects-box">
    <i class="fa-solid fa-laptop-code fa-2xl" style="color: #ffffff;"></i>
    <a href="#projects"><button>View</button></a>
</div>
<div class="skills-box">
    <i class="fa-solid fa-tools fa-2xl" style="color: #ffffff;"></i>
    <a href="#skills"><button>View</button></a>
</div>

<div class="welcome"> 
<?php
echo "<h1>Welcome back, " . "display" . "</h1>";
?>
</div>
</welcome-page>

<div class="project-section">
    <header class="project-header" id="projects"><strong>Projects</strong></header>
    <?php

        $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', '');

        $sql = "SELECT * FROM projects";

        $result = $dbh->query($sql);

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                echo "<div class='project-box' selected='false' description='" . $row["desc"] . "' id='" . $row["idprojects"] . "' onclick=\"openProject('" . $row["idprojects"] . "')\">";

                echo "<h2>" . $row["project"] . " (" . $row["idprojects"] . ")". "</h2>";
                echo "</div>";
            }
        } else {
            echo "<p>No projects found</p>";
        }
    ?>
</div>
<body>
   
</body>
</html>

<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>

<?php


?>