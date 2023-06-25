<?php 
session_start();
include "./dbcon.php";



if(isset($_POST["add"]))//getting data from form
{
$patientSSN=mysqli_real_escape_string($conn,$_POST['PatientSSN']);
$doctorSSN=mysqli_real_escape_string($conn,$_POST['DoctorSSN']);


$query="SELECT * FROM patientdoctors WHERE PatientSSN='$patientSSN'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0){

//display that doctor is already assigned to patient
echo'<script>alert("Doctor is already assigned to patient")</script>';


}
else{

//INSERT INFORMATION ABOUT PATIENT'S DOCTOR    

$insert="INSERT INTO patientdoctors (PatientSSN,DoctorSSN) VALUES('$patientSSN','$doctorSSN')";
mysqli_query($conn,$insert);
echo'<script>alert("New doctors information added to patient record")</script>';


}






}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Patient SSN:</label>
    <input type="number" name="PatientSSN" placeholder="Patient SSN">
    <label>Doctor SSN:</label>
    <input type="number" name="DoctorSSN" placeholder="Doctor SSN">
    <button type="submit" name="add">ADD PATIENT'S DOCTOR</button>
</body>
</html>