<?php
session_start();
include "./dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $tradeName = $_POST['TradeName'];
    $formula = $_POST['Formula'];
    $companyName = $_POST['CompanyName'];

    // Update the drug information using prepared statement
    $update = "UPDATE drugs SET Formula = ?, CompanyName = ? WHERE TradeName = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sss", $formula, $companyName, $tradeName);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Drug information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update drug information")</script>';
    }

    mysqli_stmt_close($stmt);
}
?>
