<?php
  include 'server.php';
  $conn->select_db($dbname);
  $id = isset($_GET['id']) ? intval($_GET['id']):0 ;
  $sql = "SELECT * FROM cars where id = $id";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AutoMart - Buy & Sell Cars</title>
  <link rel="stylesheet" href="./assets/style.css"/>
  <link rel="stylesheet" href="./assets/car.css"/>
</head>
<body>
  <header>
    <div class="container">
      <a href="index.php"><h1 class="logo">AutoMart</h1></a>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Cars</a></li>
          <li><a href="#">Sell Your Car</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section class="car-details">
    <?php
    if($result->num_rows>0)
    {
        $car = $result->fetch_assoc();
     ?>
    <div class="carhero container">
        <div class="colCar">
            <img src="./<?php echo"{$car['image']}";?>" alt="">
        </div>
        <div class="colCar">
            <h2><?php echo"{$car['name']}";?></h2>
        </div>
    </div>
    <?php
    }
    ?>
   
  </section>
           
           <?php
            $conn->close();
           ?>
  <footer>
    <div class="container">
      <p>&copy; 2025 YYYY. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
