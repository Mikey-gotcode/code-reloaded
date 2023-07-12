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
