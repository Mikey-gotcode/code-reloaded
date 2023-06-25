<?php
session_start();
include "./dbcon.php";


if(isset($_POST["add"]))//getting the form data
{
    //initializing the submitted form data
$dssn=mysqli_real_escape_string($conn,$POST["SSN"]);
$name=mysqli_real_escape_string($conn,$POST["Name"]);
$specialty=mysqli_real_escape_string($conn,$POST["Specialty"]);
$yoExperience=mysqli_real_escape_string($conn,$POST["ExperienceYears"]);
$username=mysqli_real_escape_string($conn,$POST["Username"]);
$password=mysqli_real_escape_string($conn,$Post["Password"]);


//querying database to see if the information exists
$query="SELECT * FROM doctors WHERE SSN='$dssn'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0){

//display message that the record already exist
echo'<script>alert("doctor already exists")</script>';

}
else{
    //INSERT DOCTOR'S INFORMATION
    $insert="INSERT INTO doctors(SSN,Name,Specialty,ExperienceYears,Username,Password) VALUES('$dssn','$name','$specialty','$yoExperience','$username','$password') ";
    mysqli_query($conn,$insert);
    echo '<script>alert("Patient information inserted succesfully")</script>';
}





}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_doctors" method="post">
        <label>Doctor Social Security</label>
        <input type="number" name="SSN"  placeholder="DSSN">
        <label>Name</label>
        <input type="text" name="Name" placeholder="Name">
        <label>Specialty</label>
        <input type="text" name="Address" placeholder="Specialty">
        <label>Years of Experience</label>
        <input type="number" name="Age" placeholder="ExperienceYears">
        <label>Username</label>
        <input type="text" name="Username" placeholder="Username">
        <label>Password</label>
        <input type="text" name="Password" placeholder="Password">
        <button type="submit" name="add">Add doctor</button>
    </form>
</body>
</html>