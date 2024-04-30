<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {
  // SOMETHING WAS POSTED
  $user_name = $_POST['user_name'];
  $organization_name = $_POST['organization_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];$passwordMD5 = md5($password);


  if (!empty ($user_name) && !empty($password) && !is_numeric($user_name)) {
    //save to db
    $user_id= random_num (10);
    $query ="INSERT INTO vendor_register (user_id,user_name, organization_name, email, password) VALUES ('$user_id','$user_name', '$organization_name', '$email', '$passwordMD5')";

    mysqli_query($con, $query);

    header("location:login-vendor.php ");

    die;
  } else {
    //echo "Please enter valid data!";
  }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vendor Register - Tender Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="register-container">
    <h1>Vendor Registration</h1>
    <form action="register-vendor.php" method="post" onsubmit="return validateForm()">
          <label for="user_name">Full Name:</label>
          <input type="text" id="user_name" name="user_name" required>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <label for="organization_name">Enter Organization Name:</label>
          <input type="text" id="organization_name" name="organization_name" required>
          <label for="password">Choose a Password:</label>
          <input type="password" id="password" name="password" required>
          <input type="submit" name="submit" value="Register">
   </form>

<script>
    function validateForm() {
        var userName = document.getElementById('user_name').value;
        var email = document.getElementById('email').value;
        var organizationName = document.getElementById('organization_name').value;
        var password = document.getElementById('password').value;

        if (userName === '' || email === '' || organizationName === '' || password === '') {
            alert('Please fill out all required fields.');
            return false;
        }

        return true;
    }
</script>

    <p>Already have an account? <a href="login-vendor.php">Log in here</a></p>
  </div>
</body>
</html>




