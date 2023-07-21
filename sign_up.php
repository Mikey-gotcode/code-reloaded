<!DOCTYPE html>
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



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
</head>
<body>
    <form action="" method="post">
        <select>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
            <option value="phCompany">Pharmaceutical company</option>
            <option value="supervisor">Supervisor</option>
        </select>
        <br><br>
        <button type="submit" name="sign_up">SIGN UP</button>
    </form>
    
</body>
</html>