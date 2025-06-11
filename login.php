<?php
session_start();
include 'server.php';
$conn->select_db($dbname);
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $stmt = $conn->prepare("SELECT user_id , password FROM user WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if ($password === $hashed_password) {
            $_SESSION["user_id"] = $id;
            $_SESSION["name"] = $username;
            header("Location: index.php");
            exit();
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
</head>
<body>
  <h2>Login</h2>
  <form method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
  </form>

  <?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
  <?php endif; ?>
</body>
</html>
