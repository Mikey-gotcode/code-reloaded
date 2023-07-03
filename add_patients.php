<?php 
session_start(); 
include "./dbcon.php";




if (isset($_POST["add"]))//getting the form data
{


    //initializing the submitted form data
    $ssn=mysqli_real_escape_string($conn,$_POST['SSN']);
    $name=mysqli_real_escape_string($conn,$_POST['Name']);
    $address=mysqli_real_escape_string($conn,$_POST['Address']);
    $age=mysqli_real_escape_string($conn,$_POST['Age']);
    //$username=mysqli_real_escape_string($conn,$_POST['Username']);
    //$password=mysqli_real_escape_string($conn,$_POST['Password']);



    //querying database to see if the information exists
    $query="SELECT * FROM patients WHERE SSN='$ssn'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){

        //display message that the records exists
        echo '<script>alert("Patient already exists")</script>';
    }
    else{

      //INSERT PATIENT INFORMATION
        $insert="INSERT INTO patients(SSN,Name,Address,Age) VALUES('$ssn','$name','$address','$age')";
        mysqli_query($conn,$insert);
        echo '<script>alert("Patient information inserted succesfully")</script>';



    }







}
  
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>patients addition table</title>
  </head>
  <body>
    <form action="add_patients.php" method="post">
      <h1>add patients</h1>
    <label>Social security number</label>
    <input type="number" name="SSN" placeholder="SSN">
    <label>Name</label>
    <input type="text" name="Name" placeholder="Name">
    <label>Address</label>
    <input type="text" name="Address" placeholder="Address">
    <label>Age</label>
    <input type="number" name="Age" placeholder="Age">
    <label>Username</label>
    <input type="text" name="Username" placeholder="Username">  
    <label>Password</label>
    <input type="password" name="Password" placeholder="Password">
    <button type="submit">ADD NEW PATIENT</button>

    </form>


   
  </body>
</html>