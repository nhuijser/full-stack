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
$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');
$sql = "SELECT * FROM projects";
$result = $dbh->query($sql);


while ($row = $result->fetch()) {
  echo "<script>console.log('" . $row['deleted'] . "')</script>";
  if($row['deleted'] == 1) {
  echo "<section class='content-deleted'>";
  echo "<div class='project-container-deleted'>";
  echo "<details>";
  echo "<summary>";
  echo  "<strong>" . $row['project'] . "</strong>";
  echo "</summary>";
  echo "<div class='project-deleted'>";
  echo "<p>" . $row['description'] . "</p>";
  echo "</div>";
  echo "</details>";
  echo '<div class="buttons">';
  echo '<button class="btn" id="showButton" data-id="' . $row['idprojects'] . '"><i class="fa-regular fa-eye fa-normal" style="color: #005eff;"></i></button>';
  echo '</div>';
  echo "</div>";
  echo "</section>";
  } else if($row['deleted'] == 0) {
  echo "<section class='content'>";
  echo "<div class='project-container'>";
  echo "<details>";
  echo "<summary>";
  echo  "<strong>" . $row['project'] . "</strong>";
  echo "</summary>";
  echo "<div class='project-" . $row['idprojects'] . "'>";
  echo "<p>" . $row['description'] . "</p>";
  echo "</div>";
  echo "</details>";
  echo '<div class="buttons">';
  echo '<button class="btn" id="deleteButton" data-id="' . $row['idprojects'] . '"><i class="fas fa-trash-alt fa-normal" style="color: #ff1900;"></i></button>';
  echo '<button class="btn" id="editButton" data-id="' . $row['idprojects'] . '"><i class="fas fa-edit fa-normal" style="color: cyan;"></i></button>';
  echo '</div>';
  echo "</div>";
  echo "</section>";
  }
}
         ?>
    </main>
  </div>
  <script>
const deleteButton = document.getElementById('deleteButton');

if(deleteButton) {
  const projectId = deleteButton.dataset.id;
  deleteButton.addEventListener('click', () => {
    console.log("Delete button clicked");
    fetch('changes/delete_project.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'id=' + projectId,
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      location.reload();
    
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  })
}

const showButton = document.getElementById('showButton');

if(showButton) {
  const projectId = showButton.dataset.id;
  showButton.addEventListener('click', () => {
    console.log("Show button clicked");
    fetch('changes/show_project.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body: 'id=' + projectId,
    })
    .then(response => response.text())
    .then(data => {
      console.log(data);
      location.reload();
    }
    )
    .catch((error) => {
      console.error('Error:', error);
    });
  })
}


const editButton = document.getElementById('editButton'); 

if(editButton) {
  editButton.addEventListener('click', () => {
    console.log("Edit button clicked");
    
    const projectId = editButton.dataset.id;
    const project = document.querySelector('.project-' + projectId) 

    project.contentEditable = true;
    
    
    // add submit button

    const submitButton = document.createElement('button');
    submitButton.classList.add('btn');
    submitButton.innerHTML = '<i class="fas fa-check fa-normal" style="color: #00ff00;"></i>';

    // append the submit button to the parent of the project element
    project.parentNode.appendChild(submitButton);

    submitButton.addEventListener('click', () => {
      console.log("Submit button clicked");
      const desc = project.innerHTML;
      console.log(desc);
      fetch('changes/edit_project.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + projectId + '&description=' + desc,
      })
      submitButton.remove();
      cancelButton.remove();
    })

 // add cancel button

  const cancelButton = document.createElement('button');
  cancelButton.classList.add('btn');
  cancelButton.innerHTML = '<i class="fas fa-times fa-normal" style="color: #ff0000;"></i>';

  // append the cancel button to the parent of the project element
  project.parentNode.appendChild(cancelButton);

  cancelButton.addEventListener('click', () => {
    console.log("Cancel button clicked");
    project.contentEditable = false;
    submitButton.remove();
    cancelButton.remove();
  })
  })
}

</script>
</body>
</html>

<!-- import assets pic -->
<script src="https://kit.fontawesome.com/0f6a8fd9b7.js" crossorigin="anonymous"></script>