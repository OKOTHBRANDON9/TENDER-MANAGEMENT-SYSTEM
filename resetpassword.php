<?php
session_start();

include("connection.php");
include("function.php");

if (isset($_POST['reset'])) {
  // SOMETHING WAS POSTED

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $old_password = mysqli_real_escape_string($con, $_POST['old_password']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  // Check if the user's old password is correct
  $user = get_user_by_email($con, $email);

  if (is_array($user) && !empty($user)) {
    if (password_verify($old_password, $user['password'])) {
      // The old password is correct, so we can reset the password

      // Hash the new password
      $password_hash = password_hash($password, PASSWORD_DEFAULT);

      // Update the user's password in the database
      $query = "UPDATE vendor_register SET password = '$password_hash' WHERE email = '$email'";
      mysqli_query($con, $query) or die("Query failed!");

      echo "<div class='message'>
                <p>Password reset successful!</p>
              </div>";

      // Redirect the user to the login page
      header("location:login-vendor.php");
      exit;
    } else {
      echo "<div class='message'>
                <p>Wrong old password.</p>
              </div>";
    }
  } else {
    echo "<div class='message'>
                <p>No user found with that email address.</p>
              </div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>reset password - Tender Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h1> reset password </h1>
    <form method="post" action="resetpassword.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password" required>
        <br>
        <label for="password">New Password:</label>
        <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}">
        <br>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</div>
</body>
</html>