<?php

// ---------------------------------------   CONNECTION ESTABLISHMENT WITH DATABASE  ---------------------------------------
$connect = mysqli_connect("localhost","root","","douce");

if($connect){
     echo "Connection established with Database.";
}
else{
    echo "Database not connected";
}

$SNo = $_GET['vivek'];

$del = mysqli_query($connect,  "DELETE FROM internship where SNo = '$SNo'");
if($del){
    mysqli_close($connect);
    header("location:doucefetch.php");
    echo "Record Deleted successfully"."<br>";
    exit;
}
else{
    echo "error";
}


?>