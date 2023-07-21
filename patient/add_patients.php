<?php
session_start();
include "./dbcon.php";

if (isset($_POST["add"])) {
    // Get the form data
    $ssn = $_POST['SSN'];
    $fname = $_POST['Firstname'];
    $lname = $_POST['Lastname'];
    $address = $_POST['Address'];
    $age = $_POST['Date-of-birth'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $phonenumber=$_POST['Phonenumber'];
    $dateRegistered=$_POST['Date_registered'];

    // Check if the patient already exists
    $query = "SELECT * FROM patients WHERE SSN = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $ssn); // Bind the SSN value to the prepared statement
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // Display message that the record already exists
        echo '<script>alert("Patient already exists")</script>';
    } else {
        // Insert patient information using prepared statement
        $insert = "INSERT INTO patients(SSN, Firstname,Lastname, Address, Date-of-birth,Username,Password,Phonenumber,Date_Registered) VALUES(?, ?, ?, ?,?,?,?,?,?)";
        $stmt = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param($stmt, "isssissid", $ssn, $fname,$lname, $address, $age,$username,$password,$phonenumber,$dateRegistered); // Bind the values to the prepared statement
        mysqli_stmt_execute($stmt);

        echo '<script>alert("Patient information inserted successfully")</script>';
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Patients Addition Form</title>
  </head>
  <body>
    <div>
    <form action="#" method="post">
      
      <table>
      <h3>Add Patients</h3>
        <tr>
          <td><label>Social Security Number</label></td>
          <td><input type="number" name="SSN" placeholder="SSN" required></td>
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
          <td><label>Address</label></td>
          <td><input type="text" name="Address" placeholder="Address" required></td>
        </tr>
        <tr>
          <td><label>Date of Birth</label></td>
          <td><input type="date" name="Date-of-birth" placeholder="Age" required></td>
        </tr>
        <tr>
          <td><label>Username</label></td>
          <td><input type="text" name="Username" placeholder="Username"></td>
        </tr>
        <tr>
          <td><label>Password</label></td>
          <td><input type="password" name="Password" placeholder="Password"></td>
        </tr>
        <tr>
          <td><label>Phone Number</label></td>
          <td><input type="number" name="Phonenumber" placeholder="Phonenumber"></td>
        </tr>
        <tr>
          <td><label>Date registered</label></td>
          <td> <input type="date" name="Date_registered" placeholder="Date_registered"></td>
        </tr>
        <tr>
          <td><button type="submit" name="add">Add New Patient</button></td>
          
        </tr>
      </table>
      
    </form>
    </div>
  </body>
</html>


