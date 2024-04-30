<?php
include_once 
"connection.php";


// Check if the tender ID is provided
if(isset($_GET['editid'])) {
    $tender_id = $_GET['editid'];
    
    // Fetch the existing tender details from the database
    $sql = "SELECT * FROM tenders WHERE tender_id = $tender_id";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $tender = mysqli_fetch_assoc($result);
        
        // Display a form to edit the tender details
        echo '<form method="post">';
        echo '<label for="tender_title">Tender Title:</label>';
        echo '<input type="text" name="tender_name" value="'.$tender['tender_name'].'"><br><br>';
        
        
        
        echo '<input type="submit" name="submit" value="Update">';
        echo '</form>';
        
        // Handle form submission to update the tender details
        if(isset($_POST['submit'])) {
            $new_title = $_POST['tender_name'];
            
            // Update the tender details in the database
            $update_sql = "UPDATE tenders SET tender_name = '$new_title' WHERE tender_id = $tender_id";
            
            if(mysqli_query($con, $update_sql)) {
                echo "Tender details updated successfully";
                header('Location: tenders.php');

            } else {
                echo "Error updating tender details: " . mysqli_error($con);
            }
        }
    } else {
        echo "Tender not found";
    }
} else {
    echo "Tender ID not provided";
}








// Database connection

// Check if the vendor ID is provided
if(isset($_GET['veditid'])) {
    $user_id = $_GET['veditid'];
    
    // Fetch the existing vendor details from the database
    $sql = "SELECT * FROM vendor_register WHERE user_id = $user_id";
    $result = mysqli_query($con, $sql);
    
   


    if(mysqli_num_rows($result) > 0) {
        $vendor = mysqli_fetch_assoc($result);
        
        // Display a form to edit the vendor details
        echo '<form method="post">';
        echo '<label for="user_name">User Name:</label>';
        echo '<input type="text" name="user_name" value="'.$vendor['user_name'].'"><br><br>';
        
        echo '<label for="org_name">Organization Name:</label>';
        echo '<input type="text" name="organization_name " value="'.$vendor['organization_name'].'"><br><br>';
        
        echo '<label for="email">Email:</label>';
        echo '<input type="email" name="email" value="'.$vendor['email'].'"><br><br>';
        
        echo '<input type="submit" name="submit" value="Update">';
        echo '</form>';

      
        
        // Handle form submission to update the vendor details
        if(isset($_POST['submit'])) {
            $new_user_name = $_POST['user_name'];
            $new_org_name = $_POST['organization_name'];
            $new_email = $_POST['email'];
            
            // Update the vendor details in the database
            $update_sql = "UPDATE vendor_register SET user_name = '$new_user_name', organization_name = '$new_org_name', email = '$new_email' WHERE id = $user_id";
            
            if(mysqli_query($con, $update_sql)) {
                echo "vendor_register details updated successfully";
                header('Location: vendors.php');

            } else {
                echo "Error updating vendor_register details: " . mysqli_error($con);
            }
        }
    } else {
        echo "vendor_register not found";
    }
} else {
    echo "vendor_register ID not provided";
}

mysqli_close($con);


?>
