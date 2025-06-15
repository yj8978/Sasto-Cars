<?php
  include 'server.php';
  $conn->select_db($dbname);
  $sql = "SELECT * FROM cars";
  $result=$conn->query($sql);
?>
<div class="container dc">
    <div><h2>Inventory Dashboard</h2></div>
    <div>

                                <form id="update" action="addCar.php" method="POST">
                                    <div class="field-input" style="display:flex;flex-direction:row;">
                                        <div>
                                        <input type="text" name="name" placeholder="Car Name" required>
                                        <input type="number" name="price" placeholder="Price" required>
                                        </div>
                                        <div>
                                        <input type="number" name="mileage" placeholder="Mileage" required>
                                        <input type="number" name="year" placeholder="Year" required>
                                        </div>
                                        <div>
                                        <input type="number" name="stock" placeholder="Stock" required>
                                        <input type="file" name="image" placeholder="Image" required>
                                        </div>
                                        <div>
                                        <label for="Category">Category:</label>
                                        <select name="category">
                                            <option value="electric">Electric</option>
                                            <option value="sedan">Sedan</option>
                                            <option value="suv">SUV</option>
                                        </select>
                                        <button type="submit" class="btn large">Save</button>
                                        </div>
                                    </div>
                                </form>
</div>
</div>