<?php
session_start();
include "./dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $pharmacyName = $_POST['PharmacyName'];
    $tradeName = $_POST['TradeName'];
    $price = $_POST['Price'];

    // Update the pharmacy drug information using prepared statement
    $update = "UPDATE pharmacydrugs SET Price = ? WHERE PharmacyName = ? AND TradeName = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "dss", $price, $pharmacyName, $tradeName);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Pharmacy drug information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update pharmacy drug information")</script>';
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
    <title>Edit Pharmacy Drug Information</title>
</head>
<body>
    <form action="update_pharmacydrug.php" method="post">
        <h1>Edit Pharmacy Drug Information</h1>
        <label>Pharmacy Name:</label>
        <input type="text" name="PharmacyName" placeholder="Pharmacy Name" required>
        <label>Trade Name:</label>
        <input type="text" name="TradeName" placeholder="Trade Name" required>
        <label>Price:</label>
        <input type="number" name="Price" placeholder="Price" required>
        <button type="submit" name="edit">Update Pharmacy Drug</button>
    </form>
</body>
</html>
