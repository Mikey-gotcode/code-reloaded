<?php 
session_start();
include "./dbcon.php";



if(isset($_POST["add"]))//getting data from form
{

$contractID=mysqli_real_escape_string($conn,$_POST['ContractID']);
$supervisorName=mysqli_real_escape_string($conn,$_POST['SupervisorName']);



$query="SELECT * FROM supervisor WHERE ContractID='$contractID' ";
$result=mysqli_query($conn,$$query);


if(mysqli_num_rows($result)>0)
{

    //display that contract already exists
echo'<script>alert("Contract Already Exists")</script>';

}
else{

//insert supervisors information

$insert="INSERT INTO supervisor (ContractID,Supervisor) VALUES('$contractID','$supervisorName')";
mysqli_query($conn,$insert);
echo'<script>alert("Inserted new supervisor information")</script>';




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
    <label>Contract ID:</label>
    <input type="number" name="ContractID" placeholder="Contract ID">
    <label>Supervisor Name:</label>
    <input type="text" name="SupervisorName" placeholder="Supervisor Name">
    <button type="submit" name="add">ADD SUPERVISOR</button>
</body>
</html>