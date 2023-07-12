<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $contractID = $_POST['ContractID'];
    $phCompanyName = $_POST['PhCompanyName'];
    $phName = $_POST['PhName'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $contractText = $_POST['ContractText'];

    // Update the contract information using prepared statement
    $update = "UPDATE contracts SET PharmaceuticalCompanyName = ?, PharmacyName = ?, StartDate = ?, EndDate = ?, ContractText = ? WHERE ContractID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sssssi", $phCompanyName, $phName, $startDate, $endDate, $contractText, $contractID);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Contract information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update contract information")</script>';
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
    <title>Edit Contract Information</title>
</head>
<body>
    <form action="update_contract.php" method="post">
        <h1>Edit Contract Information</h1>
        <label>Contract ID:</label>
        <input type="number" name="ContractID" placeholder="Contract ID" required>
        <label>Pharmaceutical Company Name:</label>
        <input type="text" name="PharmaceuticalCompanyName" placeholder="Pharmaceutical Company Name" required>
        <label>Pharmacy Name:</label>
        <input type="text" name="PharmacyName" placeholder="Pharmacy Name" required>
        <label>Start Date:</label>
        <input type="date" name="StartDate" placeholder="Start Date" required>
        <label>End Date:</label>
        <input type="date" name="EndDate" placeholder="End Date" required>
        <label>Contract Text:</label>
        <input type="text" name="ContractText" placeholder="Contract Text" required>
        <button type="submit" name="edit">Update Contract</button>
    </form>
</body>
</html>
