<?php
  include 'server.php';
  $conn->select_db($dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>AutoMart - Buy & Sell Cars</title>
  <link rel="stylesheet" href="./assets/style.css"/>
</head>
<body>
  <header>
    <div class="container">
      <a href="index.php"><h1 class="logo">AutoMart</h1></a>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="allcars.php">Cars</a></li>
          <li><a href="#">Sell Your Car</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <section class="featured">
    <div class="container">
      <h2>Featured Listings</h2>
      <div class="cars">
        <?php
            $sql = "SELECT * FROM cars";
            $result = $conn -> query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
        ?>
        <div class="car-card">
              <img alt="car" src="./<?php echo "{$row['image']}";?>">
                <h3><?php echo"{$row['name']}"; ?></h3>
                <div class="details">
                  <div class="d1"><span><?php echo"{$row['year']}"; ?></span></div>
                  <div class="d1"><span>$<?php echo"{$row['price']}"; ?></span></div>
                  <div class="d1"><span><?php echo"{$row['mileage']}"; ?>miles</span></div>
                </div>     
                <a href="car.php?id=<?php echo $row['id']; ?>" class="small btn">View Details</a>
                </div>
                <?php
              }
            }
            $conn->close();
           ?>
      </div>
    </div>
  </section>         
  <footer>
    <div class="container">
      <p>&copy; 2025 YYYY. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
