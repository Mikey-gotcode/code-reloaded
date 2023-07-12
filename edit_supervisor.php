<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $supervisorID = $_POST['SupervisorID'];
    $contractID = $_POST['ContractID'];
    $supervisorName = $_POST['SupervisorName'];

    // Update the supervisor information using prepared statement
    $update = "UPDATE supervisor SET ContractID = ?, SupervisorName = ? WHERE SupervisorID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "iss", $contractID, $supervisorName, $supervisorID);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Supervisor information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update supervisor information")</script>';
    }

    mysqli_stmt_close($stmt);
}
?>
