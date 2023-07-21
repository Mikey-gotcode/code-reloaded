<?php
session_start();
include "./dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoneNumber'];

    // Update the pharmacy information using prepared statement
    $update = "UPDATE pharmacy SET Address = ?, PhoneNumber = ? WHERE Name = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sss", $address, $phoneNumber, $name);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Pharmacy information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update pharmacy information")</script>';
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
    <title>Edit Pharmacy Information</title>
</head>
<body>
    <form action="update_pharmacy.php" method="post">
        <h1>Edit Pharmacy Information</h1>
        <label>Pharmacy ID:</label>
        <input type="number" name="PharmacyID" placeholder="Pharmacy ID" required>
        <label>Name:</label>
        <input type="text" name="Name" placeholder="Name" required>
        <label>Address:</label>
        <input type="text" name="Address" placeholder="Address" required>
        <label>Phone Number:</label>
        <input type="text" name="PhoneNumber" placeholder="Phone Number" required>
        <button type="submit" name="edit">Update Pharmacy</button>
    </form>
</body>
</html>

