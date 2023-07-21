<?php
session_start();
include "./dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $tradeName = $_POST["TradeName"];
    $formula = $_POST["Formula"];
    $cpName = $_POST["CompanyName"];

    // Check if the drug information already exists
    $query = "SELECT * FROM drugs WHERE TradeName = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $tradeName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Drug information already exists")</script>';
    } else {
        // Insert drug information using prepared statement
        $insert = "INSERT INTO drugs(TradeName, Formula, CompanyName) VALUES(?, ?, ?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "sss", $tradeName, $formula, $cpName);
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Drug information inserted successfully")</script>';
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drug</title>
</head>
<body>
    <form method="post" action="">
        <label>Trade Name:</label>
        <input type="text" name="TradeName" placeholder="Trade name" required>
        <label>Formula:</label>
        <input type="text" name="Formula" placeholder="Formula" required>
        <label>Company Name:</label>
        <input type="text" name="CompanyName" placeholder="Company name" required>
        <button type="submit" name="add">ADD DRUG</button>
    </form>
</body>
</html>
