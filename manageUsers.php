<?php
  include 'server.php';
  $conn->select_db($dbname);
  $sql = "SELECT * FROM user";
  $result=$conn->query($sql);
?>
<div class="container">
            <h2>User Dashboard</h2>
            <div>
                <table class="data-table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                            <?php
                                if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc())
                                        {
                                            echo '<tr>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['user_id']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['name']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['email']);
                                            echo '</td>';
                                            echo '<td>';
                                            echo htmlspecialchars($row['password']);
                                            echo '</td>';
                                            echo '<td>';
                                            ?>
                                            <ul>
                                                <li>
                                                    <button id="edit">
                                                       Edit 
                                                    </button>
                                                </li>
                                                <li>
                                                    <button id="delete">
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