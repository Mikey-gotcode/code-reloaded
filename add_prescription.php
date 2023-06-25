<?php 
session_start();
include "./dbcon.php";



if(isset($_POST["add"]))//getting data from form
{
$prescriptionID=mysqli_real_escape_string($conn,$_POST['PrescriptionSSN']);
$doctorSSN=mysqli_real_escape_string($conn,$_POST['DoctorSSN']);
$patientSSN=mysqli_real_escape_string($conn,$_POST['PatientSSN']);
$drugTName=mysqli_real_escape_string($conn,$_POST['DrugTradeName']);
$prescriptionDate=mysqli_real_escape_string($conn,$_POST['PrescriptionDate']);
$quantity=mysqli_real_escape_string($conn,$_POST['Quantity']);
$description=mysqli_real_escape_string($conn,$_POST['Description']);


$query="SELECT * FROM prescription WHERE PatientSSN='$patientSSN'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)
{

//display that Patient/Prescription doesnt exist
echo'<script>alert("")</script>';

}
else{

    //INSERT PRESCRIPTION INFORMATION

    $insert="INSERT INTO prescription (PrescriptionID,DoctorSSN,PatientSSN,DrugTradeName,PrescriptionDate,Quantity,Description) VALUES('$prescriptionID','$doctorSSN','$patientSSN','$drugTNAME','$prescriptionDate','$quantity','$description')";
    mysqli_query($conn,$insert);


    echo'<script>alert("patient prescription record successfully added.")</script>';


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
    <label>Prescription ID:</label>
    <input type="number" name="PrescriptionSSN" placeholder="Prescription SSN">
    <label>Doctor SSN:</label>
    <input type="number" name="DoctorSSN" placeholder="Doctor SSN">
    <label>Patient SSN:</label>
    <input type="number" name="PatientSSN" placeholder="Patient SSN">
    <label>Drug Trade Name:</label>
    <input type="text" name="DrugTradeName" placeholder="Drug Trade Name">
    <label>Prescription Date:</label>
    <input type="date" name="PrescriptionDate" placeholder="Prescription Date">
    <label>Quantity:</label>
    <input type="number" name="Quantity" placeholder="Quantity">
    <label>Description:</label>
    <input type="text" name="Description" placeholder="Description">
    <button type="submit" name="add">ADD PRESCRIPTION</button>
</body>
</html>