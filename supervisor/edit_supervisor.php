<?php
session_start();
include "./dbcon.php";

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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supervisor Information</title>
</head>
<body>
    <form action="update_supervisor.php" method="post">
        <h1>Edit Supervisor Information</h1>
        <label>Supervisor ID:</label>
        <input type="number" name="SupervisorID" placeholder="Supervisor ID" required>
        <label>Contract ID:</label>
        <input type="number" name="ContractID" placeholder="Contract ID" required>
        <label>Supervisor Name:</label>
        <input type="text" name="SupervisorName" placeholder="Supervisor Name" required>
        <button type="submit" name="edit">Update Supervisor</button>
    </form>
</body>
</html>

