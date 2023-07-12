<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    // Get the form data
    $prescriptionID = $_POST['PrescriptionID'];
    $doctorSSN = $_POST['DoctorSSN'];
    $patientSSN = $_POST['PatientSSN'];
    $drugTradeName = $_POST['DrugTradeName'];
    $prescriptionDate = $_POST['PrescriptionDate'];
    $quantity = $_POST['Quantity'];
    $description = $_POST['Description'];

    // Update the prescription information using prepared statement
    $update = "UPDATE prescription SET DoctorSSN = ?, PatientSSN = ?, DrugTradeName = ?, PrescriptionDate = ?, Quantity = ?, Description = ? WHERE PrescriptionID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "ssssisi", $doctorSSN, $patientSSN, $drugTradeName, $prescriptionDate, $quantity, $description, $prescriptionID);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo '<script>alert("Prescription information updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update prescription information")</script>';
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
    <title>Edit Prescription Information</title>
</head>
<body>
    <form action="update_prescription.php" method="post">
        <h1>Edit Prescription Information</h1>
        <label>Prescription ID:</label>
        <input type="number" name="PrescriptionID" placeholder="Prescription ID" required>
        <label>Doctor SSN:</label>
        <input type="number" name="DoctorSSN" placeholder="Doctor SSN" required>
        <label>Patient SSN:</label>
        <input type="number" name="PatientSSN" placeholder="Patient SSN" required>
        <label>Drug Trade Name:</label>
        <input type="text" name="DrugTradeName" placeholder="Drug Trade Name" required>
        <label>Prescription Date:</label>
        <input type="date" name="PrescriptionDate" placeholder="Prescription Date" required>
        <label>Quantity:</label>
        <input type="number" name="Quantity" placeholder="Quantity" required>
        <label>Description:</label>
        <input type="text" name="Description" placeholder="Description" required>
        <button type="submit" name="edit">Update Prescription</button>
    </form>
</body>
</html>

