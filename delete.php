<?php
include_once 
"connection.php";



if(isset($_GET['deletevendor'])){
    $id = $_GET['deletevendor'];

    $sql = "DELETE FROM vendor_register WHERE user_id ='$id'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '<script> alert("Deleted Successful") </script>';
        
    }
    else{
        echo '<script> alert("Connection Error") </script>';

    }
    header('Location: vendors.php');
}

if(isset($_GET['deletetender'])){
    $id = $_GET['deletetender'];

    $sql = "DELETE FROM tenders WHERE tender_id ='$id'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '<script> alert("Deleted Successful") </script>';
        header('location:../tenders.php');
    }
    else{
        echo '<script> alert("Connection Error") </script>';
    }
    header('Location: tenders.php');

}

if(isset($_GET['deletebid'])){
    $id = $_GET['deletebid'];

    $sql = "DELETE FROM bids WHERE bid_id ='$id'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '<script> alert("Deleted Successful") </script>';
    }
    else{
        echo '<script> alert("Connection Error") </script>';
    }
    header('Location: bids.php');

}




if(isset($_GET['deletecontact'])){
    $email = $_GET['deletecontact'];

    $sql = "DELETE FROM contact WHERE email ='$email'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo '<script> alert("Deleted Successful") </script>';
    }
    else{
        echo '<script> alert("Connection Error") </script>';
    }
    header('Location: contact.php');

}


?>



