<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $dssn = $_POST["SSN"];
    $fname = $_POST["Firstname"];
    $lname=$_POST['Lastname'];
    $specialty = $_POST["Specialty"];
    //$experienceYears = $_POST["ExperienceYears"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $phonenumber=$_POST['Phonenumber'];

    // Update doctor's information
    $update = "UPDATE doctors SET Firstname = ?,Lastname=?, Specialty = ?, Username = ?, Password = ? ,Phonenumber=?,WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sssssii", $fname,$lname, $specialty, $username, $password,$Phonenumber, $dssn);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo '<script>alert("Doctor information updated successfully")</script>';
}

// Retrieve the doctor's information for editing
if (isset($_GET["SSN"])) {
    $doctorID = $_GET["SSN"];

    // Retrieve the doctor's information from the database
    $query = "SELECT * FROM doctors WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $doctorID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if the doctor exists
    if ($row) {
        $doctorID = $row["SSN"];
        $fname = $row["Firstname"];
        $lname=$_POST['Lastname'];
        $specialty = $row["Specialty"];
       // $experienceYears = $row["ExperienceYears"];
        $username = $row["Username"];
        $password = $row["Password"];
        $phonenumber=$_POST['Phonenumber'];
    } else {
        // Doctor not found
        echo '<script>alert("Doctor not found")</script>';
        // Redirect to the doctor list page or display an error message as needed
        exit();
    }

    mysqli_stmt_close($stmt);
} else {
    // doctorID parameter not provided
    echo '<script>alert("No doctor ID provided")</script>';
    // Redirect to the doctor list page or display an error message as needed
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>
<body>
<div class="formdiv">
        <h3>Add doctors information</h3>
    <form action="#" method="post">
        <table>
            <tr>
                <td> 
                     <label>Doctor Social Security</label>
                </td>
                <td>
                    <input type="hidden" name="SSN" placeholder="DSSN" required>
                </td>
            </tr>
            <tr>
                <td><label>Firstname</label></td>
                <td><input type="text" name="Firstname" placeholder="firstName" required></td>
            </tr>
            <tr>
                <td> <label>Lastname</label></td>
                <td><input type="text" name="Lastname" placeholder="Lastname" required></td>
            </tr>
            <tr>
                <td><label>Specialty</label></td>
                <td><input type="text" name="Specialty" placeholder="Specialty" required></td>
            </tr>
           
            <tr>
                <td><label>Username</label></td>
                <td><input type="text" name="Username" placeholder="Username" required></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input type="text" name="Password" placeholder="Password" required></td>
            </tr>
            <tr>
                <td><label>Phone number:</label></td>
                <td><input type="number" name="Phonenumber" placeholder="Phone-number" required></td>
            </tr>
        </table>
        <button type="submit" name="add">Add Doctor</button>
    </form>

    </div>
</body>
</html>
