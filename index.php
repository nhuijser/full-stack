<!DOCTYPE html>
<html>
<head>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Nathan Portfolio</title>
    <script src="script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <arrow-down><a href="#projects-1"><i class="fa-sharp fa-solid fa-arrow-down fa-2xl" style="color: #ffffff"></i></arrow-down></a>
    </skills-section>
    <?php
    $dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
    $sql = "SELECT * FROM projects";
    $result = $dbh->query($sql);
    $count = 0;
    foreach ($result as $row) {
        if($row["deleted"] == 1) {  
            return;
        }

        $count++;
        if($count == 1) {
            echo "<arrow-up><a href='#skills'><i class='fa-sharp fa-solid fa-arrow-up fa-2xl' style='color: #6d63f7'></i></arrow-up></a>'";
        } else {
            echo "<arrow-up><a href='#projects-" . ($count-1) . "'><i class='fa-sharp fa-solid fa-arrow-up fa-2xl' style='color: #6d63f7'></i></arrow-up></a>'";
        }
        
        echo "<projects-section id='projects-" . $count . "'>";
                echo "<project>";
                echo "<project-header><header><strong>" . $row["project"] . "</strong></header></project-header>";
                echo "<hr class='hr-project'>";
                echo "<project-desc-section>";
                echo "<script>console.log('" . $row["description"] . "')</script>";
                echo "<p>" . $row["description"] . "</p>";
                echo "</project-desc-section>";
                if($row["github"] != null) {
                    echo "<github-button><a href='" . $row["github"] . "'><i class='fa-brands fa-github fa-2xl' style='color: #6d63f7'></i></a></github-button>";
                }
                echo "</project>";
                if($result->rowCount() > 1 && $count < $result->rowCount()) {
                    echo "<arrow-down><a href='#projects-" . ($count+1) . "'><i class='fa-sharp fa-solid fa-arrow-down fa-2xl' style='color: #fff'></i></arrow-down></a>";
                }
                echo "</projects-section>";
            }
        ?>
</body>
</html>

<!-- import assets pic -->
<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>