<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="projects.css">
  <title>Admin Panel</title>
</head>
<body>
  <div class="admin-panel">
  <aside class="sidebar">
      <h1>Admin Dashboard</h1>
      <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="./subsites/projects/projects.php">Projects</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="../../../logout/logout.php">Logout</a></li>
      </ul>
    </aside>
    <main class="main-content">
      <header>
        <h2>Projects</h2>
      </header>
       <?php
$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', '');
$sql = "SELECT * FROM projects";
$result = $dbh->query($sql);

while ($row = $result->fetch()) {
  echo "<section class='content'>";
  echo "<div class='project-container'>";
  echo "<details>";
  echo "<summary>";
  echo  "<strong>" . $row['project'] . "</strong>";
  echo "</summary>";
  echo "<div class='project'>";
  echo "<p>" . $row['desc'] . "</p>";
  echo "</div>";
  echo "</details>";
  echo '<div class="buttons">';
  echo '<button class="btn"><i class="fas fa-trash-alt fa-normal" style="color: #ff1900;"></i></button>';
  echo '<button class="btn"><i class="fas fa-edit fa-normal" style="color: cyan;"></i></button>';
  echo '</div>';
  echo "</div>";
  echo "</section>";
}
         ?>
    </main>
  </div>
</body>
</html>

<!-- import assets pic -->
<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>