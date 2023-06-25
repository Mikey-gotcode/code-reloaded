<?php
session_start();
include "./dbcon.php";


if(isset($_POST["add"]))//getting the form data
{
//initializing the submitted form data
$name=mysqli_real_escape_string($conn,$_POST["Name"]);
$address=mysqli_real_escape_string($conn,$_POST["Address"]);
$phNumber=mysqli_real_escape_string($conn,$_POST["PhoneNumber"]);

//querying database to see if the information exists
$query="INSERT INTO pharmacy (Name,Address,PhoneNumber) VALUES ('$name','$address','$phNumber')";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{

//display message that the record exists
echo'<script>alert("pharmacy already exists")</script>';


}
else{

$insert="INSERT INTO pharmacy(Name,Address,PhoneNumber) VALUES('$name','$address','$phNumber')";
mysqli_query($conn,$query);
echo'<script>alert("Pharmacy information inserted successfully")</script>';


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
    <form>
        <label>Name:</label>
        <input type="text" name="Name" placeholder="Name">
        <label>Address:</label>
        <input type="text" name="Address" placeholder="Address">
        <label>Phone Number:</label>
        <input type="number" name="PhoneNumber" placeholder="Phone Number">
        <button type="submit" name="add">Add Pharmacy</button>
    </form>>
</body>
</html>