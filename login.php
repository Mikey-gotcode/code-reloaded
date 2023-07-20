<?php 
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user_type = $_POST['user_type'];
    $userName = $_POST['Username'];
    $passWord = $_POST['Password'];

    if ($user_type == 'doctor') {
        header("Location:doctor/doctor_page.php");
        exit();
    } elseif ($user_type == 'patient') {
        header("Location: patient.php");
        exit();
    } elseif ($user_type == 'phCompany') {
        header("Location: pharmaceuticalCompany.php");
        exit();
    } elseif ($user_type == 'supervisor') {
        header("Location: supervisor.php");
        exit();
    } else {
        echo '<script>alert("User type not selected")</script>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>

    </style>
    
</head>
<body>
    <form action="#" method="post">
        <div>
            <table>
                <tr>
                    <td>
                        <label for="Password">Username:</label>
    
                    </td>
                    <td>
                        <input type="text" name="Username" placeholder="">
    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Password">Password:</label>
    
                    </td>
                    <td>
                        <input type="password" name="Password" placeholder="">
    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_type">User type:</label>
                    </td>
                    <td>
                        <select name="user_type" id="user_type">
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                            <option value="phCompany">Pharmaceutical company</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="login">login</button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>


