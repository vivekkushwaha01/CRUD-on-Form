<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Douce | Registration</title>
    <link rel="stylesheet" href="DouceForm.css">

    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>

    <?php
    $fname = $lname = $email = $day = $month = $year = $gender = $phone = $qualification = $img = "";
$error_name = $error_lname = $error_email = $error_contact = $error_dob = $error_gen = $error_qualification = "";

//  CONDITION TO VALIDATE FORM BY PHP 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["firstName"]) || $_POST["firstName"] == " "){
        $error_name =  "Fill first name.";
    }
    else{
        $fname =  $_POST["firstName"];
    }
    if(empty($_POST["lastName"])){
        $error_lname =  "Fill last name.";
    }
    else{
        $lname =  $_POST["lastName"];
    }
    
    if(empty($_POST["email"])){
        $error_email = "E-mail Required.";
    }
    else{
        $email = $_POST["email"];
    }
    if(empty($_POST["phone"])){
        $error_contact = "Contact field is empty.";
    }
    elseif(strlen($_POST["phone"]) > 10 || strlen($_POST["phone"]) < 10){
        $error_contact = "Incorrect Number.";
    }
    else{
        $phone = $_POST["phone"];
    }


    if(empty($_POST["quali"])){
        $error_qualification = "Please select qualification.";
    }
    else{
        $qualification = $_POST["quali"];
    }

    if(empty($_POST["day"])){
        $error_dob = "Select all three in DOB.";
    }
    else{
        $day = $_POST["day"];
    }
    if(empty($_POST["month"])){
        $error_dob = "Select all three in DOB.";
    }
    else{
        $month = $_POST["month"];
    }
    if( empty($_POST["year"])){
        $error_dob = "Select all three in DOB.";
    }
    else{
        $year = $_POST["year"];
    }
    if(empty($_POST["my_gen"])){
        $error_gen = "Select your gender.";
    }
    else{
        $gender = $_POST["my_gen"];
    }

    if(!empty($_POST["image"])){
        $img = $_POST["image"];
    }
//-----------------------------------------------------------------------------------------------------------------------



// ---------------------------------------   CONNECTION ESTABLISHMENT WITH DATABASE  ---------------------------------------
$connect = mysqli_connect("localhost","root","","douce");

if($connect){
    // echo "Connection established with Database.";
}
else{
    echo "Database not connected";
}

// ----------------------------------------   QUERY TO INSERT DATA TO DATABASE ------------------------------------------------
$send_data = "INSERT INTO `internship` (`Firstname`,`Lastname`,`Email`,`Day`,`Month`,`Year`,`Gender`,`Phone`,`Qualification`,`image`) VALUES ('$fname','$lname','$email','$day','$month','$year','$gender','$phone','$qualification','$img')";

$result = mysqli_query($connect,$send_data);

if($result){
    echo "<p class='success'>Thank you for taking the Form!</p>";
}
else{
    echo "failed to insert data".mysqli_error($connect);
}

}
?>




    <marquee behavior="alternate" direction="">Welcome to DOUCE infotech pvt. ltd. Internship registration portal.
    </marquee>



    <form action="<?php $_SERVER["PHP_SELF"] ?>" id="form" method="POST" class="New">
        <div class="img-logo">
            <img src="download (1).jpg" alt="" height=100>
        </div>


        <div class="inside-form">
            <div class="heading-box">
                <p class="form-heading">internship &nbsp; registration &nbsp;form</p>
            </div>
            <table>

                <tr>
                    <td><label for="first">First Name<span>*</span></label></td>
                    <td><label for="last_text">Last Name</label></td>
                </tr>
                <tr>
                    <td><input type="text" id="first" placeholder="First name" name="firstName"></td>
                    <td><input type="text" id="last" placeholder="Last Name" name="lastName"></td>

                </tr>
                <tr>
                    <td class="error_msg"><?php echo $error_name; ?></td>
                </tr>
                <tr>
                    <td class="error_msg"><?php echo $error_lname; ?></td>
                </tr>
                <tr>
                    <td><label for="email_id">Email Address<span>*</span></label></td>
                </tr>
                <tr>
                    <td><input type="email" id="email_id" class="lg_input" placeholder="Email Address" name="email">
                    </td>
                </tr>
                <tr>
                    <td class="error_msg"><?php echo $error_email; ?></td>
                </tr>
                <tr>
                    <td>DOB<span>*</span></td>
                </tr>
                <tr id="dob">
                    <td><select name="day">
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
                            <option>MONTH</option>
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

                    <td><select id="year" name="year">
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

                <tr>
                    <td class="error_msg"><?php echo $error_dob; ?></td>
                </tr>

                </tr>

                <tr>
                    <td>Gender</td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" class="gen" name="my_gen" value="Male" id="male">Male
                        <input type="radio" class="gen" name="my_gen" value="Female" id="female">Female
                    </td>
                </tr>

                <tr>
                    <td class="error_msg"><?php echo $error_gen; ?></td>
                </tr>
                <tr>
                    <td><label for="primary_no">Contact Number<span>*</span></label></td>
                </tr>
                <tr>
                    <td><input type="number" id="primary_no" class="lg_input" placeholder="Primary Number" name="phone">
                    </td>
                </tr>

                <tr>
                    <td class="error_msg"><?php echo $error_contact; ?></td>
                </tr>
                <tr>
                    <td><label for="Qualification"></label>Highest Qualification<span>*</span></td>
                </tr>
                <tr>
                    <td>
                        <select name="quali" id="Qualification" class="lg_input">
                            <option value="">---Select Qualification---</option>
                            <option value="B.Tech/B.E">B.Tech/B.E</option>
                            <option value="M.Tech/M.E">M.Tech/M.E</option>
                            <option value="Bca">Bca</option>
                            <option value="Mca">Mca</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="error_msg"><?php echo $error_qualification; ?></td>
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
                    <td><input type="reset" class="button"></td>
                    <td><input type="submit" id="sub" name="submit" class="button"></td>
                </tr>

            </table>
        </div>
    </form>

    <!-- <a href="doucedelete.php" target=_blank>Click here to delete..</a> -->
</body>

</html>