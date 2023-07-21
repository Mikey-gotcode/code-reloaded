<?php 
session_start();
include "./dbcon.php";


if(isset($_SESSION["successMessage"]))
$query="SELECT * FROM `doctors`";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);

if($total!=0){
    
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

<main>
    <div>
        <h2>Account Information</h2>
        <table>
            <tr>
                <td>Doctor ID</td>
                <td><?php $row['SSN'];?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php $row['Firstname'];?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php $row['Lastname'];?></td>
            </tr>
            <tr>
                <td>Specialty</td>
                <td><?php $row['Specialty'];?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php $row['Username'];?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php $row['Password'];?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php $row['Phonenumber'];?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
</main>
    
</body>
</html>