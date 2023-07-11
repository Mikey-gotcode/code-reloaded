<?php
session_start();
include "dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $ssn = $_POST['SSN'];
    $name = $_POST['Name'];
    $address = $_POST['Address'];
    $age = $_POST['Age'];

    // Check if the patient already exists
    $query = "SELECT * FROM patients WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $ssn); // Bind the SSN value to the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Patient already exists")</script>';
    } else {
        // Insert patient information using prepared statement
        $insert = "INSERT INTO patients(SSN, Name, Address, Age) VALUES(?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "sssi", $ssn, $name, $address, $age); // Bind the values to the prepared statement
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Patient information inserted successfully")</script>';
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Patients Addition Form</title>
  </head>
  <body>
    <form action="add_patients.php" method="post">
      <h1>Add Patients</h1>
      <label>Social Security Number</label>
      <input type="number" name="SSN" placeholder="SSN" required>
      <label>Name</label>
      <input type="text" name="Name" placeholder="Name" required>
      <label>Address</label>
      <input type="text" name="Address" placeholder="Address" required>
      <label>Age</label>
      <input type="number" name="Age" placeholder="Age" required>
      <button type="submit" name="add">Add New Patient</button>
    </form>
  </body>
</html>
