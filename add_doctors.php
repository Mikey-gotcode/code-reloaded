<?php
session_start();
include "dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $dssn = $_POST['SSN'];
    $name = $_POST['Name'];
    $specialty = $_POST['Specialty'];
    $yoExperience = $_POST['ExperienceYears'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Check if the doctor already exists
    $query = "SELECT * FROM doctors WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $dssn);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Doctor already exists")</script>';
    } else {
        // Insert doctor's information using prepared statement
        $insert = "INSERT INTO doctors(SSN, Name, Specialty, ExperienceYears, Username, Password) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "ssssss", $dssn, $name, $specialty, $yoExperience, $username, $password);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Doctor information inserted successfully")</script>';
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
    <title>Add Doctor</title>
</head>
<body>
    <form action="add_doctors.php" method="post">
        <label>Doctor Social Security</label>
        <input type="number" name="SSN" placeholder="DSSN" required>
        <label>Name</label>
        <input type="text" name="Name" placeholder="Name" required>
        <label>Specialty</label>
        <input type="text" name="Specialty" placeholder="Specialty" required>
        <label>Years of Experience</label>
        <input type="number" name="ExperienceYears" placeholder="ExperienceYears" required>
        <label>Username</label>
        <input type="text" name="Username" placeholder="Username" required>
        <label>Password</label>
        <input type="text" name="Password" placeholder="Password" required>
        <button type="submit" name="add">Add Doctor</button>
    </form>
</body>
</html>
