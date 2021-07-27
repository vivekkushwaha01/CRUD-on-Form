<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Douce | Data</title>


    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    table {
        border: 1px solid black;
        text-align: center;

    }

    th {
        background-color: green;
        color: white;
        padding: 5px;
    }

    td {
        border: 1px solid black;
        padding: 5px;

    }

    a {
        text-decoration: none;
        color: red;
    }
    </style>
</head>

<body>
    <?php
// ---------------------------------------   CONNECTION ESTABLISHMENT WITH DATABASE  ---------------------------------------
$connect = mysqli_connect("localhost","root","","douce");

if($connect){
    // echo "Connection established with Database.";
}
else{
    echo "Database not connected";
}

$fetch = "SELECT * FROM internship ";
$result = mysqli_query($connect,$fetch);

?>


    <!-- ----------------------------------------------------------------------- -->

    <?php
$numberToDelete = "";
$Phone = "";
$num_error = "";
$del_query = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["delNumber"])){
        $num_error = "Enter Candidate registerd Phone number to delete Record..";
    }
    else{
        $numberToDelete = $_POST['delNumber'];
    }
}


$delete ="DELETE FROM `internship` WHERE Phone = '$numberToDelete' ";
$del_query = mysqli_query($connect,$delete);
if($del_query){
    // echo "DELETED SUCCESSFULLY !";
    
}

else{
    echo "Error in deletion.".mysqli_error($connect);
}



?>


    <script>
    function delAlert() {
        alert("Are you sure, You want to delete !");
    }
    </script>


    <!-- --------------------------------------------------------------------------------------------------- -->
    <table>
        <thead>
            <tr>
                <th>S.No.</th>
                <th>FirstName </th>
                <th>LastName</th>
                <th>Email</th>
                <th>Day</th>
                <th>Month</th>
                <th>Year</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Qualification</th>
                <th>Image</th>
                <th colspan="2">Actions</th>
                
            </tr>
        </thead>

        <tbody>
            <?php
        while($row = $result->fetch_assoc()){
         echo '<tr>
         <td>'.$row["SNo"].'</td>
         <td>'.$row["Firstname"].'</td>
         <td>'.$row["Lastname"].'</td>
         <td>'.$row["Email"].'</td>
         <td>'.$row["Day"].'</td>
         <td>'.$row["Month"].'</td>
         <td>'.$row["Year"].'</td>
         <td>'.$row["Gender"].'</td>
         <td>'.$row["Phone"].'</td>
         <td>'.$row["Qualification"].'</td>
         <td>'.$row["image"].'</td>
      
         <td><a href="up.php?vivek='.$row["SNo"].'">update</a></td>
    

         <td><a href="doucedelete.php?vivek='.$row["SNo"].'">DELETE</a></td>
         </tr>';
        }
       
        ?>
        </tbody>
    </table>


</body>

</html>