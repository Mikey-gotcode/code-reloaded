<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $patientID = $_POST['PatientID'];
    $ssn = $_POST['SSN'];
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $age = $_POST['Age'];

    // Update the patient information using prepared statement
    $update = "UPDATE patients SET SSN = ?, Name = ?, Address = ?, Age = ? WHERE PatientID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "ssssi", $ssn, $name, $address, $age, $patientID);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Patient information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update patient information")</script>';
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
    <title>Edit Patient Information</title>
</head>
<body>
    <form action="update_patient.php" method="post">
        <h1>Edit Patient Information</h1>
        <label>Patient ID:</label>
        <input type="number" name="PatientID" placeholder="Patient ID" required>
        <label>SSN:</label>
        <input type="number" name="SSN" placeholder="SSN" required>
        <label>Name:</label>
        <input type="text" name="Name" placeholder="Name" required>
        <label>Address:</label>
        <input type="text" name="Address" placeholder="Address" required>
        <label>Age:</label>
        <input type="number" name="Age" placeholder="Age" required>
        <button type="submit" name="edit">Update Patient</button>
    </form>
</body>
</html>

