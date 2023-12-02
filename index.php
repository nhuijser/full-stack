<!DOCTYPE html>
<html>
<head>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Nathan Portfolio</title>
</head>
<body>
    <div class="login-button">
        <a href="sites/login/login.php">Login</a>
    </div>    
    <socials>
        <a href="https://github.com/nhuijser"><i class="fa-brands fa-github fa-2xl" style="color: #6d63f7"></i></a>
    </socials>
    <header-section>
        <div class="section-header">
        <header>Hey, I'm <strong-color>Nathan</strong-color></header>
        </div>
        <div class="section-desc">
        <p>Currently studying<strong> Software Development</strong></p>
        </div>
    <a href="#skills"><button class="btn">Tell me more!</button></a>
    </header-section>
    <header-img>
        <img src="https://placehold.co/600x400/000000/FFFFFF.png" alt="Nathan">
    </header-img>
    <skills-section id="skills">
    <arrow-up><a href="#"><i class="fa-sharp fa-solid fa-arrow-up fa-2xl" style="color: #6d63f7"></i></arrow-up></a>
    <front-end>
        <div class="front-end-header">
        <header><strong>Front-End</strong></header>
        </div>
        <hr>
        <div class="front-end-languages">
            <language>
            <i class="fa-brands fa-html5 fa-2xl" style="color: #ffffff;"></i>
            <p class="language">HTML</p>
            </language>
            <language>
            <i class="fa-brands fa-css3-alt fa-2xl" style="color: #ffffff;"></i>
            <p class="language">CSS</p>
            </language>
            <language>
            <i class="fa-brands fa-js-square fa-2xl" style="color: #ffffff;"></i>
            <p class="language">JavaScript</p>
            </language>
            <front-end-desc-section>
            <p>My experience in Front End Development is limited to a certain level.</p>
            </front-end-desc-section>
        </div>
    </front-end>
    <back-end>
        <div class="back-end-header">
        <header><strong>Back-End</strong></header>
        </div>
        <hr>
        <div class="back-end-languages">
            <language>
            <i class="fa-brands fa-php fa-2xl" style="color: #ffffff;"></i>
            <p class="language">PHP</p>
            </language>
            <language>
            <i class="fa-brands fa-sql fa-2xl" style="color: #ffffff;"></i>
            <p class="language">SQL</p>
            </language>
            <back-end-desc-section>
                <p>My experience in Back End Development is limited to a certain level.</p>
            </back-end-desc-section>
        </div>
    </back-end>
    <arrow-down><a href="#projects"><i class="fa-sharp fa-solid fa-arrow-down fa-2xl" style="color: #ffffff"></i></arrow-down></a>
    </skills-section>
    <projects-section id="projects">
        <arrow-up><a href="#skills"><i class="fa-sharp fa-solid fa-arrow-up fa-2xl" style="color: #6d63f7"></i></arrow-up></a>
        <?php
            $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', '');
            $sql = "SELECT * FROM projects";
            $result = $dbh->query($sql);
            foreach ($result as $row) {
                echo "<project>";
                echo "<project-header><header><strong>" . $row["project"] . "</strong></header></project-header>";
                echo "<hr class='hr-project'>";
                echo "<project-desc-section>";
                echo "<script>console.log('" . $row["desc"] . "')</script>";
                echo "<p>" . $row["desc"] . "</p>";
                echo "</project-desc-section>";
                if($row["github"] != null) {
                    echo "<a href='" . $row["github"] . "'><i class='fa-brands fa-github fa-2xl' style='color: #6d63f7'></i></a>";
                }
                echo "</project>";
            }
            ?>
    </projects-section>
</body>
</html>

<!-- import assets pic -->
<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>