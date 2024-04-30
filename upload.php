<?php

if ($_SERVER["REQUEST _METHOD"] == "POST") {
  // CHECK IF FILE WAS UPLOADED WITHOUT ERRORS
  if (isset($_FILES['file ToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    $target_dir = "uploads/"; // change this to desired directory for uploaded files
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $file_type  = strtolower(pathinfo($target_file,  PATHINFO_EXTENSION));

    //check if the file is allowed (you can modify this to allow specific file types)
    $allowed_types = array("pdf");
    if (!in_array($file_type,$allowed_types)) {
      echo "sorry, only pdf files are allowed"
    } 
    else{
        //move the ulpoaded file to the specified directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // file uploaded success, now store information in the database
        $filename = $_FILES ["fileToUpload"]["name"];
        $filesize = $_FILES ["fileToUpload"]["size"];
        $file_type = $_FILES ["fileToUpload"]["type"];


        //database connection
        include("connection.php");
        include("function.php");

        //insert te=he file information into the database
        $sql = "INSERT INTO files ( filename,filesize, filetype) VALUES ('$filename', '$filesize','$file_type')";
        
        if ($con->query ($sql)=== TRUE ){
            echo"THE FILE " . basename ($_FILES[ "fileToUpload"] [ "name"]) . " HAS BEEN SUCCESSFULLY ADDED TO THE DATABASE.";
          wind
        } else {
            echo "SORRY, THERE WAS AN ERROR IN UPLOADING  YOUR FILE and storing information in the database: " . $con ->error;
        }
        $con -> close();

        }
        else{ 
            echo "sorry, there was an error uploading your file.";
        }
    }
    else{
        echo " no file was uploded.";
    }
    }

    ?>