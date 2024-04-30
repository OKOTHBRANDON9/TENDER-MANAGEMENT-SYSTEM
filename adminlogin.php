<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {
  // SOMETHING WAS POSTED

  $admin_name = mysqli_real_escape_string($con, $_POST['admin_name']);
  $password = $_POST['password'];$passwordMD5 = md5($password);

  $result = mysqli_query($con, "SELECT * FROM adminregister WHERE admin_name = '$admin_name' AND password = '$passwordMD5'") or die("Query failed!");
      $query ="INSERT INTO adminregister (admin_name, password) VALUES ('$admin_name',  '$passwordMD5')";

  $row = mysqli_fetch_assoc($result);

  if (is_array($row) && !empty($row)) {
    $_SESSION['admin_name'] = $row['admin_name'];

    $_SESSION['password'] = $row['password'];

    header('Location: index.php');
    exit;
  } else {
    echo "<div class='message'>
            <p> Wrong username or password</p>
          </div> <br>";
    echo "<a href='adminlogin.php'> <button class='btn'> Go Back</button>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login - Tender Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h1>Admin Login</h1>
    <form action="adminlogin.php" method="post" onsubmit="return validateForm()">
    <label for="admin_name">Admin Name:</label>
    <input type="text" id="admin_name" name="admin_name" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Login" name="submit">
</form>

<script>
    function validateForm() {
        var adminName = document.getElementById('admin_name').value;
        var password = document.getElementById('password').value;

        if (adminName === '' || password === '') {
            alert('Please fill out all required fields.');
            return false;
        }

        return true;
    }
</script>

    <p>Don't have an account? <a href="adminregister.php">Sign up here</a></p>
  </div>
</body>
</html>