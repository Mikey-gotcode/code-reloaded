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
    $phonenumber=$_POST['Phonenumber'];

    print_r($_POST);

    // Check if the doctor already exists
    $query = "SELECT * FROM doctors WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $dssn);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Doctor already exists")</script>';
    } else {
        // Insert doctor's information using prepared statement
        $insert = "INSERT INTO doctors(SSN, Name, Specialty, ExperienceYears, Username, Password,Phonenumber) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "ississi", $dssn, $name, $specialty, $yoExperience, $username, $password, $phonenumber);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("'.htmlspecialchars("Doctor information inserted successfully").'")</script>';
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
    <style>
        .formdiv{
            position:relative;
            border:5px outset red;
            background-color: lightblue;
            text-align:left;
            top:70px;
            left:25px;
            height:83%;
            width:45%;
            padding:15px 25px;



        }
        .form{
            position: absolute;
            background:  White;
            top: 40px;
            left:20px;
            height: 83%;
            width:80%;
            padding: 15px 25px;


        }
       




    </style>
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
                    <input type="number" name="SSN" placeholder="DSSN" required>
                </td>
            </tr>
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="Name" placeholder="Name" required></td>
            </tr>
            <tr>
                <td><label>Specialty</label></td>
                <td><input type="text" name="Specialty" placeholder="Specialty" required></td>
            </tr>
            <tr>
                <td> <label>Years of Experience</label></td>
                <td><input type="number" name="ExperienceYears" placeholder="Experience in Years" required></td>
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
