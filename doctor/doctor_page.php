<?php 
session_start();
include "./dbcon.php";

//check if the user logged in as a doctor
if(isset($_SESSION['user_type']) && $_SESSION['user_type']=== 'doctor')
{
//retrieve the logged in user
$username=$_SESSION['Username'];

}else{
    header("Location:login.html");
    exit();
}



/*function searchPatient($patientName)
{
    require("./dbcon.php");

    $query="SELECT * FROM patients WHERE Firstname LIKE ? OR Lastname LIKE ? ";
    $stmt=mysqli_prepare($conn,$query);
    $searchItem="%$patientName%";
    mysqli_stmt_bind_param($stmt,"ss",$searchItem,$searchItem);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);


    while($row=mysqli_fetch_assoc($result)){
        $patients=array(
            'ssn'=> $row['SSN'],
            'Firstname'=> $row['Firstname'],
            'Lastname'=> $row['Lastname'],
            'Address'=> $row['Address'],
            'Date-of-birth'=> $row['Date-of-birth'],
            'Username'=> $row['Username'],
            'Password'=> $row['Password'],
            'Phonenumber'=> $row['Phonenumber'],
            'Date_registered'=> $row['Date_registered'],
        );
        $patients[]=$patient;

    }
    return $patients;

}

function prescribeDrugs($pssn,$dssn,$tradename,$dosage,$price){
    require("./dbcon.php");

    //assuming the drugs table has the correct columns
    $query="INSERT INTO prescriptions () VALUES()";
}


$uploadDirectory='';

if(isset($_FILES['']))
{
    $file=$_FILES[''];

    if($file['error']===UPLOAD_ERR_OK)
    {
        $tempFilePath=$file[''];


    }



}*/

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .nav-panel{
            background-color: #333;
            color: #fff;
            padding: 10px;

        }
        .sidebar{
            background-color: #f0f0f0;
            width: 250px;
            padding: 20px;
            box-sizing: border-box;


        }
        .nav-item{
            display: inline-block;
            margin-right: 20px;
            text-decoration: none;
            color: #fff;

        }


    </style>
</head>
<body>
    <div class="">
        <div><img src="" alt="doctor's image"></div>
        <h2>Welcome Doctor <?php echo $username; ?></h2>
        <h4>Account information</h4>
        <div class="user-info">
            <table>
                <tr>
                    <td><label>Social Security Number</label></td>
                    <td><?php echo $_SESSION['SSN'];?></td>
                </tr>
                <tr>
                    <td><label>First Name</label></td>
                    <td><?php echo $_SESSION['Firstname'];?></td>
                </tr>
                <tr>
                    <td><label>Last Name</label></td>
                    <td><?php echo $_SESSION['Lastname'];?></td>
                </tr>
                <tr>
                    <td><label>Specialty</label></td>
                    <td><?php echo $_SESSION['Specialty'];?></td>
                </tr>
                <tr>
                    <td><label>User Name</label></td>
                    <td><?php echo $_SESSION['Username'];?></td>
                </tr>
                <tr>
                    <td><label>Phone Number</label></td>
                    <td><?php echo $_SESSION['Phonenumber'];?></td>
                </tr>
                <tr>
                    <td><a href="edit_doctor.php" class="btn">EDIT</a></td>
                </tr>
            </table>
        </div>
        <div class="nav-panel">
            <a href="" class="nav-item">panel-item</a>
            <a href="" class="nav-item">panel-item</a>
            <a href="" class="nav-item">panel-item</a>
            <a href="" class="nav-item">panel-item</a>
        </div>
        <div class="sidebar">
            <h3></h3>
            <ul>
                <li><a href="" class="">sidebar-item</a></li>
                <li><a href="" class="">sidebar-item</a></li>
                <li><a href="" class="">sidebar-item</a></li>
                <li><a href="" class="">sidebar-item</a></li>
            </ul>
        </div>





    </div>
    
</body>
</html>