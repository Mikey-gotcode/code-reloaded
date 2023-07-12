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
