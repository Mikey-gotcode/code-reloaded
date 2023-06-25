<?php
session_start();
include "./dbcon.php";

if(isset($_POST["add"]))//getting the form data
{

    //initializing the submitted form data
$phName=mysqli_real_escape_string($conn,$_POST["PharmacyName"]);
$tradeName=mysqli_real_escape_string($conn,$_POST["TradeName"]);
$price=mysqli_real_escape_string($conn,$_POST["Price"]);

//querying database to see if the information exists
$query="SELECT * FROM pharmacydrugs WHERE TradeName='$tradeName'";
$result=mysqli_query($conn,$query);


if(mysqli_num_rows($result)>0)
{
   //display message that the record already exists  
echo'<script>alert("drug already exist")</script>';

}
else{

$insert="INSERT INTO pharmacydrugs(PharmacyName,TradeName,Price) VALUES ('$phName','$tradeName','$price')";
mysqli_query($conn,$query);
echo'<script>alert("Drug information inserted successfully")</script>';


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
    <form action="add_pharmacydrugs.php" method="post">
       <label>Pharmacy Name</label> 
       <input type="text" name="PharmacyName" placeholder="Pharmacy Name">
       <label>Trade Name</label> 
       <input type="text" name="TradeName" placeholder="Trade Name">
       <label>Price</label> 
       <input type="number" name="Price" placeholder="price">
       <button type="submit" name="add" >Add drug</button>
       


    </form>
</body>
</html>