<?php
  include 'server.php';
  $conn->select_db($dbname);
  $sql = "SELECT * FROM cars";
  $result=$conn->query($sql);
?>
<div class="container dc">
    <div><h2>Inventory Dashboard</h2></div>
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
                        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['price']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['mileage']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['stock']) . '</td>';
                        echo '<td>';
                        ?>
                        <ul>
                            <li>
                                <button class="edit-btn" data-id="<?php echo $row['id']; ?>">
                                   Edit 
                                </button>
                            </li>
                            <li>
                                <button class="delete-btn" data-id="<?php echo $row['id']; ?>">
                                   Delete 
                                </button>
                            </li>
                        </ul>
                        </td>
                        </tr>
                        <!-- Hidden Edit Form -->
                        <tr class="edit-form" id="edit-form-<?php echo $row['id']; ?>" style="display:none;">
                            <td colspan="6">
                                <form id="update" action="update.php" method="POST">
                                    <div class="field-input">
                                        <input type="text" name="name" placeholder="Car Name" required>
                                        <input type="number" name="price" placeholder="Price" required>
                                        <input type="number" name="mileage" placeholder="Mileage" required>
                                        <input type="number" name="year" placeholder="Year" required>
                                        <input type="number" name="stock" placeholder="Stock" required>
                                        <label for="Category">Category:</label>
                                        <select name="category">
                                            <option value="electric">Electric</option>
                                            <option value="sedan">Sedan</option>
                                            <option value="suv">SUV</option>
                                        </select>
                                        <button type="submit" class="btn large">Save</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        <!-- Hidden Delete Confirmation Form -->
                        <tr class="delete-form" id="delete-form-<?php echo $row['id']; ?>" style="display:none;">
                            <td colspan="6">
                                <div class="field-input">
                                    <p style="color:red;">Are you sure you want to delete?</p>
                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn large">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                }
            ?>
        </table>
    </div>
</div>