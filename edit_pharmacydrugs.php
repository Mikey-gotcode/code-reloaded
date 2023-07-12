<?php
session_start();
include "dbcon.php";

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
