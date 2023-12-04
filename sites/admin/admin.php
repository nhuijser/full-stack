<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.umd.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        <li><a href=".././logout/logout.php">Logout</a></li>
      </ul>
    </aside>
    <main class="main-content">
      <section class="content">
        <header>Projects</header>
        <canvas id="myChart" width="200" height="100"></canvas>
      </section>
    </main>
  </div>
  <script type="text/javascript">
  const ctx = document.getElementById('myChart');

  const data = {
  labels: [
    'Active',
    'Inactive',
  ],
  datasets: [{
    label: 'Projects',
    data: [2, 3],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};

var myDoughnut = new Chart(ctx, config);

</script>
</body>
</html>


