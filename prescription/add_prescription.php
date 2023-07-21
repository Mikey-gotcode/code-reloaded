<?php 
session_start();
include "./dbcon.php";

if(isset($_POST["add"])) {
    // Get the form data
    $prescriptionID = $_POST['PrescriptionSSN'];
    $doctorSSN = $_POST['DoctorSSN'];
    $patientSSN = $_POST['PatientSSN'];
    $drugTName = $_POST['DrugTradeName'];
    $prescriptionDate = $_POST['PrescriptionDate'];
    $quantity = $_POST['Quantity'];
    $description = $_POST['Description'];

    // Check if the prescription already exists for the patient
    $query = "SELECT * FROM prescription WHERE PrescriptionID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $prescriptionID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the prescription already exists
        echo '<script>alert("Prescription already exists")</script>';
    } else {
        // Insert prescription information using prepared statement
        $insert = "INSERT INTO prescription (PrescriptionID, DoctorSSN, PatientSSN, DrugTradeName, PrescriptionDate, Quantity, Description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "sssssss", $prescriptionID, $doctorSSN, $patientSSN, $drugTName, $prescriptionDate, $quantity, $description);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Patient prescription record successfully added.")</script>';
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prescription</title>
</head>
<body>
    <form method="post" action="">
        <label>Prescription ID:</label>
        <input type="number" name="PrescriptionSSN" placeholder="Prescription SSN" required>
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
        <button type="submit" name="add">ADD PRESCRIPTION</button>
    </form>
</body>
</html>
