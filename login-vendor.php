<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {
  // SOMETHING WAS POSTED

  $organization_name = mysqli_real_escape_string($con, $_POST['organization_name']);
  $password = $_POST['password'];$passwordMD5 = md5($password);

  $result = mysqli_query($con, "SELECT * FROM vendor_register WHERE organization_name = '$organization_name' AND password = '$passwordMD5'") or die("Query failed!");
      $query ="INSERT INTO vendor_register (user_id,user_name, organization_name, email, password) VALUES ('$user_id','$user_name', '$organization_name', '$email', '$passwordMD5')";

  $row = mysqli_fetch_assoc($result);

  if (is_array($row) && !empty($row)) {
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['organization_name'] = $row['organization_name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];

    header('Location: home.php');
    exit;
  } else {
    echo "<div class='message'>
            <p> Wrong username or password</p>
          </div> <br>";
    echo "<a href='login-vendor.php'> <button class='btn'> Go Back</button>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vendor Login - Tender Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h1>Vendor Login</h1>
    <form action="login-vendor.php" method="post" onsubmit="return validateForm()">
    <label for="organization_name">Org Name:</label>
    <input type="text" id="organization_name" name="organization_name" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Login" name="submit">
</form>

<script>
    function validateForm() {
        var organizationName = document.getElementById('organization_name').value;
        var password = document.getElementById('password').value;

        if (organizationName === '' || password === '') {
            alert('Please fill out all required fields.');
            return false;
        }

        return true;
    }
</script>

    <p>Don't have an account? <a href="register-vendor.php">Sign up here</a></p>
    <p>Forgot password? <a href="resetpassword.php"> Reset Password</a></p>
  </div>
</body>
</html>