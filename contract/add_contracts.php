<?php
session_start();
include "dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $contractID = $_POST['ContractID'];
    $phCompanyName = $_POST['phCompanyName'];
    $phName = $_POST['phName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $contractText = $_POST['contractText'];

    // Check if the contract already exists
    $query = "SELECT * FROM contracts WHERE ContractID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $contractID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Contract already exists")</script>';
    } else {
        // Insert contract information using prepared statement
        $insert = "INSERT INTO contracts(ContractID, PharmaceuticalCompanyName, PharmacyName, StartDate, EndDate, ContractText) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "isssss", $contractID, $phCompanyName, $phName, $startDate, $endDate, $contractText);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Contract information inserted successfully!")</script>';
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contracts</title>
</head>
<body>
    <form method="post" action="#">
        <h1>Add Contracts</h1>
        <label>Contract ID</label>
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
