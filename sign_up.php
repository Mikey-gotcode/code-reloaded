
<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up'])) {
    $user_type = $_POST['user_type'];

    if ($user_type == 'doctor') {
        header("Location: doctor/add_doctors.php");
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



<<<<<<< HEAD

<!DOCTYPE html>
=======
>>>>>>> 0d0ad9d470c145c16bb2c4f2435cc6f05d134e43
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
</head>
<body>
<<<<<<< HEAD
    <form action="sign_up.php" method="post">
        <select name="user_type" id="user_type">
=======
    <form action="" method="post">
        <select>
>>>>>>> 0d0ad9d470c145c16bb2c4f2435cc6f05d134e43
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
            <option value="phCompany">Pharmaceutical company</option>
            <option value="supervisor">Supervisor</option>
        </select>
        <br><br>
        <button type="submit" name="sign_up">SIGN UP</button>
    </form>
    
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 0d0ad9d470c145c16bb2c4f2435cc6f05d134e43
