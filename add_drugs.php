<?php
session_start();
include "./dbcon.php";

if(isset($_POST["add"]))//getting the form data
{
$tradeName=mysqli_real_escape_string($conn,$_POST["TradeName"]);
$formula=mysqli_real_escape_string($conn,$_POST["Formula"]);
$cpName=mysqli_real_escape_string($conn,$_POST["CompanyName"]);

//querying database to see if the information exists
$query="SELECT * FROM drugs WHERE TradeName='$tradeName'";
$result=mysqli_query($conn,$query);



if(mysqli_num_rows($result)>0)
{

 //displays message that the information already exists
    echo'<script>alert("Drug information already exists")</script>';
}
else{

//insert the data if it doesn't exists in the database
$insert="INSERT INTO drugs(TradeName,Formula,CompanyName) VALUES('$tradeName','$formula','$cpName')";
mysqli_query($conn,$insert);
echo'<script>alert("Drug information inserted successfully")</script>';

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
    <label>Trade Name:</label>
    <input type="text" name="TradeName" placeholder="Trade name">
    <label>Formula:"</label>
    <input type="text" name="Formula" placeholder="Formula">
    <label>Company Name:</label>
    <input type="text" name="CompanyName" placeholder="Company name">
    <button type="submit" name="add">ADD DRUG</button>
</body>
</html>