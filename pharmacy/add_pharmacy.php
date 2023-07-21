<?php
session_start();
include "./dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $phNumber = $_POST["PhoneNumber"];

    // Check if the pharmacy already exists
    $query = "SELECT * FROM pharmacy WHERE Name = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Pharmacy already exists")</script>';
    } else {
        // Insert pharmacy information using prepared statement
        $insert = "INSERT INTO pharmacy(Name, Address, PhoneNumber) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "sss", $name, $address, $phNumber);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Pharmacy information inserted successfully")</script>';
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pharmacy</title>
</head>
<body>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="Name" placeholder="Name" required>
        <label>Address:</label>
        <input type="text" name="Address" placeholder="Address" required>
        <label>Phone Number:</label>
        <input type="number" name="PhoneNumber" placeholder="Phone Number" required>
        <button type="submit" name="add">Add Pharmacy</button>
    </form>
</body>
</html>
