<?php 
session_start();
include "./dbcon.php";

if(isset($_POST["add"])) {
    // Get the form data
    $contractID = $_POST['ContractID'];
    $supervisorName = $_POST['SupervisorName'];

    // Check if the contract already has a supervisor
    $query = "SELECT * FROM supervisor WHERE ContractID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $contractID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the contract already has a supervisor
        echo '<script>alert("Contract Already Has a Supervisor")</script>';
    } else {
        // Insert supervisor information using prepared statement
        $insert = "INSERT INTO supervisor (ContractID, Supervisor) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "ss", $contractID, $supervisorName);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Inserted new supervisor information")</script>';
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supervisor</title>
</head>
<body>
    <form method="post" action="">
        <label>Contract ID:</label>
        <input type="number" name="ContractID" placeholder="Contract ID" required>
        <label>Supervisor Name:</label>
        <input type="text" name="SupervisorName" placeholder="Supervisor Name" required>
        <button type="submit" name="add">ADD SUPERVISOR</button>
    </form>
</body>
</html>
