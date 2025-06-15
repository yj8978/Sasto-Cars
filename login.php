<?php
session_start();
include 'server.php';
$conn->select_db($dbname);
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $stmt = $conn->prepare("SELECT user_id , password , is_admin FROM user WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password, $is_admin);
        $stmt->fetch();
        if ($password === $hashed_password) {
            $_SESSION["user_id"] = $id;
            $_SESSION["name"] = $username;
            if($is_admin)
            {
              header("Location: admin.php");
              exit();
            }
            else{
             $error = "Not an Admin.";
            }
            
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "User not found.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="./assets/style.css"/>
  <link rel="stylesheet" href="./assets/car.css"/>
  <link rel="stylesheet" href="./assets/admin.css"/>
</head>
<body>
  <?php include 'header.php'?>
  <section class="logHero">
  <div class="carhero container">
    <div class="colCar c1">
      <h1>Admin User Login</h1>
    </div>
    <div class="colCar c2">
       <form method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
       </form>
         <?php if ($error): ?>
          <p style="color:red;"><?= $error ?></p>
         <?php endif; ?>
    </div>
  </div>
  </section>
</body>
</html>
