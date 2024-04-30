<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['submit'])) {
  // SOMETHING WAS POSTED
  $admin_name = $_POST['admin_name'];
  
  $password = $_POST['password'];$passwordMD5 = md5($password);


  if (!empty ($admin_name) && !empty($password) && !is_numeric($admin_name)) {
    //save to db
    $user_id= random_num (10);
    $query ="INSERT INTO adminregister (admin_name,   password) VALUES ('$admin_name', '$passwordMD5')";

    mysqli_query($con, $query);

    header("location:adminlogin.php ");

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
  <title>admin Register - Tender Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="register-container">
    <h1>admin Registration</h1>
    <form action="adminregister.php" method="post" onsubmit="return validateForm()">
          <label for="admin_name">Full Name:</label>
          <input type="text" id="admin_name" name="admin_name" required>
          
          <label for="password">Choose a Password:</label>
          <input type="password" id="password" name="password" required>
          <input type="submit" name="submit" value="Register">
   </form>

<script>
    function validateForm() {
        var adminName = document.getElementById('admin_name').value;
        
        var password = document.getElementById('password').value;

        if (userName === '' || password === '') {
            alert('Please fill out all required fields.');
            return false;
        }

        return true;
    }
</script>

    <p>Already have an account? <a href="adminlogin.php">Log in here</a></p>
  </div>
</body>
</html>




