<?php


$dbname="tender_ms";
$dbpassword="";
$dbuser="root";
$dbhost="localhost";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname))

{
    die("failed to connect!");
}

