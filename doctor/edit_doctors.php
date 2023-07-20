<?php
session_start();
include "dbcon.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit"])) {
    $doctorID = $_POST["DoctorID"];
    $name = $_POST["Name"];
    $specialty = $_POST["Specialty"];
    $experienceYears = $_POST["ExperienceYears"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Update doctor's information
    $update = "UPDATE doctors SET Name = ?, Specialty = ?, ExperienceYears = ?, Username = ?, Password = ? WHERE DoctorID = ?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sssssi", $name, $specialty, $experienceYears, $username, $password, $doctorID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo '<script>alert("Doctor information updated successfully")</script>';
}

// Retrieve the doctor's information for editing
if (isset($_GET["doctorID"])) {
    $doctorID = $_GET["doctorID"];

    // Retrieve the doctor's information from the database
    $query = "SELECT * FROM doctors WHERE DoctorID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $doctorID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Check if the doctor exists
    if ($row) {
        $doctorID = $row["DoctorID"];
        $name = $row["Name"];
        $specialty = $row["Specialty"];
        $experienceYears = $row["ExperienceYears"];
        $username = $row["Username"];
        $password = $row["Password"];
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
    <form action="edit_doctors.php" method="post">
        <input type="hidden" name="DoctorID" value="<?php echo $doctorID; ?>">
        <label>Name</label>
        <input type="text" name="Name" placeholder="Name" value="<?php echo $name; ?>" required>
        <label>Specialty</label>
        <input type="text" name="Specialty" placeholder="Specialty" value="<?php echo $specialty; ?>" required>
        <label>Years of Experience</label>
        <input type="number" name="ExperienceYears" placeholder="ExperienceYears" value="<?php echo $experienceYears; ?>" required>
        <label>Username</label>
        <input type="text" name="Username" placeholder="Username" value="<?php echo $username; ?>" required>
        <label>Password</label>
        <input type="text" name="Password" placeholder="Password" value="<?php echo $password; ?>" required>
        <button type="submit" name="edit">Update Doctor</button>
    </form>
</body>
</html>
