<?php
  include 'server.php';
  $conn->select_db($dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sasto Cars</title>
  <link rel="stylesheet" href="./assets/style.css"/>
</head>
<body>
   <?php 
   include 'header.php';
   ?>
  <section class="hero">
    <div class="container">
      <h2>Find Your Dream Car Today</h2>
      <p>Buy or sell quality used cars with confidence.</p>
      <a href="#" class="btn">Browse Cars</a>
    </div>
  </section>

  <section class="featured">
    <div class="container">
      <h2>Featured Listings</h2>
      <div class="cars">
        <?php
            $sql = "SELECT * FROM cars LIMIT 3";
            $result = $conn -> query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                echo'<div class="car-card">';
        ?>
              <img alt="car" src="./<?php echo htmlspecialchars($row['image']);?>">
                <h3><?php echo"{$row['name']}"; ?></h3>
                <div class="details">
                  <div class="d1"><span><?php echo htmlspecialchars($row['year']); ?></span></div>
                  <div class="d1"><span>$<?php echo htmlspecialchars($row['price']); ?></span></div>
                  <div class="d1"><span><?php echo htmlspecialchars($row['mileage']); ?>miles</span></div>
                </div>     
                <a href="car.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="small btn">View Details</a>
                <?php
                if ($row['stock']>0){
                  ?>
                  <a href="buy.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="small btn">Buy Now</a>
                  <?php
                }
                 else{
                  echo '<span class="btn small">Out of Stock</span>';
                }
                ?>
                </div>
                <?php
              }
            }
           ?>
      </div>
    </div>
  </section>
  <section class="carModel featured">
<div class="container">
      <h2>Electric Car</h2>
      <div class="cars">
          <?php
            $sql = "SELECT * FROM cars WHERE category = 'electric' LIMIT 3";
             $result = $conn -> query($sql);
            if ($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc())
              {
                echo'<div class="car-card">';
        ?>
              <img alt="car" src="./<?php echo htmlspecialchars($row['image']);?>">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <div class="details">
                  <div class="d1"><span><?php echo htmlspecialchars($row['year']); ?></span></div>
                  <div class="d1"><span>$<?php echo htmlspecialchars($row['price']); ?></span></div>
                  <div class="d1"><span><?php echo htmlspecialchars($row['mileage']); ?>miles</span></div>
                </div> 
                  
                <a href="car.php?id=<?php echo htmlspecialchars($row['id']);?>" class="small btn">View Details</a>
                 <?php
                if ($row['stock']>0){
                  ?>
                  <a href="buy.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="small btn">Buy Now</a>
                  <?php
                }
                else{
                  echo '<span class="btn small">Out of Stock</span>';
                }
                ?>
                </div>
                <?php
              }
            }
            $conn->close();
           ?>
      </div>
    </div>
  </section>
  <?php include 'footer.php'?>
</body>
</html>
