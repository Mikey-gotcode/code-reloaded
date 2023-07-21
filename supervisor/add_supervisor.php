<?php 
session_start();
include "./dbcon.php";

if(isset($_POST["add"])) {
    // Get the form data
    $contractID = $_POST['ContractID'];
    $sfirstname = $_POST['Firstname'];
    $slastname = $_POST['Lastname'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $phonenumber=$_POST['Phonenumber'];

    // Check if the contract already has a supervisor
    $query = "SELECT * FROM supervisor WHERE ContractID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $contractID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the contract already has a supervisor
        echo '<script>alert("Contract Already Has a Supervisor")</script>';
    } else {
        // Insert supervisor information using prepared statement
        $insert = "INSERT INTO supervisor (ContractID, Firstname,Lastname,Username,Password, Phonenumber) VALUES (?, ?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "issssi", $contractID,$sfirstname,$slastname,$username,$password,$phonenumber);
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
    <div>
    <form method="post" action="#">
 <table>
       <tr>
          <td><label>Contract ID</label></td>
          <td><input type="number" name="ContractID" placeholder="SSN" required></td>
        </tr>
        <tr>
          <td> <label>First Name</label></td>
          <td> <input type="text" name="Firstname" placeholder="First Name"></td>
        </tr>
        <tr>
          <td><label>Last Name</label></td>
          <td><input type="text" name="Lastname" placeholder="Name" required></td>
        </tr>
        <tr>
          <td><label>Username</label></td>
          <td><input type="text" name="Username" placeholder="Username" required></td>
        </tr>
        <tr>
          <td><label>Password</label></td>
          <td><input type="password" name="Password" placeholder="Password"></td>
        </tr>
        <tr>
          <td><label>Phone Number</label></td>
          <td><input type="number" name="Phonenumber" placeholder="Phone number"></td>
        </tr>
     
    </table>
    </form>
</div>
</body>
</html>
