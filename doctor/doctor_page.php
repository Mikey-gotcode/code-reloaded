<?php 
session_start();


if(isset($_SESSION['SSN']) && $_SESSION['user_type'])
{
    $username=$_SESSION['Username'];
   }else{

    //header("Location:login.php");


   }







?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Styles for the welcome section */
        .welcome-section {
            text-align: center;
            padding: 20px;
        }

        .welcome-section img {
            max-width: 100px;
            border-radius: 50%;
        }

        /* Styles for the navigation panel */
        .nav-panel {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: center;
        }

        .nav-item {
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
        }

        /* Styles for the sidebar */
        .sidebar {
            background-color: #f0f0f0;
            width: 250px;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h3 {
            margin-top: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 5px;
        }

        /* Styles for the user information section */

        .container {
        display: flex;
    }

    .sidebar, .user-info {
        display: inline-block;
        vertical-align: top;
    }
        .user-info {
            padding: 20px;
            margin-left:5%;
        }

        .user-info table {
                justify-content:left;
            width: 100%;
        }

        .user-info td {
            padding: 5px;
        }

        .user-info .btn {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
            display: inline-block;
        }

        .user-info .btn:hover {
            background-color: #0056b3;
        }
  .user-info, .side-bar {
    display:inline-block;
    vertical-align: top;
    
  }
  .welcome-section{
        display:flex;
  }


    </style>
</head>
<body>
    <div class="welcome-section">
        <img src="doctor_image.jpeg" alt="doctor's image">
        <h2>Welcome Doctor <?php echo $username; ?></h2>
    </div>

    <div class="nav-panel">
        <a href="#" class="nav-item">Panel Item 1</a>
        <a href="#" class="nav-item">Panel Item 2</a>
        <a href="#" class="nav-item">Panel Item 3</a>
        <a href="#" class="nav-item">Panel Item 4</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <h3>Sidebar Heading</h3>
            <ul>
                <li><a href="#" class="sidebar-item">Sidebar Item 1</a></li>
                <li><a href="#" class="sidebar-item">Sidebar Item 2</a></li>
                <li><a href="#" class="sidebar-item">Sidebar Item 3</a></li>
                <li><a href="#" class="sidebar-item">Sidebar Item 4</a></li>
            </ul>
        </div>
    
        <div class="user-info">
            <h4>Account Information</h4>
            <table>
                <tr>
                    <td><label>Social Security Number:</label></td>
                    <td><?php echo $_POST['SSN'];?></td>
                </tr>
                <tr>
                    <td><label>First Name:</label></td>
                    <td><?php echo $_POST['Firstname'];?></td>
                </tr>
                <tr>
                    <td><label>Last Name:</label></td>
                    <td><?php echo $_POST['Lastname'];?></td>
                </tr>
                <tr>
                    <td><label>Specialty:</label></td>
                    <td><?php echo $_POST['Specialty'];?></td>
                </tr>
                <tr>
                    <td><label>User Name:</label></td>
                    <td><?php echo $_POST['Username'];?></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td><?php echo $_POST['Phonenumber'];?></td>
                </tr>
                <tr>
                    <td><a href="edit_doctor.php" class="btn">EDIT</a></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
