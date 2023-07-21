<?php 
session_start();
include "dbcon.php";
print_r($_POST);

$table='';
    


if(isset($_POST["login"]))
{
        $username=$_POST["Username"];
        $password=$_POST['Password'];
        $user_type=$_POST['user_type'];

        if($user_type=='doctor'){
            $table='doctors';
    
        }elseif($user_type=='patient'){
            $table='patients';
    
        }elseif($user_type=='supervisor'){
            $table='supervisors';
            
        }elseif($user_type=='pharmacist'){
            $table='pharmacists';
            
        }elseif($user_type=='admin'){
            $table='admin';
            
        }





        $result=mysqli_query($conn,"SELECT * FROM $table WHERE Username='$username'");
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0)
        {
            if($password==$row['Password'])
            {
                $_SESSION["login"]=true;
                $_SESSION["id"]=$row["SSN"];

                if ($user_type == 'doctor'){
                    header("Location:doctor/doctor_page.php");
                    exit();
                }elseif ($user_type == 'patient'){
                    header("Location: patient/patient.php");
                    exit();
                }elseif ($user_type == 'supervisor'){
                    header("Location: supervisor/supervisor.php");
                    exit();
                }elseif($user_type == 'admin'){
                    header("Location: ");
                    exit();
                }else{
                    echo '<script>alert("User already exists or password is incorrect")</script>';
                }
            }



            }

        }



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        


    </style>
    
</head>
<body>
    
<div>
    <form action="#" method="post">
        <h3>BLISS MEDICAL</h3>
        <img src="" alt="">
        <table>
                <tr>
                    <td>
                        <label for="username">Username:</label>
    
                    </td>
                    <td>
                        <input type="text" name="Username" placeholder="">
    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password:</label>
    
                    </td>
                    <td>
                        <input type="password" name="Password" placeholder="">
    
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="user_type">User type:</label>
                    </td>
                    <td>
                        <select name="user_type" id="user_type">
                            <option value="doctor">Doctor</option>
                            <option value="patient">Patient</option>
                            <option value="phCompany">Pharmaceutical company</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <button type="submit" name=login>login</button>
                    </td>
                </tr>
            </table>
            <br><br>
       
    </form>
</div>
</body>
</html>


