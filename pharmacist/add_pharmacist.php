<?php 
session_start();
include "dbcon.php";

if(isset($_POST['add']))
{
    //get form from data
    $phssn=$_POST['SSN'];
    $firstname=$_POST['Firstname'];
    $lastname=$_POST['Lastname'];
    $phonenumber=$_POST['Phonenumber'];


    //check if the pharmacist already exists
    $query="SELECT * FROM pharmacist WHERE SSN=?";
    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt,"i",$phssn);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);


    if(mysqli_num_rows($result)>0){

        //display that info already exists

        echo'<script>alert("pharmacist already exists")</script>';
    
    }else{

        //insert pharmacist information
        $insert="INSERT INTO pharmacists (SSN,Firstname,Lastname,Phonenumber) VALUES(?,?,?,?)";
        $stmt=mysqli_prepare($conn,$insert);
        mysqli_stmt_bind_param($stmt,"issi",$phssn,$fisrtname,$lastname,$phonenumber);
        mysqli_stmt_execute($stmt);

        echo'<script>alert("Inserted pharmacist information")</script>';
    
    
    }

    mysqli_stmt_close($stmt);
    





}




?>