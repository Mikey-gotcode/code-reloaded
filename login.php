<?php 
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $user_type = $_POST['user_type'];
    $userName = $_POST['Username'];
    $passWord = $_POST['Password'];

    if ($user_type == 'doctor') {
        header("Location: doctor.php");
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
