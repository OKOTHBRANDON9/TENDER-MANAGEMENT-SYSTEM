<?php


$dbname="tender_MS";
$dbpassword="";
$dbuser="root";
$dbhost="localhost";


    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))

{
    die("failed to connect!");
}

