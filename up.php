<?php


// ---------------------------------------   CONNECTION ESTABLISHMENT WITH DATABASE  ---------------------------------------
$connect = mysqli_connect("localhost","root","","douce");

if($connect){
     //echo "Connection established with Database.";
}
else{
    echo "Database not connected".mysqli_error($connect);
}


$employee =$_GET['vivek']; // get id through query string
$result= mysqli_query($connect,"SELECT * from internship where SNo = '$employee'");
while($res=mysqli_fetch_array($result)){

    // In $res["This is database column name"];
    $fname = $res["Firstname"];
    $lname = $res["Lastname"];
    $email = $res["Email"];
    $day   = $res["Day"];
    $month = $res["Month"];
  
    $year = $res["Year"];
    $gender = $res["Gender"];
    $phone = $res["Phone"];
    $qualification = $res["Qualification"];
    $img = $res["image"];
}
?>
<?php
if(isset($_POST['update'])){
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];
    $ema = $_POST['email'];
    $da = $_POST['day'];
    $mon = $_POST['month'];
    $yer = $_POST['year'];
    $gen =$_POST['my_gen'];
    $phn =$_POST['phone'];
    $qal  =$_POST['quali'];
    $img =$_POST['image'];

    $result= mysqli_query($connect,"UPDATE internship SET Firstname = '$fn', Lastname='$ln',Email = '$ema',Day ='$da',Month = '$mon', 
    Year = '$yer', Gender = '$gen', Phone = '$phn', Qualification = '$qal', image = '$img'  where SNo='$employee'");
    
    if($result){
        header("location:doucefetch.php");
    }
    else{
        echo "updation failed...".mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Douce | Updation Form</title>
    <link rel="stylesheet" href="DouceForm.css">


    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>



 

    <style>
    .alert-success {
        color: green;
        text-align: center;
    }
    </style>


</head>

<body>



    <form action="" id="form" method="POST" class="New" onsubmit = "return validate()">
        <div class="img-logo">
            <img src="download (1).jpg" alt="" height=100>
        </div>


        <div class="inside-form">
            <div class="heading-box">
                <p class="form-heading">internship &nbsp; updation &nbsp;form</p>
            </div>
            <table>

                <tr>
                    <td><label for="first">First Name<span>*</span></label></td>
                    <td><label for="last_text">Last Name</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="first" placeholder="First name" name="firstName" value="<?php echo $fname  ?>"></td>
                    <td><input type="text" id="last" placeholder="Last Name" name="lastName"    value="<?php echo $lname  ?>"></td>

                </tr>
               
               
                <tr>
                    <td><label for="email_id">Email Address<span>*</span></label></td>
                </tr>
                <tr>
                    <td><input type="email" id="email_id" class="lg_input" placeholder="Email Address" name="email" value="<?php echo $email  ?>">
                    </td>
                </tr>
               
                <tr>
                    <td>DOB<span>*</span></td>
                </tr>
                <tr id="dob">
                    <td><select name="day" value="<?php echo $day  ?>">
                            <option>DAY</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </td>

                    <td><select id="month" name="month">
                            <option  value="<?php echo $month  ?>">MONTH</option>
                            <option value="Jan">January</option>
                            <option value="Feb">Feburary</option>
                            <option value="Mar">March</option>
                            <option value="Apr">April</option>
                            <option value="May">May</option>
                            <option value="Jun">June</option>
                            <option value="July">July</option>
                            <option value="Aug">August</option>
                            <option value="Sep">September</option>
                            <option value="Oct">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                    </td>

                    <td><select id="year" name="year" value="<?php echo $year  ?>"> 
                            <option>YEAR</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                        </select>
                    </td>

              

                </tr>

                <tr>
                    <td>Gender</td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" class="gen" name="my_gen" value="Male" id="male" value="<?php echo $gender  ?>">Male
                        <input type="radio" class="gen" name="my_gen" value="Female" id="female" value="<?php echo $gender  ?>">Female
                    </td>
                </tr>

              
                <tr>
                    <td><label for="primary_no">Contact Number<span>*</span></label></td>
                </tr>
                <tr>
                    <td><input type="number" id="primary_no" class="lg_input" placeholder="Primary Number" name="phone" value="<?php echo $phone  ?>">
                    </td>
                </tr>

               
                <tr>
                    <td><label for="Qualification"></label>Highest Qualification<span>*</span></td>
                </tr>
                <tr>
                    <td>
                        <select name="quali" id="Qualification" class="lg_input" value="<?php echo $qualification  ?>">
                            <option value="">---Select Qualification---</option>
                            <option value="B.Tech/B.E">B.Tech/B.E</option>
                            <option value="M.Tech/M.E">M.Tech/M.E</option>
                            <option value="Bca">Bca</option>
                            <option value="Mca">Mca</option>
                        </select>
                    </td>
                </tr>
               
                <tr>
                    <td>Your Resume</td>
                </tr>
                <tr>
                    <td><input type="file" name="image"></td>
                </tr>


                <tr>
                    <td><input type="checkbox"
                            onchange="document.getElementById('sub').disabled = !this.checked;">&nbsp;I Accept the
                        company Norms.</td>
                </tr>
                <tr>
                    <!-- <td><input type="reset" class="button"></td> -->
                    <td><input type="submit" id="update" name="update" value="update" class="button"></td>
                </tr>

            </table>
        </div>
    </form>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>