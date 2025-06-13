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
        <div class="container">
            <h2>Dashboard</h2>
            <div>
                <table class="data-table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Mileage</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                            <?php
                                if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo '<tr>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['id']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['name']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['price']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['mileage']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['stock']);
                                            echo '</td>';
                                            echo '<td>';
                                            ?>
                                            <ul>
                                                <li>
                                                    <button>
                                                       Edit 
                                                    </button>
                                                </li>
                                                <li>
                                                    <button>
                                                       Delete 
                                                    </button>
                                                </li>
                                            </ul>
                                            <?php
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                }
                            ?>
                
                </table>
            </div>
        </div>
   </section>
   <?php
   $conn->close(); 
   include 'footer.php';
    ?>
</body>
</html>