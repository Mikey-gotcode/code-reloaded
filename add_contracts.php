<?php
session_start();
include "./dbcon.php";


if (isset($_POST["add"]))//Getting the form data 
{
    //Initializing the submitted form data 
    $contractID=mysqli_real_escape_string($conn,$_POST['ContractID']);
    $phCompanyName=mysqli_real_escape_string($conn,$_POST['phCompanyName']);
    $phName=mysqli_real_escape_string($conn,$_POST['phName']);
    $startDate=mysqli_real_escape_string($conn,$_POST['startDate']);
    $endDate=mysqli_real_escape_string($conn,$_POST['endDate']);
    $contractText=mysqli_real_escape_string($conn,$_POST['contractText']);

    //Querying database to see if information exists
    $query="SELECT * FROM contracts WHERE ContractID='$contractID'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        //Displaying message that the records exist
        echo '<script>alert("Contract already exists")</script>';
    }
    else
    {
        //Inserting the data if it doesn't exist in the database
        $insert="INSERT INTO contracts(ContractID, PharmaceuticalCompanyName, PharmacyName, StartDate, EndDate, ContractText) VALUES('$contractID','$phCompanyName','$phName','$startDate','$endDate','$contractText')";
        mysqli_query($conn,$insert);
        echo '<script>alert("Contract information inserted successfully!")</script>';
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
    <form method="post" action="./add_contracts.php">
        <h1>add contracts</h1>
        <label>Contract_ID</label>
        <input type="number" name="ContractID" placeholder="Contract ID" required>
        <label>Pharmaceutical Company Name</label>
        <input type="text" name="phCompanyName" placeholder="Pharmaceutical Company Name" required>
        <label>Pharmacy Name</label>
        <input type="text" name="phName" placeholder="Pharmacy Name" required>
        <label>Start Date</label>
        <input type="date" name="startDate" placeholder="Start Date" required>
        <label>End Date</label>
        <input type="date" name="endDate" placeholder="End Date" required>
        <label>Contract Text</label>
        <input type="text" name="contractText" placeholder="Contract Text" required>
        <button type="submit" name="add">CREATE NEW CONTRACT</button>


    </form>
</body>
</html>





