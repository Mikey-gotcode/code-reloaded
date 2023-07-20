<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_type'])) {
    $user_type = $_POST['user_type'];

    if ($user_type == 'doctor') {
        header("Location: add_doctors.php");
        exit();
    } elseif ($user_type == 'patient') {
        header("Location: add_patient.php");
        exit();
    } elseif ($user_type == 'phCompany') {
        header("Location: add_pharmaceuticalCompany.php");
        exit();
    } elseif ($user_type == 'supervisor') {
        header("Location: add_supervisor.php");
        exit();
    } else {
        echo '<script>alert("'.htmlspecialchars("Invalid request made").'")</script>';
    }
}
?>
