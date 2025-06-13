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
  <title>Sasto Cars</title>
  <link rel="stylesheet" href="./assets/style.css"/>
  <link rel="stylesheet" href="./assets/car.css"/>
</head>
<body>
 <?php include 'header.php';?>
  <section class="car-details">
    <?php
    if($result->num_rows>0)
    {
        $car = $result->fetch_assoc();
     ?>
    <div class="carhero container">
        <div class="colCar c1">
            <img src="./<?php echo"{$car['image']}";?>" alt="">
        </div>
        <div class="colCar c2">
            <h2><?php echo"{$car['name']}";?></h2>
            <p>
            Tesla is an American electric vehicle (EV) manufacturer known for innovation, sustainable energy, and high-performance electric cars. 
            Tesla leads the industry in clean transportation technology and self-driving software.
         </p>
         <div class="populate">
            <span class="btn small">Year : <?php echo"{$car['year']}"?></span>
            <span class="btn small">Stock : <?php echo"{$car['stock']}"?></span>
         </div>
         <strong>Price : <?php echo"{$car['price']}"?></strong>
        <?php
                if ($car['stock']>0){
                  ?>
                  <a href="buy.php?id=<?php echo $car['id']; ?>" class="small btn">Buy Now</a>
                  <?php
                }
                 else{
                  echo '<span class="btn small">Out of Stock</span>';
                }
                ?>
        </div>
    </div>
    <?php
    }
    ?>
  </section>
           <?php
            $conn->close();
           ?>
  <?php include 'footer.php';?>
</body>
</html>
