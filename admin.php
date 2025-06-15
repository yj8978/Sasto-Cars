<?php
  include 'server.php';
  $conn->select_db($dbname);
  $sql = "SELECT * FROM cars";
  $result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/admin.css">
</head>
<body>
   <?php
   include 'adminHeader.php';
    ?>
    <section class="dashboard">
        <div class="sidebar">
          <div><a href="#" data-page="iDash.php">Manage Cars</a></div>
          <div><a href="#" data-page="addCars.php">Add Cars</a></div>
          <div><a href="#" data-page="manageUsers.php">Manage Users</a></div>
        </div>
        <div class="main-content" id="main-content">
          <h2>Hello! Admin</h2>
        </div>      
   </section>
   <?php
   $conn->close(); 
   include 'footer.php';
    ?>

 

    <script src="./assets/js/adminScript.js"></script>
</body>
</html>