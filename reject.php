<?php
include("connection.php");
include("function.php");

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
// Function to send an email using PHPMailer
function send_email($to, $subject, $message) {
    global $con;

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'brrandonokoth@gmail.com';   //SMTP write your email
        $mail->Password   = 'bjiu fryr wsrg halp';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;                                    

        //Recipients
        $mail->setFrom( 'brrandonokoth@gmail.com', 'Your Name'); // Sender Email and name
        $mail->addAddress($to);     //Add a recipient email
        $mail->addReplyTo('brrandonokoth@gmail.com', 'Your Name'); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $subject;   // email subject headings
        $mail->Body    = $message; //email message

        // Send the email
        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo 'Failed to send email. Error: ' . $mail->ErrorInfo;
    }
}

// Check if the 'bid_id' parameter is set and not empty
if (isset($_GET['bid_id']) && !empty($_GET['bid_id'])) {
    $bid_id = $_GET['bid_id'];

    // Approve the bid in the database
    $sql = "UPDATE bids SET bid_status = 'rejected' WHERE bid_id = $bid_id";
    if (mysqli_query($con, $sql)) {
        // Send an email to the user
        $sql = "SELECT email FROM bids WHERE bid_id = $bid_id";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];

            // Email details
            $to = 'brrandonokoth@gmail.com';
            $subject = '    Bid rejection Notification';
            $message = 'Your bid has been rejected.';

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
        echo "Failed to update bid status in the database.";
    }
} else {
    echo "Bid ID is not set or empty.";
}