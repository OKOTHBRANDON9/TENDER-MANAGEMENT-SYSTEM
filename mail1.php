<?php
session_start(); // Start the session

include("connection.php");

// Function to send an email
function send_email($to, $subject, $message) {
    $headers = "From: brrandonokoth@gmail.com" . "\r\n" .
      "Reply-To: your-email@example.com" . "\r\n" .
      "X-Mailer: PHP/" . phpversion();
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
  
    if (mail($to, $subject, $message, $headers)) {
      return true;
    } else {
      return false;
    }
}

// Check if the 'bid_id' parameter is set and not empty
if (isset($_GET['bid_id']) && !empty($_GET['bid_id'])) {
    $bid_id = $_GET['bid_id'];

    // Get the user's email address from the database
    $sql = "SELECT email FROM bids WHERE bid_id = $bid_id";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];

        // Email details
        $to = 'brrandonokoth@gmail.com';
        $subject = 'Approval Notification';
        $message = 'Your bid has been approved.';

        // Send email
        if (send_email($to, $subject, $message)) {
            echo 'Email sent successfully.';
        } else {
            echo 'Failed to send email.';
        }

        // Redirect the user back to the bids page
        header("Location: bids.php");
        exit; // Stop further execution
    } else {
        echo "No email found for the bid ID.";
    }
} else {
    echo "Bid ID is not set or empty.";
}
?>