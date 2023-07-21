<?php
session_start();
include "./dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $phName = $_POST["PharmacyName"];
    $tradeName = $_POST["TradeName"];
    $price = $_POST["Price"];

    // Check if the pharmacy drug already exists
    $query = "SELECT * FROM pharmacydrug WHERE TradeName = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $tradeName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Drug already exists")</script>';
    } else {
        // Insert pharmacy drug information using prepared statement
        $insert = "INSERT INTO pharmacydrug(PharmacyName, TradeName, Price) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "sss", $phName, $tradeName, $price);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Drug information inserted successfully")</script>';
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
    <title>Add Pharmacy Drug</title>
</head>
<body>
    <form action="add_pharmacydrugs.php" method="post">
       <label>Pharmacy Name</label> 
       <input type="text" name="PharmacyName" placeholder="Pharmacy Name" required>
       <label>Trade Name</label> 
       <input type="text" name="TradeName" placeholder="Trade Name" required>
       <label>Price</label> 
       <input type="number" name="Price" placeholder="Price" required>
       <button type="submit" name="add">Add Drug</button>
    </form>
</body>
</html>
